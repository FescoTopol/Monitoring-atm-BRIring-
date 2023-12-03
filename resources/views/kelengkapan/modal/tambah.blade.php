<form action="{{route('simpan-kelengkapan')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="kelengkapanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title white" id="myModalLabel130">Tambah Info Kelengkapan
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="mb-1">Kelengkapan Sticker</label>
                        <select class="form-select" aria-label="Default select example" name="sticker" id="sticker">
                            <option selected>-- Pilih --</option>
                            <option value="Lengkap Baik">Lengkap Baik</option>
                            <option value="Lengkap Rusak/Lusuh">Lengkap Rusak/Lusuh</option>
                            <option value="Tidak Lengkap">Tidak Lengkap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mb-1">Kelengkapan Ruangan</label>
                        <select class="form-select" aria-label="Default select example" name="ruangan" id="ruangan">
                            <option selected>-- Pilih --</option>
                            <option value="Ada Baik">Ada Baik</option>
                            <option value="Ada Rusak/Lusuh">Ada Rusak/Lusuh</option>
                            <option value="Tidak Lengkap">Tidak Lengkap</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Pengecekan Pylong</label>
                        <select class="form-select" aria-label="Default select example" name="pylon" id="pylon">
                            <option selected>-- Pilih --</option>
                            <option value="Pylon dan Signed Hidup">Pylon dan Signed Hidup</option>
                            <option value="Signed Mati">Signed Mati</option>
                            <option value="Pylon Mati">Pylon Mati</option>
                            <option value="Pylon dan Signed Mati">Pylon dan Signed Mati</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Kondisi AC</label>
                        <select class="form-select" aria-label="Default select example" name="ac" id="ac">
                            <option selected>-- Pilih --</option>
                            <option value="Dingin">Dingin</option>
                            <option value="Panas">Panas</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Kondisi Cat</label>
                        <select class="form-select" aria-label="Default select example" name="cat" id="cat">
                            <option selected>-- Pilih --</option>
                            <option value="Baik">Baik</option>
                            <option value="Jelek">Jelek</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Kondisi Kerangkeng & Cover</label>
                        <select class="form-select" aria-label="Default select example" name="kerangkengCover" id="kerangkengCover">
                            <option selected>-- Pilih --</option>
                            <option value="Kerangkeng Terkunci & Cover Baik">Kerangkeng Terkunci & Cover Baik</option>
                            <option value="Kerangkeng Tidak Terkunci">Kerangkeng Tidak Terkunci</option>
                            <option value="Cover Rusak">Cover Rusak</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Kondisi Cover</label>
                        <select class="form-select" aria-label="Default select example" name="cover" id="cover">
                            <option selected>-- Pilih --</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Lampu Hidup">Lampu Hidup</option>
                            <option value="Lampu Mati">Lampu Mati</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Kondisi Genset</label>
                        <select class="form-select" aria-label="Default select example" name="genset" id="genset">
                            <option selected>-- Pilih --</option>
                            <option value="Berfungsi dengan baik">Berfungsi dengan baik</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Kondisi UPS</label>
                        <select class="form-select" aria-label="Default select example" name="ups" id="ups">
                            <option selected>-- Pilih --</option>
                            <option value="Berfungsi dengan baik">Berfungsi dengan baik</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-info ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


{{-- <form action="#" method="POST">
    {{ csrf_field() }}
    <div class="modal fade" id="kelengkapanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kelengkapan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="mb-1">Kelengkapan Sticker</label>
                        <select class="form-control" name="sticker" id="sticker">
                            <option disable value>-- Pilih --</option>
                            <option value="">Lengkap Baik</option>
                            <option value="">Lengkap Rusak/Lusuh</option>
                            <option value="">Tidak Lengkap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mb-1">Kelengkapan Ruangan</label>
                        <select class="form-control" name="ruangan" id="ruangan">
                            <option disable value>-- Pilih --</option>
                            <option value="">Ada Baik</option>
                            <option value="">Ada Rusak/Lusuh</option>
                            <option value="">Tidak Lengkap</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Pengecekan Pylong</label>
                        <select class="form-control" name="pylong" id="pylong">
                            <option disable value>-- Pilih --</option>
                            <option value="">Pylon dan Signed Hidup</option>
                            <option value="">Signed Mati</option>
                            <option value="">Pylon Mati</option>
                            <option value="">Pylon dan Signed Mati</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Kondisi AC</label>
                        <select class="form-control" name="ac" id="ac">
                            <option disable value>-- Pilih --</option>
                            <option value="">Dingin</option>
                            <option value="">Panas</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Kondisi Cat</label>
                        <select class="form-control" name="cat" id="cat">
                            <option disable value>-- Pilih --</option>
                            <option value="">Baik</option>
                            <option value="">Jelek</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form> --}}
