<?php

namespace Database\Seeders;

use App\Imports\CarsImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class ImportDataFromExcelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // path for XLSX file
        $filePath = resource_path('excel/data.xlsx');

        Excel::import(new CarsImport, $filePath);
    }
}
