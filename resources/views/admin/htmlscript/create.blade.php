@extends('admin.layouts.app')
@section('title', 'Tambah Html Script')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h5>Tambah Html Script</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('sea.htmlscript.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating form-floating-outline mb-4">
                            <select name="type" class="form-control" id="">
                                <option value="">Pilih Tipe</option>
                                <option value="header">Header</option>
                                <option value="footer">Footer</option>
                            </select>
                            <label for="basic-default-fullname">Pilih Tipe</label>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="scripts" id="basic-default-fullname" placeholder="Masukan script" />
                            <label for="basic-default-fullname">Html Script</label>
                        </div>
                    </div>
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
