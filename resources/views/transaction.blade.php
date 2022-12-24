@extends('layouts.app')

@section('content')
<div class="top-bar">
    <form action="/transaction" method="get">
        <input class="form-search" type="search" placeholder="Search" aria-label="Search" name="searchName"/>
        <button class="btn-search" type="submit">Search</button>
    </form>
</div>
<div class="content">
    <table class="table-data">
        <thead>
            <tr>
                <td>Kode Boking</td>
                <td>Nama Pelanggan</td>
                <td>Judul Film</td>
                <td>Studio</td>
                <td>Kelas</td>
                <td>Tanggal</td>
                <td>jam</td>
                <td>Jumlah Tiket</td>
                <td>Total Harga</td>
                <td>Tanggal Pembayaran</td>
            </tr>
        </thead>
        <tbody>
        @foreach ( $data['data'] as $item )
            <tr>
                <td>{{$item['kode_booking']}}</td>
                <td>{{$item['nama_pelanggan']}}</td>
                <td>{{$item['judul_film']}}</td>
                <td>{{$item['studio']}}</td>
                <td>{{$item['kelas']}}</td>
                <td>{{$item['tanggal']}}</td>
                <td>{{$item['jam']}}</td>
                <td>{{$item['jumlah_tiket']}}</td>
                <td>{{$item['total_harga']}}</td>
                <td>{{$item['created_at']}}</td>
            </tr>
        @endforeach
        </tbody>    
    </table>
</div>
@endsection
