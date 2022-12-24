@extends('layouts.app')

@section('content')
<div class="card update-film">
    <form method="GET" action="/tambah">
        <div class="row mb-3">
            <label for="judul" class="col-md-4 col-form-label text-md-end">Judul</label>
            <div class="col-md-6">
                <input id="judul" type="text" class="form-control" name="judul" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="rating" class="col-md-4 col-form-label text-md-end">Rating</label>
            <div class="col-md-6">
                <input id="rating" type="text" class="form-control" name="rating" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="storyline" class="col-md-4 col-form-label text-md-end">Sinopsis</label>
            <div class="col-md-6">
                <textarea id="storyline" type="text-area" class="form-control" name="storyline" required></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="poster" class="col-md-4 col-form-label text-md-end">Poster</label>
            <div class="col-md-6">
                <input id="poster" type="text" class="form-control" name="poster" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="banner" class="col-md-4 col-form-label text-md-end">Banner</label>
            <div class="col-md-6">
                <input id="banner" type="text" class="form-control" name="banner" required>
            </div>
        </div>
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

@endsection
