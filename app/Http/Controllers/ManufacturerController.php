<?php
namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function show($id)
    {
        $manufacturer = Manufacturer::with('cars')->findOrFail($id);
        return view('manufacturer.show', compact('manufacturer'));
    }
}
