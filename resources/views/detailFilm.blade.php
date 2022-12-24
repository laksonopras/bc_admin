@extends('layouts.app')

@section('content')
<div class="row detail">
    <div class="col-md-4 col-xs-12">
        <img class="det-banner" src={{$detail['poster']}}>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="kanan">
            <div class="desc">
            <div class="det-judul">{{$detail['judul']}}</div>
            <div class="det-rating">Rating : {{$detail['rating']}}</div>
            <div class="det-sinopsis">Sinopsis :</div> 
            <div class="det-sinopsis">{{$detail['storyline']}}</div>
        </div>
        <table class="table-data">
            <thead>
                <tr>
                    <td>Tanggal</td>
                    <td>Jam</td>
                    <td>ID Studio</td>
                    <td>Kelas</td>
                    <td>Harga</td>
                </tr>
            </thead>
            <tbody>
            @foreach ($jadwal['data'] as $item )
                    <tr>
                        <td>{{$item['tanggal']}}</td>
                        <td>{{$item['jam']}}</td>
                        <td>{{$item['studio']}}</td>
                        <td>{{$item['kelas']}}</td>
                        <td>{{$item['harga']}}</td>
                        <td class="action">
                            <a href="{{url('/jadwal/delete')}}/{{$item['id_jadwal']}}" class="btn-delete">Hapus</a>
                        </td>
                    </tr>
            @endforeach
            <tr>
                    <td>Awal tayang</td>
                    <td>Akhir tayang</td>
                    <td>Jam</td>
            </tr>
            <tr>
                <form action="/film/jadwal/add/{{$detail['id_film']}}" method="get">
                    <td><input type="date" name="tanggal_awal" placeholder="start"></td>
                    <td><input type="date" name="tanggal_akhir" placeholder="end"></td>
                    <td><input type="time" name="jam" placeholder="jam"></td>
                    <td><select name="id_studio">
                    <option selected >Pilih Studio</option>
                        @foreach ($studios["studio"] as $studio)
                            <option  value="{{$studio['id_studio']}}">{{$studio['id_studio'] ." ".  $studio['kelas']}}</option>
                        @endforeach
                        </select></td>
                    <td><button class="btn-search" type="submit">Submit</button></td>
                </form>
       
            </tr>
            </tbody>    
        </table>
        <a href="{{url('/film/update/form')}}/{{$detail['id_film']}}" class="upt">
            <div class="btn-det btn-det-update">Perbarui</div>
        </a>
        <a href="{{url('/film/delete')}}/{{$detail['id_film']}}" class="upt">
            <div class="btn-det btn-det-delete">Hapus</div>
        </a>

        
        
    </div>
</div>


@endsection
