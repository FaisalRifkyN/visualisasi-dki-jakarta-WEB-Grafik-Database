<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisualisasiController extends Controller
{
    function banyakjenisusaha()
    {
        $data['title'] = 'GRAFIK BANYAK JENIS USAHA';
        $data['Grafik'] = Db::table('grafik')->get();
        return view('admin/visualisasi/banyakjenisusaha', $data);
    }

    function banyakkecamatanjenisusaha()
    {
        $data['title'] = 'GRAFIK BANYAK KECAMATAN YANG MEMILIKI JENIS USAHA';
        $data['Grafik'] = Db::table('grafik')->get();
        return view('admin/visualisasi/banyakkecamatanjenisusaha', $data);
    }

    function banyakwilayahjenisusaha()
    {
        $data['title'] = 'GRAFIK BANYAK WILAYAH YANG MEMILIKI JENIS USAHA';
        $data['Grafik'] = Db::table('grafik')->get();
        return view('admin/visualisasi/banyakwilayahjenisusaha', $data);
    }

    function sebaranjenisusahakecamatan()
    {
        $data['title'] = 'GRAFIK SEBARAN JENIS USAHA YANG ADA DI SERTIAP KECAMATAN';
        $data['Grafik'] = Db::table('grafik')->get();
        return view('admin/visualisasi/sebaranjenisusahakecamatan', $data);
    }

    function sebarankecamatanjenisusaha()
    {
        $data['title'] = 'GRAFIK SEBARAN KECAMATAN YANG MEMILIKI JENIS USAHA YANG ADA DI SERTIAP WILAYAH';
        $data['Grafik'] = Db::table('grafik')->get();
        return view('admin/visualisasi/sebarankecamatanjenisusaha', $data);
    }

    function sebaranjenisusahawilayah()
    {
        $data['title'] = 'GRAFIK SEBARAN JENIS USAHA YANG ADA DI SERTIAP WILAYAH';
        $data['Grafik'] = Db::table('grafik')->get();
        return view('admin/visualisasi/sebaranjenisusahawilayah', $data);
    }



}
