@extends('layouts.app')

@section('content')
<div class="top-bar">
    <form action="/customer" method="get">
        <input class="form-search" type="search" placeholder="Search" aria-label="Search" name="searchName"/>
        <button class="btn-search" type="submit">Search</button>
    </form>
</div>
<div class="content">
    <table class="table-data">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        @foreach ( $data['data'] as $item )
            <tr>
                <td>{{$item['id_pelanggan']}}</td>
                <td>{{$item['nama']}}</td>
                <td>{{$item['email']}}</td>
                <td class="action">
                    <a href="{{url('/customer/delete')}}/{{$item['id_pelanggan']}}" class="btn-delete">Hapus</a>
                </td>
            </tr>
        @endforeach
        </tbody>    
    </table>
</div>
@endsection
