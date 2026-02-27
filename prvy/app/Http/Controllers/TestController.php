<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function retrieve() {
        return "Retrieved user id: 5";
    }

    function getName() {
        return "Peder";
    }

    function action2() {
        return "api";
    }
}