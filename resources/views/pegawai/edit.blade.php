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
                                        <li class="breadcrumb-item"><a href="/home">Pegawai</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Pegawai
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- // Basic multiple Column Form section start -->
                    <section id="multiple-column-form">
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Edit Data Anda</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form" action="{{ route('update-pegawai',$peg->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="">Nama</label>
                                                            <input type="text" name="nama_pegawai" id="nama_pegawai"
                                                                class="form-control" placeholder="Nama" value="{{ $peg->nama_pegawai }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="">PN</label>
                                                            <input type="num" name="pn" id="pn"
                                                                class="form-control" placeholder="Masukkan PN" value="{{ $peg->pn }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="" class="mb-1">Unit Kerja</label>
                                                            <select name="uker_id" id="uker_id" class="form-control select2" style="width: 100%">
                                                                <option value="{{ $peg->uker_id }}">{{ $peg->uker->uker }}</option>
                                                                @foreach ($uk as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->uker }}</option>
                                                                @endforeach
                                                            </select>
                                                            {{-- <label for="">Unit Kerja</label>
                                                            <input type="text" name="uker_id" id="uker_id"
                                                                class="form-control" placeholder="Unit Kerja" value="{{ $peg->uker_id }}"> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="" class="mb-1">TID</label>
                                                            <select name="tid_id" id="tid_id" class="form-control select2" style="width: 100%">
                                                                <option value="{{ $peg->tid_id }}">{{ $peg->tid->tid }}</option>
                                                                @foreach ($tid as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->tid }}</option>
                                                                @endforeach
                                                            </select>
                                                            {{-- <label for="email-id-column">TID</label>
                                                            <input type="text" name="tid_id" id="tid_id"
                                                                class="form-control" placeholder="TID"> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="" class="mb-1">Jabatan</label>
                                                            <select name="jabatan_id" id="jabatan_id" class="form-control select2" style="width: 100%">
                                                                <option value="{{ $peg->jabatan_id }}">{{ $peg->jabatan->jabatan }}</option>
                                                                @foreach ($jab as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->jabatan }}</option>
                                                                @endforeach
                                                            </select>
                                                            {{-- <label for="country-floating">Jabatan</label>
                                                            <input type="text" name="jabatan_id" id="jabatan_id"
                                                                class="form-control" placeholder="Pilih Jabatan"> --}}
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="">Kelengkapan</label>
                                                            <input type="text" name="kelengkapan_id" id="kelengkapan_id"
                                                                class="form-control" placeholder="Kelengkapan" value="{{ $peg->kelengkapan_id }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="">Keamanan</label>
                                                            <input type="text" name="keamanan_id" id="keamanan_id"
                                                                class="form-control" placeholder="Keamanan" value="{{ $peg->keamanan_id }}">
                                                        </div>
                                                    </div> --}}
                                                    
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Simpan</button>
                                                        <a type="button" href="/pegawai"
                                                            class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- // Basic multiple Column Form section end -->
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
                {{-- <form action="{{ url('update-pegawai',$item->id) }}" method="POST">
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
                                            placeholder="Masukkan Nama" value="{{ $item->nama_pegawai }}">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">PN Pegawai</label>
                                        <input type="number" name="pn" id="pn" class="form-control"
                                            placeholder="Masukkan PN" value="{{ $item->pn }}">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Unit Kerja</label>
                                        <input type="text" name="uker_id" id="uker_id" class="form-control"
                                            placeholder="Masukkan Unit Kerja" value="{{ $item->uker_id }}">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Jabatan</label>
                                        <select name="jabatan_id" id="jabatan_id" class="form-control select2" style="width: 100%">
                                            <option disabled value>Pilih Jabatan</option>
                                            <option value="{{ $item->jabatan_id }}">{{ $item->jabatan->jabatan }}</option>
                                            @foreach ($pegawai as $item)
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
                                            placeholder="Masukkan PN" value="{{ $item->tanggal }}">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Kelengkapan ATM/CRM</label>
                                        <input type="text" name="kelengkapan_id" id="kelengkapan_id"
                                            class="form-control" placeholder="Lapor Kelengkapan" value="{{ $item->kelengkapan_id }}">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Keamanan ATM/CRM</label>
                                        <input type="text" name="keamanan_id" id="keamanan_id"
                                            class="form-control" placeholder="Masukkan PN" value="{{ $item->keamanan_id }}">
                                    </div>
                                    <div class="form-group col-auto">
                                        <label for="" class="mb-1">Level</label>
                                        <input type="text" name="level" id="level"
                                            class="form-control" placeholder="Masukkan PN" value="{{ $item->level }}">
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
</body>

</html>
