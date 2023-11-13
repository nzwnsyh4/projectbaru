<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::orderBy('judul', 'ASC')->get();
        return view('book.index', compact('books'));
    }


public function create()
{
    return view('book.create');
}

public function store (Request $request)
{
    $request->validate([
        'kode_buku' => 'required|unique:books',
        'judul' => 'required',
        'penulis' => 'required',
        'harga' => 'required',

    ]);

    Book::create($request->all());
    return redirect('/book')->with('success', 'Data buku berhasil ditambahkan');
}

public function show($id)
{
    $book = Book::find($id);
    return view('book.show', compact('book'));
}

public function edit($id)
{
    $book = Book::find($id);
   // return $book; ini untuk melihat script
    return view('book.edit', compact('book'));
}

public function update (Request $request, $id)
{
    $request -> validate([
        'judul' => 'required',
        'penulis' => 'required',
        'harga' => 'required',

    ]);

    $book = Book::find($id);
    $book->update($request->all());
    return redirect('/book')->with('success', 'Data buku berhasil diubah') ;
}

public function destroy($id)
{
    $book = Book::find($id);
    $book->delete();
    return redirect('/book')->with('success', 'Data buku berhasil dihapus');

}
}
