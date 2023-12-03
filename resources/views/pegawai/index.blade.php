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
                                <h3>Data Master {{ auth()->user()->level }}</h3>
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
                            <div class="card-header mb-3">
                                <h4 class="card-title mb-3">Data Pegawai</h4>
                                <div class="card-tools col-auto">
                                    <a href="{{ route('tambah-pegawai') }}" class="btn btn-success"><i
                                            class="bi bi-send-plus-fill"></i> Buat Laporan</a>
                                    <a href="{{ route('cetak-pegawai') }}" target="_blank" class="btn btn-primary"><i
                                            class="bi bi-printer"></i> Cetak Laporan</a>
                                </div>
                                <div class="row g-3 align-items-center mt-2 col-auto">
                                    <div class="col-auto">
                                        <form action="{{ route('pegawai') }}" method="GET">
                                            <input type="search" name="search" id="" class="form-control"
                                                placeholder="Search...">
                                        </form>
                                    </div>
                                    <div class="col-auto">
                                        <form action="{{ route('pegawai') }}" method="GET">
                                            <button type="submit" name="search" id=""
                                                class="btn btn-primary form-control">Search</button>
                                        </form>
                                    </div>
                                    {{-- <div class="col-auto">
                                        <a href="{{ route('exportPDF') }}" class="btn btn-danger"><i
                                                class="bi bi-filetype-pdf"></i> Download PDF</a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-md">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>PN</th>
                                                <th>Uker</th>
                                                <th>TID</th>
                                                <th>Jabatan</th>
                                                <th>Tanggal</th>
                                                {{-- <th>Kelengkapan</th>
                                                <th>Keamanan</th> --}}
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($pegawai as $index => $item)
                                                <tr>
                                                    <td>{{ $index + $pegawai->firstItem() }}</td>
                                                    <td>{{ $item->nama_pegawai }}</td>
                                                    <td>{{ $item->pn }}</td>
                                                    <td>{{ Str::limit($item->uker->uker, 10) }}</td>
                                                    <td>{{ Str::limit($item->tid->tid, 10) }}</td>
                                                    <td>{{ $item->jabatan->jabatan }}</td>
                                                    <td>{{ $item->created_at?->format('d-m-Y H:i:s') ?? '' }}</td>
                                                    <td>
                                                        <a href="{{ url('edit-pegawai', $item->id) }}"
                                                            class="btn btn-sm btn-warning"><i
                                                                class="bi bi-pencil-square"></i>
                                                        </a>

                                                        @if (auth()->user()->level == 'Admin')
                                                            <a href="{{ url('delete-pegawai', $item->id) }}"
                                                                class="btn btn-sm btn-danger"><i
                                                                    class="bi bi-trash3-fill"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{ $pegawai->links() }}
                            </div>
                        </div>
                    </section>
                </div>

                <!-- ========================== Modal Create ========================== -->
                {{-- <form action="{{ route('simpan-pegawai') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal fade" id="tambaheModal" tabindex="-1" aria-labelledby="tambaheModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="tambaheModalLabel">Laporan Pegawai</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Nama Pegawai</label>
                                        <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control"
                                            placeholder="Masukkan Nama">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">PN Pegawai</label>
                                        <input type="number" name="pn" id="pn" class="form-control"
                                            placeholder="Masukkan PN">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Unit Kerja</label>
                                        <input type="text" name="uker_id" id="uker_id" class="form-control"
                                            placeholder="Masukkan Unit Kerja">
                                    </div>
                                    <div class="form-group col-auto">
                                        <select name="jabatan_id" id="jabatan_id" class="form-control select2" style="width: 100%">
                                            <option disabled value>Pilih Jabatan</option>
                                            <option value="{{ $item->jabatan_id }}">{{ $item->jabatan->jabatan }}</option>
                                            @foreach ($pegawai as $item)
                                                <option value="{{ $item->id }}">{{ $item->jabatan }}</option>
                                            @endforeach
                                        </select>
                                        <label for="" class="mb-1">Jabatan</label>
                                        <input type="text" name="jabatan_id" id="jabatan_id" class="form-control"
                                            placeholder="Masukkan Jabatan">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Tanggal</label>
                                        <input type="date" name="tanggal" id="tanggal" class="form-control"
                                            placeholder="Masukkan PN">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Kelengkapan ATM/CRM</label>
                                        <input type="text" name="kelengkapan_id" id="kelengkapan_id"
                                            class="form-control" placeholder="Lapor Kelengkapan">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Keamanan ATM/CRM</label>
                                        <input type="text" name="keamanan_id" id="keamanan_id"
                                            class="form-control" placeholder="Masukkan PN">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Pilih Level</label>
                                        <input type="text" name="level" id="level"
                                            class="form-control" placeholder="Pilih Level">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> --}}
                {{-- ========================== end modal create ========================== --}}

                <!-- ========================== Modal Edit ========================== -->
                {{-- <form action="{{ url('update-pegawai',$peg->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editModalLabel">Laporan Pegawai</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Nama Pegawai</label>
                                        <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control"
                                            placeholder="Masukkan Nama" value="{{ $peg->nama_pegawai }}">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">PN Pegawai</label>
                                        <input type="number" name="pn" id="pn" class="form-control"
                                            placeholder="Masukkan PN" value="{{ $peg->pn }}">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Unit Kerja</label>
                                        <input type="text" name="uker_id" id="uker_id" class="form-control"
                                            placeholder="Masukkan Unit Kerja" value="{{ $peg->uker_id }}">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Jabatan</label>
                                        <select name="jabatan_id" id="jabatan_id" class="form-control select2" style="width: 100%">
                                            <option disabled value>Pilih Jabatan</option>
                                            <option value="{{ $peg->jabatan_id }}">{{ $peg->jabatan->jabatan }}</option>
                                            @foreach ($jab as $item)
                                                <option value="{{ $item->id }}">{{ $item->jabatan }}</option>
                                            @endforeach
                                        </select>
                                        <label for="" class="mb-1">Jabatan</label>
                                        <input type="text" name="jabatan_id" id="jabatan_id" class="form-control"
                                            placeholder="Masukkan Jabatan" value="{{ $item->jabatan_id }}">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Tanggal</label>
                                        <input type="date" name="tanggal" id="tanggal" class="form-control"
                                            placeholder="Masukkan PN" value="{{ $peg->tanggal }}">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Kelengkapan ATM/CRM</label>
                                        <input type="text" name="kelengkapan_id" id="kelengkapan_id"
                                            class="form-control" placeholder="Lapor Kelengkapan" value="{{ $peg->kelengkapan_id }}">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Keamanan ATM/CRM</label>
                                        <input type="text" name="keamanan_id" id="keamanan_id"
                                            class="form-control" placeholder="Masukkan PN" value="{{ $peg->keamanan_id }}">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Level</label>
                                        <input type="text" name="level" id="level"
                                            class="form-control" placeholder="Masukkan PN" value="{{ $peg->level }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> --}}
                {{-- ========================== end modal create ========================== --}}

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

    {{-- Required Script --}}
    @include('Template.script')
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@11'])
</body>

</html>
