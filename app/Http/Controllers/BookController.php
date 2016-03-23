<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function postAdd(Request $request) {
        $this->validate($request,[
            'title' => 'required|min:3',
            'author' => 'required|min:3']
        );
        return view('books.add')
            ->with('title', $request->input('title'));
    }

    public function postCreate(){
        return redirect('/books');
    }
}
