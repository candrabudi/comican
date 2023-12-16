@extends('admin.layouts.app')
@section('title', 'Tambah Komik')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h5>Tambah Komik</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('sea.comic.crawl.process') }}">
                @csrf
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="url" id="basic-default-fullname" placeholder="Masukan Url Komik" />
                    <label for="basic-default-fullname">Url Komik</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <select name="" class="form-control" id="">
                        <option value="">Pilih Web Komik</option>
                        <option value="Kiryuu" selected>Kiryuu</option>
                        <option value="Komikindo">Komikindo</option>
                    </select>
                    <label for="basic-default-fullname">Pilih Web Komik</label>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
@endsection
@section('styles')

@endsection
@section('scripts')

@endsection
