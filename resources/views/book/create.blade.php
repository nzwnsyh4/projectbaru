@extends('layouts.app')
@section('content')
        <div class="container">
        <h2>Tambah Buku</h2>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('book.store') }}" method="POST">
        @csrf
        <div class="form-group">
        <label for="kode_buku">Kode Buku</label>
        <input type="text" name="kode_buku" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="penulis">Penulis</label>
        <input type="text" name="penulis" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="num" name="harga" class="form-control" required>
            </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
@endsection
