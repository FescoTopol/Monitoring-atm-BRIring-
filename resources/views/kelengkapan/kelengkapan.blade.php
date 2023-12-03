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
                                <h3>Data Kelengkapan {{ auth()->user()->level }}</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/home">Data Master</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Pegawai
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
                                        data-bs-target="#kelengkapanModal">
                                        <i class="bi bi-send-plus"></i> Buat Laporan
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-md">
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Sticker</th>
                                            <th scope="col">Ruangan</th>
                                            <th scope="col">Pylon & Signed</th>
                                            <th scope="col">AC</th>
                                            <th scope="col">Cat</th>
                                            <th scope="col">Kerangkeng & Cover</th>
                                            <th scope="col">Cover</th>
                                            <th scope="col">Genset</th>
                                            <th scope="col">UPS</th>
                                            <th scope="col">Dilaporkan</th>
                                            <th scope="col">Gambar</th>
                                            {{-- <th>Kelengkapan</th>
                                            <th>Keamanan</th> --}}
                                            <th scope="col">Aksi</th>
                                        </tr>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($kelengkapan as $item)
                                            <tr>
                                                <td scope="row">{{ $no++ }}</td>
                                                <td>{{ Str::limit($item->sticker,10) }}</td>
                                                <td>{{ $item->ruangan }}</td>
                                                <td>{{ Str::limit($item->pylon,10) }}</td>
                                                <td>{{ $item->ac }}</td>
                                                <td>{{ $item->cat }}</td>
                                                <td>{{ $item->kerangkengCover }}</td>
                                                <td>{{ $item->cover }}</td>
                                                <td>{{ $item->genset }}</td>
                                                <td>{{ $item->ups }}</td>
                                                <td>{{ $item->created_at->format('d-m-Y H:i:s') }}</td>
                                                <td>
                                                    <a href="{{ asset('img/' . $item->gambar) }}" target="_blank"
                                                        rel="noopener noreferrer">Lihat Gambar</a>
                                                </td>

                                                <td>
                                                    <button href="{{ url('edit-kelengkapan', $item->id) }}"
                                                        class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#editKelengkapanModal{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>

                                                    @if (auth()->user()->level == 'Admin')
                                                    <a href="{{ url('delete-kelengkapan', $item->id) }}" class="btn btn-sm btn-danger">
                                                        <i class="bi bi-trash3-fill"></i>
                                                    </a>
                                                    @endif
                                                </td>
                                                @include('kelengkapan.modal.edit')
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
    @include('kelengkapan.modal.tambah')

    {{-- Required Script --}}
    @include('Template.script')
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@11'])
</body>
{{-- <script>
    $('#delete').click(function {
        var kelengkapanid = $(this).attr('data-id');
        Swal.fire({
            title: "Yakin Hapus Data Ini ?",
            text: "Kamu akan hapus data kelengkapan dengan id "+kelengkapanid+" !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/delete-kelengkapan/"+kelengkapanid+""
                Swal.fire({
                    title: "Deleted!",
                    text: "Data ini berhasil dihapus.",
                    icon: "success"
                });
            }
        });
    });
</script> --}}

</html>
