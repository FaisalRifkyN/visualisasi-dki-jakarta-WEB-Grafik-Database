@extends('admin/app')

@section('content')
<!-- menu -->
<div class="container-fluid py-3">
    <div class="row mt-4">
        <div class="mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-body pt-4 p-3">
                    <p class="text-uppercase text-sm">Tambah Data User</p>
                    <form action="{{route('actionsimpanuser')}}" method="post">
                        @method('patch')
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                            {{ $error }}</br>
                            @endforeach
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Username</label>
                                    <input class="form-control" type="text" name="username" palceholder="Masukan Username" value="{{ old('username') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Password</label>
                                    <input class="form-control" name="password" type="password" palceholder="Masukan Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email address</label>
                                    <input class="form-control" type="email" name="email" palceholder="Masukan Email" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm ms-auto">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end menu -->
@endsection