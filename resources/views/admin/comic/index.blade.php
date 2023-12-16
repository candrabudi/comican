@extends('admin.layouts.app')
@section('title', 'Data Komik')
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
            <h5>List Komik</h5>
            <button type="button" class="mb-3 btn btn-success btn-sm ms-auto" data-bs-toggle="modal"
                data-bs-target="#modalToggle">
                Tambah Komik
            </button>
            {{-- <form action="{{ route('sea.comic.crawl.chapter.all') }}" method="POST"> --}}
                {{-- @csrf --}}
                <button class="mb-3 btn btn-warning btn-sm mas-auto" id="startProcess" style="margin-left: 10px;"
                    {{ $chapterLink == 0 ? 'disabled' : '' }}>
                    <span class="badge bg-label-danger" style="margin-right: 10px;">{{ $chapterLink }}</span>
                    Auto Crawl
                </button>
            {{-- </form> --}}
        </div>
        <div class="card-datatable text-wrap">
            <table class="table" id="get-comics">
                <thead>
                    <tr>
                        <th width="50">No.</th>
                        <th width="160">Judul</th>
                        <th>Deskripsi</th>
                        <th width="50">Status</th>
                        <th width="50">Rating</th>
                        <th width="150">Thumbnail</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- Modal 1-->
    <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalToggleLabel">Bulk Upload Komik</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('sea.comic.crawl.process') }}">
                        @csrf
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="url" id="basic-default-fullname"
                                placeholder="Masukan Url Komik" />
                            <label for="basic-default-fullname">Url Komik</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
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
                ajax: '{!! route('sea.comic.datatable') !!}',
                columns: [{
                        data: 'no'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'rating'
                    },
                    {
                        data: 'thumb',
                        render: function(data) {
                            return '<img src="' + data + '" style="width: 150px;">';
                        }
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
    <script>
        document.getElementById('startProcess').addEventListener('click', function() {
            // Kirim permintaan AJAX saat tombol diklik
            sendStartRequest();
        });
    
        function sendStartRequest() {
            fetch('{{ route('sea.comic.crawl.chapter.all') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(response => {
                if (response.ok) {
                    console.log('Data insertion started successfully');
                    // Handle successful response, if needed
                } else {
                    console.error('Failed to start data insertion');
                    // Handle failed response, if needed
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
@endsection
