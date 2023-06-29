@extends('admin/app')

@section('content')
<?php
$file = fopen(resource_path('views/admin/visualisasi/data/data.csv'), 'r');
$data = array();
$counter = 0;

while (($row = fgetcsv($file)) !== false) {
    $data[] = $row;
}

fclose($file);

$jumlahUsaha = count($data);
?>
<!-- menu -->
<div class="container-fluid py-3">
    <h2 class="font-weight-bolder text-white mb-0">Dinas Pariwisata Dan Ekonomi Kreatif </h2>
    <h2 class="breadcrumb-item text-sm opacity-5 text-white">
        Data Jumlah Usaha Pariwisata Bidang Hiburan dan Rekreasi Menurut Jenis Usaha dan Kecamatan.
        <br>
        Penjelasan variabel dari data diatas sebagai berikut:
        1. jenis_usaha: Jenis Usaha
        2. kecamatan: Kecamatan
        3. wilayah: Wilayah
    </h2>
    <h2></h2>
    <div class="row mt-4">
        <div class="mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-body">
                    <div class="d-flex justify-content-between ">
                        <h6>DATA DKI JAKARTA</h6>
                        <ul class="navbar-nav d-lg-block d-none">
                            <li class="nav-item">
                                <a class="btn btn-sm mb-0 me-1 btn-primary" id="downloadLink" href="{{ asset('data/data.csv') }}" download>Download Data CSV</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php
                $file = fopen(resource_path('views/admin/visualisasi/data/data.csv'), 'r');
                $data = array();
                $counter = 0;

                while (($row = fgetcsv($file)) !== false) {
                    $data[] = $row;
                    $counter++;

                    if ($counter == 20) {
                        break;
                    }
                }

                fclose($file);
                ?>
                <div class="table-responsive">
                    <table class="table align-items-center">
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div class="ms-4">
                                                <h6 class="text-sm mb-0"><?= $row[0]; ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <h6 class="text-sm mb-0"><?= $row[1]; ?></h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <h6 class="text-sm mb-0"><?= $row[2]; ?></h6>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end menu -->
@endsection