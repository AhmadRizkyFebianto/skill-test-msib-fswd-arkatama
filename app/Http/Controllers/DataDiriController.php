<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiris;

class DataDiriController extends Controller
{
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'inputDataDiri' => 'required',
        ]);

        $data = strtoupper($validatedData['inputDataDiri']);

        $data = explode(' ', $data);
        $result = [];
        $temporaryData = [];

        foreach ($data as $item) {
            $ignorePatterns = ["TAHUN", "THN", "TH"];
            $ignoreItem = false;

            foreach ($ignorePatterns as $pattern) {
                if (stripos($item, $pattern) !== false) {
                    $ignoreItem = true;
                    break;
                }
            }

            if ($ignoreItem) {
                continue;
            }

            if (is_numeric($item)) {
                if (!empty($temporaryData)) {
                    $result[] = implode(" ", $temporaryData);
                    $temporaryData = [];
                }
                $result[] = $item;
            } else {
                $temporaryData[] = $item;
            }
        }

        if (!empty($temporaryData)) {
            $result[] = implode(" ", $temporaryData);
        }

        $validatedData = [
            'name' => $result[0],
            'age' => $result[1],
            'city' => $result[2]
        ];

        DataDiris::create($validatedData);

        return redirect('input-data');
    }

}
