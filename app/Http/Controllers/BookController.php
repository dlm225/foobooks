<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller {

    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
        $books = \App\Book::with('author')->orderBy('id','desc')->get();
        return view('books.index')->with('books',$books);
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
        $authors_for_dropdown = \App\Author::authorsForDropdown();
        return view('books.create')->with('authors_for_dropdown', $authors_for_dropdown);
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

    public function postCreate(Request $request){

        $this->validate($request,[
            'title' => 'required|min:3',
            'author' => 'required',
            'published' => 'required|min:4',
            'cover' => 'required|url',
            'purchase_link' => 'required|url',
        ]);

        # Add the Book
    //    $book = new \App\Book();
    //    $book->title = $request->title;
    //    $book->author = $request->author;
    //    $book->published = $request->published;
    //    $book->cover = $request->cover;
    //    $book->purchase_link = $request->purchase_link;
    //    $book->save();

        # Shortcut for the immediate above
    //    $data = $request->only('title','author','published','cover','purchase_link');
    //    $book = new \App\Book($data);
    //    $book->save();

        # Further Shortcut for the immediate above
        $data = $request->only('title','author','published','cover','purchase_link');
        \App\Book::create($data);

        \Session::flash('message','Your book was added');

        return redirect('/books');
    }

    public function getEdit($id){
        $book = \App\Book::find($id);

        $authors_for_dropdown = \App\Author::authorsForDropdown();
        $tags_for_checkboxes = \App\Tag::getTagsForCheckboxes();
        $tags_for_this_book = [];
        foreach($book->tags as $tag) {
            $tags_for_this_book[] = $tag->id;
        }

        return view('books.edit')
            ->with('book',$book)
            ->with('authors_for_dropdown',$authors_for_dropdown)
            ->with('tags_for_checkboxes',$tags_for_checkboxes)
            ->with('tags_for_this_book',$tags_for_this_book);
    }

    public function postEdit(Request $request) {
        $book = \App\Book::find($request->id);

        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->published = $request->published;
        $book->cover = $request->cover;
        $book->purchase_link = $request->purchase_link;
        if($request->tags) {
            $tags = $request->tags;
        }
        else {
            $tags = [];
        }
        $book->tags()->sync($tags);
        $book->save();

        \Session::flash('message','Your changes were made.');
        return redirect('/book/edit/'.$request->id);
    }
}
