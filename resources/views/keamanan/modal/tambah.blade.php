<!-- full size modal-->
<div class="modal fade text-left w-100" id="keamananModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel20"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel20">Tambah Laporan Keamanan ATM/CRM</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{ route('simpan-keamanan') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Pemeriksaan Router/Hub di belakang mesin ATM / Backdrop (Mencurigakan)</label>
                                <select class="form-select" aria-label="Default select example" name="routerhub" id="routerhub">
                                    <option selected>-- Pilih --</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Pemeriksaan Deep Insert Skimmer di dalam Card Reader (Mencurigakan)</label>
                                <select class="form-select" aria-label="Default select example" name="deep_skimmer" id="deep_skimmer">
                                    <option selected>-- Pilih --</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Pemeriksaan Alat Skimmer di Mulut Card Reader (Mencurigakan)</label>
                                <select class="form-select" aria-label="Default select example" name="skimming" id="skimming">
                                    <option selected>-- Pilih --</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Pemeriksaan Atap Ruang ATM (Downlite Lampu) (Mencurigakan)</label>
                                <select class="form-select" aria-label="Default select example" name="downlite_lampu" id="downlite_lampu">
                                    <option selected>-- Pilih --</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Pemeriksaan Atap Ruang ATM (Smoke Detector / Pendeteksi Asap) (Mencurigakan)</label>
                                <select class="form-select" aria-label="Default select example" name="smoke_detector" id="smoke_detector">
                                    <option selected>-- Pilih --</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Pemeriksaan pada moncong Card Reader, Terdapat lubang kecil untuk perekam / Mini kamera (Mencurigakan)</label>
                                <select class="form-select" aria-label="Default select example" name="cover_card_Reader" id="cover_card_Reader">
                                    <option selected>-- Pilih --</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Pemeriksaan pada cover Pin Pad dan Pin pad serta bagian atas pinpad (terdapat perekam / Mini Camera) Mencurigakan</label>
                                <select class="form-select" aria-label="Default select example" name="pinpad" id="pinpad">
                                    <option selected>-- Pilih --</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Pemeriksaan pada bagian atas / layar monitor ATM (terdapt perekam / Mini Camera) (Mencurigakan)</label>
                                <select class="form-select" aria-label="Default select example" name="monitor_atm" id="monitor_atm">
                                    <option selected>-- Pilih --</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Pemeriksaan pada Card Reader ATM (terdapat penganjalan menggunakan mika kecil, tusuk gigi & sejenis lainnya) (Mencurigakan)</label>
                                <select class="form-select" aria-label="Default select example" name="card_reader_atm" id="card_reader_atm">
                                    <option selected>-- Pilih --</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Pemeriksaan pada ATM (terdapat tempelan Call Center BRI Palsu) Mencurigakan</label>
                                <select class="form-select" aria-label="Default select example" name="call_center" id="call_center">
                                    <option selected>-- Pilih --</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Terpasang angkur atau tidak (cara cek angkur pakai mistar selipkan di bawah ATM / didorong)</label>
                                <select class="form-select" aria-label="Default select example" name="angkur" id="angkur">
                                    <option selected>-- Pilih --</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="mb-4">Keterangan Apabila Ada Hal Mencurigakan Lainnya</label>
                                <textarea name="keterangan" id="default" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="button" class="btn btn-light-secondary me-1 mb-1" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
