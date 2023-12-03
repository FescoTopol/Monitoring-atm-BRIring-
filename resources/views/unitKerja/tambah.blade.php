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
                                            <h6 class="mb-0 text-gray-600">{{ auth()->user()->name }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">{{ auth()->user()->level }}</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="/assets/compiled/jpg/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{ auth()->user()->name }} !</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="icon-mid bi bi-person me-2"></i> My
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
                                    </li>
                                </ul>
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
                                        <li class="breadcrumb-item active" aria-current="page">Unit Kerja
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Unit Kerja BRI BO Tondano</h4>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#ukerModal">
                                        <i class="bi bi-folder-plus"></i> Tambah Uker
                                    </button>
                                    {{-- <a href="#" type="button" class="btn btn-success" 
                                        ><i class="bi bi-folder-plus"></i> Tambah Uker</a> --}}
                                    {{-- <a href="{{ route('cetak-pegawai') }}" target="_blank" class="btn btn-primary"
                                        ><i class="bi bi-printer"></i> Cetak Laporan</a> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>#</th>
                                        <th>Uker</th>
                                        <th>Aksi</th>
                                    </tr>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($uker as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->uker }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUkerModal">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                {{-- <a href="{{ url('edit-uker', $item->id) }}"
                                                    class="btn btn-sm btn-warning"><i
                                                        class="bi bi-pencil-square"></i></a> --}}
                                                |
                                                <a href="{{ url('delete-uker', $item->id) }}"
                                                    class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                {{ $uker->links() }}
                            </div>
                        </div>
                    </section>
                </div>

                {{-- ==================== Modal Tambah Uker ====================== --}}
                {{-- <form action="{{ route('simpan-pegawai') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal fade" id="ukerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Uker</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-auto">
                                        <label class="mb-1">Unit Kerja</label>
                                        <input type="text" name="uker" id="uker" class="form-control"
                                            placeholder="Masukkan Unit Kerja">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> --}}

                <!-- ============================ Modal Edit Uker =========================== -->
                {{-- <form action="{{ route('update-pegawai',$unit->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal fade" id="editUkerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Uker</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-auto">
                                        <label class="mb-1">Unit Kerja</label>
                                        <input type="text" name="uker" id="uker" class="form-control"
                                            placeholder="Masukkan Unit Kerja" value="{{$unit->uker_id}}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> --}}
                <!-- ========================== End Modal Edit Uker ========================== -->

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
