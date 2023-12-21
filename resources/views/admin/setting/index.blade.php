@extends('admin.layouts.app')
@section('title', 'Pengaturan Website')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h5>Pengaturan Website</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('sea.comic.crawl.process') }}">
                @csrf
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="site_title" id="basic-default-fullname" placeholder="Masukan Url Komik" />
                    <label for="basic-default-fullname">Nama Website</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="site_keyword" id="basic-default-fullname" placeholder="Masukan Url Komik" />
                    <label for="basic-default-fullname">Keywords Website</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="site_description" id="basic-default-fullname" placeholder="Masukan Url Komik" />
                    <label for="basic-default-fullname">Deskripsi Website</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="site_logo" id="basic-default-fullname" placeholder="Masukan Url Komik" />
                    <label for="basic-default-fullname">Logo Website</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="site_icon" id="basic-default-fullname" placeholder="Masukan Url Komik" />
                    <label for="basic-default-fullname">Icon Website</label>
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
