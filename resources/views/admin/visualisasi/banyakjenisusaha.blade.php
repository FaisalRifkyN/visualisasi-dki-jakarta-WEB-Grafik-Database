@extends('admin/app')

@section('content')
<div class="container-fluid py-3">
    <div class="row mt-4">
        <div class="mb-lg-0 mb-4">
            <div class="card ">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <div class="d-flex justify-content-between ">
                            <h6 class="mb-0"><?= $title ?></h6>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        @foreach($Grafik as $row)
                        @if($row->img == "grafik.png")
                        <center>
                            <img src="{{'/assets/img/'.$row->img}}" alt="Grafik Jenis Usaha">
                        </center>
                        @endif
                        @endforeach
                        <!-- <div id="grafik1"></div>
                        <py-script output="grafik1" src="admin/visualisasi/python/banyak_jenis_usaha_01.py">
                        </py-script> -->

                        <!-- <div id="grafik-container2"></div>
                        <py-script output="grafik-container2" src="py/grafik2.py">
                        </py-script> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end menu -->
@endsection