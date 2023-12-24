@extends('admin.layouts.app')
@section('title', 'List Html Script')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header d-flex">
            <h5>List Html Script</h5>
            <button type="button" class="mb-3 btn btn-success btn-sm ms-auto" data-bs-toggle="modal"
                data-bs-target="#modalToggle">
                Tambah Komik
            </button>
        </div>
        <div class="card-datatable text-wrap">
            <table class="table" id="get-comics">
                <thead>
                    <tr>
                        <th width="50">No.</th>
                        <th width="160">Tipe</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('webpanel/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('webpanel/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
@endsection
@section('scripts')
    <script src="{{ asset('webpanel/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#get-comics').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('sea.htmlscript.datatable') !!}',
                columns: [{
                        data: 'no'
                    },
                    {
                        data: 'type'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: 'id',
                        render: function(id) {
                            return '<a href="/sea/comic/edit/' + id +
                                '" class="my-1 btn btn-warning btn-xs" wire:navigateerror  style="display: inline-block;"><i class="ti ti-edit me-1"></i> Edit</a>&nbsp;<button class="my-1 btn btn-danger btn-xs delete-post"  style="display: inline-block;" data-id="' +
                                id + '"><i class="ti ti-trash me-1"></i> Hapus</button>';
                        },
                    }
                ],
            });
        });
    </script>
@endsection
