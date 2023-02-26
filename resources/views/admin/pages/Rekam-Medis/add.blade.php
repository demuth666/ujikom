@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Tambah Dokter</header>
        <form action={{ route('store.dokter') }} method="POST">
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">

                        <div class="input-field">
                            <label>No Rekam Medis</label>
                            <input type="date" name="tgl_kunjungan" required>
                        </div>

                        <div class="input-field">
                            <label>Tanggal Kunjungan</label>
                            <input type="date" name="tgl_kunjungan" required>
                        </div>


                        <div class="input-field">
                            <label>Kd User</label>
                            <input type="number" name="kd_user" required>
                        </div>

                        <div class="input-field">
                            <label>Nama Dokter</label>
                            <input type="text" name="nama_dokter" required>
                        </div>

                        <div class="input-field">
                            <label>SIP</label>
                            <input type="number" name="sip" required>
                        </div>

                        <div class="input-field">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" required>
                        </div>
                    </div>
                </div>

                <div class="details-id">
                    <div class="fields">


                        <div class="input-field">
                            <label>No Telp</label>
                            <input type="number" name="no_tlp" required>
                        </div>

                        <div class="input-field">
                            <label>Alamat</label>
                            <input type="text" name="alamat" required>
                        </div>

                        <div class="input-field">
                        </div>

                        <button class="nextBtn">
                            <span class="btnText">Simpan</span>
                        </button>
                    </div>
                </div>
        </form>
    </div>
@endsection
