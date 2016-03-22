<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MainController extends Controller {

    /**
    * Responds to requests to GET /(index)
    */
    public function getIndex() {
        return view('main.index');
    }
}
