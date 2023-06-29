@extends('admin/app')

@section('content')
<!-- menu -->
<div class="container-fluid py-3">
    <div class="row mt-4">
        <div class="mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-body pt-4 p-3">
                    <p class="text-uppercase text-sm">Edit Data User</p>
                    <form action="{{route('actionupdateuser')}}" method="post">
                        @method('patch')
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                            {{ $error }}</br>
                            @endforeach
                        </div>
                        @endif
                        @foreach($Datausers as $row)
                        <div class="row">
                            <input type="hidden" name="id_user" value="{{ $row->id_user }}" readonly>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Username</label>
                                    <input class="form-control" type="text" name="username" palceholder="Masukan Username" value="{{ old('username') ?? $row->username }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email address</label>
                                    <input class="form-control" type="email" name="email" palceholder="Masukan Email" value="{{ old('email') ?? $row->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="active" class="form-control-label">Status</label>
                                    <select class="form-control" name="active" id="active">
                                        <option @if($row->active=='1'){{'Selected'}}@endif value="1">Aktif</option>
                                        <option @if($row->active=='Tidak Aktif'){{'Selected'}}@endif value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary btn-sm ms-auto">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end menu -->
@endsection