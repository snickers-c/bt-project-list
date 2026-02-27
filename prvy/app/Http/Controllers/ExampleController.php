<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    function showForm() {
        return view("example.form");
    }

    function processForm(Request $request) {
        $number = $request->input("number");

        $data = [$number, $number];

        for ($i = 0; $i < 8; $i++) {
            $data[] = $data[$i] + $data[$i+1];
        }

        return view("example.show", [
            'data' => $data,
        ]);
    }
}