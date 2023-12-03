<form action="{{ url('update-kelengkapan', $item->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade" id="editKelengkapanModal{{ $item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h1 class="modal-title white" id="exampleModalLabel">Edit Kelengkapan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="mb-1">Kelengkapan Sticker</label>
                        <select class="form-select" aria-label="Default select example" name="sticker" id="sticker">
                            <option selected>{{ $item->sticker }}</option>
                            <option value="Lengkap Baik">Lengkap Baik</option>
                            <option value="Lengkap Rusak/Lusuh">Lengkap Rusak/Lusuh</option>
                            <option value="Tidak Lengkap">Tidak Lengkap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mb-1">item Ruangan</label>
                        <select class="form-select" aria-label="Default select example" name="ruangan" id="ruangan">
                            <option selected>{{ $item->ruangan }}</option>
                            <option value="Ada Baik">Ada Baik</option>
                            <option value="Ada Rusak/Lusuh">Ada Rusak/Lusuh</option>
                            <option value="Tidak Lengkap">Tidak Lengkap</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Pengecekan Pylong</label>
                        <select class="form-select" aria-label="Default select example" name="pylon" id="pylon">
                            <option selected>{{ $item->pylon }}</option>
                            <option value="Pylon dan Signed Hidup">Pylon dan Signed Hidup</option>
                            <option value="Signed Mati">Signed Mati</option>
                            <option value="Pylon Mati">Pylon Mati</option>
                            <option value="Pylon dan Signed Mati">Pylon dan Signed Mati</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Kondisi AC</label>
                        <select class="form-select" aria-label="Default select example" name="ac" id="ac">
                            <option selected>{{ $item->ac }}</option>
                            <option value="Dingin">Dingin</option>
                            <option value="Panas">Panas</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Kondisi Cat</label>
                        <select class="form-select" aria-label="Default select example" name="cat" id="cat">
                            <option selected>{{ $item->cat }}</option>
                            <option value="Baik">Baik</option>
                            <option value="Jelek">Jelek</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Kondisi Kerangkeng & Cover</label>
                        <select class="form-select" aria-label="Default select example" name="kerangkengCover" id="kerangkengCover">
                            <option selected>{{ $item->kerangkengCover }}</option>
                            <option value="Kerangkeng Terkunci & Cover Baik">Kerangkeng Terkunci & Cover Baik</option>
                            <option value="Kerangkeng Tidak Terkunci">Kerangkeng Tidak Terkunci</option>
                            <option value="Cover Rusak">Cover Rusak</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Kondisi Cover</label>
                        <select class="form-select" aria-label="Default select example" name="cover" id="cover">
                            <option selected>{{ $item->cover }}</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Lampu Hidup">Lampu Hidup</option>
                            <option value="Lampu Mati">Lampu Mati</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Kondisi Genset</label>
                        <select class="form-select" aria-label="Default select example" name="genset" id="genset">
                            <option selected>{{ $item->genset }}</option>
                            <option value="Berfungsi dengan baik">Berfungsi dengan baik</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Kondisi UPS</label>
                        <select class="form-select" aria-label="Default select example" name="ups" id="ups">
                            <option selected>{{ $item->ups }}</option>
                            <option value="Berfungsi dengan baik">Berfungsi dengan baik</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" value="{{$item->gambar}}">
                        <img src="{{ asset('img/'. $item->gambar) }}" name="gambar" id="gambar" height="10%" width="40%" alt="">
                    </div>
                    {{-- <div class="form-group col-auto">
                        <label class="mb-1">Terminal ID</label>
                        <input type="text" name="sticker" id="sticker" class="form-control"
                            placeholder="Masukkan Unit Kerja" value="{{$item->sticker}}">
                    </div>
                    <div class="form-group col-auto">
                        <label class="mb-1">Terminal ID</label>
                        <input type="text" name="tid" id="tid" class="form-control"
                            placeholder="Masukkan Unit Kerja" value="{{$item->tid}}">
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
