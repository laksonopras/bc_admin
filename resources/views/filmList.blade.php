@extends('layouts.app')

@section('content')
<div class="top-bar">
    <form action="/" method="get">
        <input class="form-search" type="search" placeholder="Search" aria-label="Search" name="searchTitle"/>
        <button class="btn-search" type="submit">Search</button>
    </form>
    
</div>
<div class="main_layout">
    <div class="row">
        @foreach ( $data['data'] as $item )
        <a class="col-4" href="/film/{{$item['id_film']}}" >
            <div class="film-item">
                <img class="banner" src={{$item['banner']}}>
                <div class="judul">{{$item['judul']}}</div>
            </div>
        </a>    
        @endforeach
         <a class="col-4" href="/film/add/form" >
            <div class="film-item add-film">
                <div class="judul add-link">Tambah Film</div>
            </div>
        </a>    
    </div>
</div>
@endsection
