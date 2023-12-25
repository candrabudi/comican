@extends('admin.layouts.app')
@section('title', 'Edit Komik')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h5>Edit Komik</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('sea.comic.update', $comic->id) }}">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="comic_title" value="{{ $comic->title }}"
                                id="comic-title" placeholder="Masukan Juudl Komik" />
                            <label for="comic-title">Nama Komik</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="comic_slug" value="{{ $comic->slug }}"
                                id="comic-slug" readonly />
                            <label for="comic-slug">Slug Komik</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="comic_alternative"
                                value="{{ $comic->alternative }}" id="comic-alternative" />
                            <label for="comic-alternative">Judul Alternative</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="comic_serialization"
                                value="{{ $comic->serialization }}" id="comic-serialization"
                                placeholder="Masukan Juudl Komik" />
                            <label for="comic-serialization">Serialization</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="comic_author" value="{{ $comic->author }}"
                                id="comic-author" />
                            <label for="comic-author">Author</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="comic_artist" value="{{ $comic->artist }}"
                                id="comic-artist" />
                            <label for="comic-artist">Artist</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <textarea class="form-control h-px-250" id="exampleFormControlTextarea1" placeholder="Comments here...">{{ $comic->description }}</textarea>
                            <label for="exampleFormControlTextarea1">Deskripsi Komik</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <button class="btn btn-lg btn-warning">Simpan</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <select class="form-select" id="exampleFormControlSelect1" name="comic_status" aria-label="Default select example">
                                <option value="ongoing" {{ $comic->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="completed" {{ $comic->status == 'Completed' ? 'selected' : '' }}>Completed
                                </option>
                                <option value="hiatus" {{ $comic->status == 'Hiatus' ? 'selected' : '' }}>Hiatus</option>
                            </select>
                            <label for="exampleFormControlSelect1">Status Komik</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <select class="form-select" id="exampleFormControlSelect1" name="comic_type" aria-label="Default select example">
                                <option value="Manhwa" {{ $comic->type == 'Manhwa' ? 'selected' : '' }}>Manhwa</option>
                                <option value="Manga" {{ $comic->type == 'Manga' ? 'selected' : '' }}>Manga</option>
                                <option value="Manhua" {{ $comic->type == 'Manhua' ? 'selected' : '' }}>Manhua</option>
                            </select>
                            <label for="exampleFormControlSelect1">Tipe Komik</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <select class="form-select" id="exampleFormControlSelect1" name="comic_slider" aria-label="Default select example">
                                <option value="Yes" {{ $comic->slider == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ $comic->slider == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                            <label for="exampleFormControlSelect1">Slider</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <select class="form-select" name="comic_hot" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option value="Yes" {{ $comic->hot == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ $comic->hot == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                            <label for="exampleFormControlSelect1">Hot</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="comic_released" value="{{ $comic->released }}"
                                id="comic-released" />
                            <label for="comic-released">Rilis</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="comic_rating" value="{{ $comic->rating }}"
                                id="comic-rating" />
                            <label for="comic-rating">Rating</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <img src="{{ asset('/storage//'.$comic->thumb) }}" width="150" alt="">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('styles')

@endsection
@section('scripts')

@endsection
