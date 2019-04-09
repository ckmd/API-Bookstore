<?php

namespace App\Http\Controllers;

use App\Author;
use finfo;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function image(){
        $authors = Author::with('contact','country','books')->get();
        return $authors;
        return view('imageAuthor', compact('authors'));
    }
    public function index()
    {
        $authors = Author::with('contact','country','books')->get();
        // return response()->json($authors,200);
        if(count($authors) > 0){
            return $authors;
        }else{
            return 'No Author Listed';
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('avatar');

        // Get the contents of the file
        $contents = $file->openFile()->fread($file->getSize());

        // $imagedata = base64_encode(file_get_contents($request->file('avatar')->pat‌​h())); 
        // Store the contents to the database
        $author = new Author;
        $author->country_id = $request->country_id;
        $author->name = $request->name;
        $author->avatar = $contents;
        $author->age = $request->age;
        $author->save();

        // if($file = $request->file('avatar')){
        //     $nameFile = $file->getClientOriginalName();
        //     if($file->move('images/avatar', $nameFile)){
        //         $author = new Author;
        //         $author->country_id = $request->country_id;
        //         $author->name = $request->name;
        //         $author->avatar = $nameFile;
        //         $author->age = $request->age;
        //         $author->save();
        //     }
        // }
        $message = 'Author Saved';
        if(!$author->save()){
            $message = 'author unsaved';
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
        $author = Author::with('contact','country','books')->find($id);
        // $author->avatar = response()->make($author->avatar, 200, array(
        //     'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($author->avatar)
        // ));
        return base64_decode($author->avatar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();
        return 'Author deleted';
    }
}
