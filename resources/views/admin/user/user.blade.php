@extends('admin/app')

@section('content')
<!-- menu -->
<div class="container-fluid py-3">
    <div class="row mt-4">
        <div class="mb-lg-0 mb-4">
            <div class="card ">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <div class="d-flex justify-content-between ">
                            <h6 class="mb-0"><?= $title ?></h6>
                            <ul class="navbar-nav d-lg-block d-none">
                                <li class="nav-item">
                                    <a class="btn btn-sm mb-0 me-1 btn-primary" href="{{route('tambahuser')}}">Tambah User</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                        @endif
                        <ul class="list-group">
                            @foreach($DataUsers as $row )
                            @if($row->active == 1 || $row->active == "Tidak Aktif")
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg mt-2">
                                <div class="d-flex flex-column">
                                    <span class="mb-2 text-xs">Username: <span class="text-dark font-weight-bold ms-sm-2">{{ $row->username; }}</span></span>
                                    <span class="mb-2 text-xs">Email: <span class="text-dark ms-sm-2 font-weight-bold">{{ $row->email; }}</span></span>
                                    <span class="text-xs">Status: <span class="text-dark ms-sm-2 font-weight-bold">{{ $row->active == 1 ? 'Aktif' : 'Tidak Aktif' }}</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <form action="{{route('actionhapususer')}}" method="post" onsubmit="return konfirmasiHapus(event)">
                                        @method('patch')
                                        @csrf
                                        <input type="hidden" name="id_user" value="{{$row->id_user}}">
                                        <input type="hidden" name="username" value="{{$row->username}}">
                                        <input type="hidden" name="email" value="{{$row->email}}">
                                        <input type="hidden" name="active" value="{{$row->active}}">
                                        <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0"><i class="far fa-trash-alt me-2"></i>Delete</button>
                                    </form>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('edituser', ['id_user' => $row->id_user]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end menu -->
@endsection