<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    //PART FOR MOVIE
    public function getMovie(Request $request) {
        $client = new Client();
        if(isset($request->searchTitle)){
            $filmResponse = $client->request('GET', "http://localhost:5000/film/search/$request->searchTitle");
        }else{
            $filmResponse = $client->request('GET', 'http://localhost:5000/film/');
        }

        $body = $filmResponse->getBody()->getContents();
        $film = json_decode($body, true);
        //($data);
        return view("filmList", ["data" => $film]);
    }

    public function getDetailMovie($id){
        $client = new Client();
        $filmResponse = $client->request  ('POST', "http://localhost:5000/film/$id");
        $jadwalResponse = $client->request('POST', "http://localhost:5000/film/jadwal/$id");
        $studioResponse = $client->request('GET', "http://localhost:5000/studio");
        $fBody = $filmResponse->getBody()->getContents();
        $jBody = $jadwalResponse->getBody()->getContents();
        $sBody = $studioResponse->getBody()->getContents();
        $detail = json_decode($fBody, true);
        $jadwal = json_decode($jBody, true);
        $studios = json_decode($sBody, true);
        extract($detail);
        extract($jadwal);
        extract($studios);
        //($data);
        return view("detailFilm", ["detail" => $detail, "jadwal" => $jadwal, "studios" => $studios]);
    }

    public function addMovie(Request $request){
        $client = new Client();
        $filmResponse = $client->request('POST', "http://localhost:5000/film/add", [ 'json'=> [
            'judul' => $request->judul,
            'rating' => $request->rating,
            'storyline' => $request->storyline,
            'poster' => $request->poster,
            'banner' => $request->banner
        ]]);
        $fBody = $filmResponse->getBody()->getContents();
        $detail = json_decode($fBody, true);
        extract($detail);
         //dd($request);
       return redirect("/film");
    }

    

    public function addMovieForm(){
        return view("addFilm");
    }

    public function updateMovieForm($id){
        $client = new Client();
        $filmResponse = $client->request('POST', "http://localhost:5000/film/$id");
        $fBody = $filmResponse->getBody()->getContents();
        $detail = json_decode($fBody, true);
        extract($detail);
        //($data);
        return view("updateFilm", ["detail" => $detail]);
    }
    
    public function updateMovie(Request $request, $id){
        $client = new Client();
        $filmResponse = $client->request('PUT', "http://localhost:5000/film/update/$id", ['json' => [
            'judul' => $request->judul,
            'rating' => $request->rating,
            'storyline' => $request->storyline,
            'poster' => $request->poster,
            'banner' => $request->banner
        ]]);
        $jadwalResponse = $client->request('POST', "http://localhost:5000/film/jadwal/$id" );
        $studioResponse = $client->request('GET', "http://localhost:5000/studio");
        $fBody = $filmResponse->getBody()->getContents();
        $jBody = $jadwalResponse->getBody()->getContents();
        $sBody = $studioResponse->getBody()->getContents();
        $detail = json_decode($fBody, true);
        $jadwal = json_decode($jBody, true);
        $studios = json_decode($sBody, true);
        extract($detail);
        extract($jadwal);
        extract($studios);
        ($data);
        //return redirect("/film");
        return view("detailFilm", ["detail" => $detail, "jadwal" => $jadwal, "studios" => $studios]);
        
    }
    
    public function deleteMovie($id){
        $client = new Client();
        $filmResponse = $client->request('POST', "http://localhost:5000/film/delete/$id");
        $fBody = $filmResponse->getBody()->getContents();
        $detail = json_decode($fBody, true);
        extract($detail);
        //($data);
        return redirect("/film");
    }

    //PART FOR CUSTOMER
    public function getCustomer(Request $request) {
        $client = new Client();
        $keyword = $request->searchName;
        if(isset($keyword)){
            $response = $client->request('GET', "http://localhost:5000/pelanggan//search/$keyword");
        }else{
            $response = $client->request('GET', 'http://localhost:5000/pelanggan');
        }
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        //($data);
        return view("customer", ["data" => $data]);
    }
    public function deleteCustomer($id) {
        $client = new Client();
        $pelangganResponse = $client->request('POST', "http://localhost:5000/pelanggan/delete/$id");
        return redirect()->back();
    }

    //PART FOR JADWAL
    public function addJadwal(Request $request, $id){
        $client = new Client();
        $filmResponse = $client->request('POST', "http://localhost:5000/jadwal/add", ['json' => [
            'id_film' => $id,
            'id_studio' => $request->id_studio,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'jam' => $request->jam
        ]]);
        $fBody = $filmResponse->getBody()->getContents();
        $detail = json_decode($fBody, true);
        extract($detail);
        //($data);
        return redirect()->back();
    }

    public function getAllJadwal(Request $request){
        $client = new Client();
        $keyword = $request->searchTitle;
        if(isset($keyword)){
            $response = $client->request('GET', "http://localhost:5000/jadwal/search/$keyword");
        }else{
            $response = $client->request('GET', 'http://localhost:5000/jadwal');
        }
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        //($data);
        return view("schedule", ["data" => $data]);
    }

    public function deleteJadwal($id){
        $client = new Client();
        $filmResponse = $client->request('POST', "http://localhost:5000/jadwal/delete/$id");
        $fBody = $filmResponse->getBody()->getContents();
        $detail = json_decode($fBody, true);
        extract($detail);
        //($data);
        return redirect()->back();
    }

    public function getTransaction(){
        $client = new Client();
        $filmResponse = $client->request('GET', 'http://localhost:5000/transaction');
        $body = $filmResponse->getBody()->getContents();
        $data = json_decode($body, true);
        //($data);
        return view("transaction", ["data" => $data]);
    }
}