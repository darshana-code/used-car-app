<?php

namespace App\Imports;

use App\Models\Car;
use App\Models\Manufacturer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CarsImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            // Import first sheet which has car details, from the excel file
            new Cars(),
            // Import second sheet which has Manufacturer details,from the excel file
            new Manufacturers(),
        ];
    }
}

class Cars implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $manufacturer = Manufacturer::firstOrCreate(['name' => $row['manufacturer']]);

        return new Car([
            'id' => $row['id'],
            'manufacturer_id' => $manufacturer->id,
            'model' => $row['model'],
            'year' => $row['year'],
            'color' => $row['colour'],
        ]);
    }
}

class Manufacturers implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // print_r($row);
        return Manufacturer::updateOrCreate([ 'name' => $row['manufacturer']], [
            'id' => $row['id'],
            'description' => $row['description'],
            'origin_country' => $row['origin_country'],
        ]);

    }
}

