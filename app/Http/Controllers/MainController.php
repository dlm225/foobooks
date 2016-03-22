<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MainController extends Controller {

    /**
    * Responds to requests to GET /(index)
    */
    public function index() {
        return view('main.index');
    }
}
