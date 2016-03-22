<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class BookController extends Controller {

    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
        return 'List all the books';
    }

    /**
     * Responds to requests to GET /books/show/{id}
     */
    public function getShow($title = null) {
        return view('books.show')
            ->with('title', $title)
            ->with('abc', '123');
    }

    /**
     * Responds to requests to GET /books/create
     */
    public function getCreate() {
        return view('books.create');
    }

    /**
     * Responds to requests to POST /books/add
     */
    public function postAdd($title = null) {
        return view('books.add')
            ->with('title', $title);
    }

    public function postCreate(){
        return redirect('/books');
    }
}
