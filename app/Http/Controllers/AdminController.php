<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $book = Book::all();
        // dd($book);
        return view('home', ['listbook'=>$book]);
    }

    public function addbook(Request $request){
        // dd($request);

        $book = new Book; //Membuat object model/tabel baru

        // kolom database = data yang akan dimasukan
        $book->judul = $request->judul;
        $book->penulis = $request->penulis;
        $book->tahun = $request->tahun;
        $book->penerbit = $request->penerbit;

        $book->save();
        return redirect()->back()->with('success', 'Data Berhasil Dimasukkan!');
    }

    public function editbook(Request $request){
        // dd($request);

        $book = Book::find($request->id); //Mencari record berdasarkan id

        // kolom database = data yang akan dimasukan
        $book->judul = $request->judul;
        $book->penulis = $request->penulis;
        $book->tahun = $request->tahun;
        $book->penerbit = $request->penerbit;

        $book->save();
        return redirect()->back()->with('success', 'Data Berhasil Diubah!');
    }

    public function deletebook($id){
        $book = Book::find($id);        //mencari data berdasarkan id
        $book->delete();                // Fungsi menghapus data
        // dd($id);
        return redirect()->back()->with('success', 'Data Berhasil Dihapus!'); //return

    }

    public function detailbook($id){
        $book = Book::find($id);        //mencari data berdasarkan id
        // dd($book);
        return view('detail', ['book' => $book]);
    }
}
