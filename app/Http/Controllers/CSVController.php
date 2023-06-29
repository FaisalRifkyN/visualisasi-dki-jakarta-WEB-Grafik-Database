<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SplFileObject;

class CSVController extends Controller
{
    public function readCSV()
    {
        $filePath = public_path('admin/data/data.csv'); // Ubah dengan path yang sesuai ke file CSV Anda

        $csvData = [];
        $file = new SplFileObject($filePath, 'r');
        $file->setFlags(SplFileObject::READ_CSV);
        foreach ($file as $row) {
            $csvData[] = $row;
        }

        return $csvData;
    }
}
