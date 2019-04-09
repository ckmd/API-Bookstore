<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('author')->get();
        if(count($books) > 0){
            return $books;
        }else{
            return 'No Books found';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create page
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
            //     'title' => 'required',
            //     'author' => 'required',
            //     'time_released' => 'required'
            // ]);
            
        $message = 'Book Saved';
        
        $book = new Book;
        $book->author_id = $request->author_id;
        $book->title = $request->title;
        // $book->description = $request->description;
        // $book->time_released = $request->time_released;
        // $book->save();

        if(!$book->save()){
            $message = 'Book unsaved';
        }
        return $message;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::with('author')->find($id);
        if($book){
            return $book;
        }else {
            return "can't find book with id ".$id;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit page
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = 'Book Updated !';
        
        $book = Book::find($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->time_released = $request->time_released;
        // $book->save();

        if(!$book->save()){
            $message = 'Failed to Update Book !';
        }
        return $message;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = 'Book Id '.$id.', Successfully deleted';
        $book = Book::find($id);
        // $book->delete();
        if(!$book->delete()){
            $message = 'Delete Failed !';
        }
        return $message;
        //
    }
}
