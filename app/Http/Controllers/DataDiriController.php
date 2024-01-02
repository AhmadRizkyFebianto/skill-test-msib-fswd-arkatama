<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiris;

class DataDiriController extends Controller
{
    public function store(Request $request)
    {

        $inputData = $request->input('data');

        list($name, $age, $city) = explode(' ', $inputData, 3);


        $name = strtoupper($name);

        $city = strtoupper($city);

        $dataDiri = DataDiris::create([
            'name' => $name,
            'age' => $age,
            'city' => $city,
        ]);

        $outputData = [
            'nama' => $name,
            'usia' => $age,
            'kota' => $city,
        ];

        return response()->json(['input_data' => $inputData, 'output_data' => $outputData]);
    }

}
