@extends('layouts.app')

@section('content')
<div class="top-bar">
    <form action="/jadwal" method="get">
        <input class="form-search" type="search" placeholder="Search" aria-label="Search" name="searchTitle"/>
        <button class="btn-search" type="submit">Search</button>
    </form>
</div>
<div class="content">
    <table class="table-data">
        <thead>
            <tr>
                <td>ID</td>
                <td>Judul Film</td>
                <td>Jadwal Tayang</td>
                <td>Jam</td>
                <td>ID Studio</td>
                <td>Kelas</td>
                <td>Harga</td>
                <td>Hapus</td>
            </tr>
        </thead>
        <tbody>
        @foreach ( $data['data'] as $item )
            <tr>
                <td>{{$item['id_jadwal']}}</td>
                <td>{{$item['judul']}}</td>
                <td>{{$item['tanggal']}}</td>
                <td>{{$item['jam']}}</td>
                <td>{{$item['id_studio']}}</td>
                <td>{{$item['kelas']}}</td>
                <td>{{$item['harga']}}</td>
                <td class="action">
                    <a href="{{url('/jadwal/delete')}}/{{$item['id_jadwal']}}" class="btn-delete">Hapus</a>
                </td>
            </tr>
        @endforeach
        </tbody>    
    </table>
</div>
@endsection
