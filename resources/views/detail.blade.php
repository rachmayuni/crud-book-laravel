@extends('layouts/app')
@section('title', 'Admin - Detail Book')
@section('content')
<div class="content-wrapper">
    <h3>Buku {{$book->Judul}}</h3>
    <h3>{{$book->penulis}}</h3>
    <h3>{{$book->tahun}}</h3>
    <h3>{{$book->penerbit}}</h3>
</div>
@endsection