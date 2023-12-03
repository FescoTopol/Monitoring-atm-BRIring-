<!DOCTYPE html>
<html lang="en">

<head>
    @include('Template.head')
</head>

<body>
    <script src="/assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            @include('Template.sidebar')
        </div>

        <div id="main" class='layout-navbar navbar-fixed'>
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">

                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">Hello, {{ auth()->user()->name }} !</h6>
                                            <p class="mb-0 text-sm text-gray-600">{{ auth()->user()->level }}</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="/assets/compiled/jpg/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Data Keamanan ATM/CRM {{ auth()->user()->level }}</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/home">Data Master</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Keamanan
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <h4 class="card-title">Data Pegawai</h4>
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#keamananModal">
                                        <i class="bi bi-send-plus"></i> Buat Laporan
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-md">
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Router/Hub</th>
                                            <th scope="col">Deep Skimmer</th>
                                            <th scope="col">Skimming</th>
                                            <th scope="col">Downlite Lampu</th>
                                            <th scope="col">Smoke Detector</th>
                                            <th scope="col">Cover Card Reader</th>
                                            <th scope="col">Pinpad & Covernya</th>
                                            <th scope="col">Monitor ATM</th>
                                            <th scope="col">Card Reader</th>
                                            <th scope="col">Call Center</th>
                                            <th scope="col">Angkur</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Dilaporkan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($keamanan as $item)
                                            <tr>
                                                <td scope="row">{{ $no++ }}</td>
                                                <td>{{ $item->routerhub }}</td>
                                                <td>{{ $item->deep_skimmer }}</td>
                                                <td>{{ $item->skimming }}</td>
                                                <td>{{ $item->downlite_lampu }}</td>
                                                <td>{{ $item->smoke_detector }}</td>
                                                <td>{{ $item->cover_card_Reader }}</td>
                                                <td>{{ $item->pinpad }}</td>
                                                <td>{{ $item->monitor_atm }}</td>
                                                <td>{{ $item->card_reader_atm }}</td>
                                                <td>{{ $item->call_center }}</td>
                                                <td>{{ $item->angkur }}</td>
                                                {{-- <td>{{ Str::limit($item->keterangan,10) }}</td> --}}
                                                <td>{{ $item->created_at->format('d-m-Y H:i:s') }}</td>

                                                <td>
                                                    <button href="{{ url('edit-keamanan', $item->id) }}"
                                                        class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#editkeamananModal{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>

                                                    {{-- @if (auth()->user()->level == 'Admin') --}}
                                                    <a href="{{ url('delete-keamanan', $item->id) }}" class="btn btn-sm btn-danger">
                                                        <i class="bi bi-trash3-fill"></i>
                                                    </a>
                                                    {{-- @endif --}}
                                                </td>
                                                @include('keamanan.modal.edit')
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Bank Rakyat Indonesia</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted <span class="text-danger"></span>
                            by <a href="https://saugi.me">Fesco Topol</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('keamanan.modal.tambah')

    {{-- Required Script --}}
    @include('Template.script')
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@11'])
</body>
{{-- <script>
    $('.delete').click(function {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
            }
        });
    });
</script> --}}

</html>
