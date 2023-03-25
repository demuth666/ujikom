@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Tambah Pasien</header>
        <form action="{{ route('store.pasien') }}" method="POST">
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">

                        <div class="input-field">
                            <label>Nama Pasien</label>
                            <input type="text" name="nama_pasien" required>
                        </div>

                        <div class="input-field">
                            <label>Jenis Kelamin</label>
                            <select name="j_kelamin" required>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Agama</label>
                            <input type="text" name="agama" required>
                        </div>

                        <div class="input-field">
                            <label>Alamat</label>
                            <input type="text" name="alamat" required>
                        </div>

                        <div class="input-field">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" required>
                        </div>

                        <div class="input-field">
                            <label>Usia</label>
                            <input type="number" name="usia" required>
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
                            <label>No KK</label>
                            <input type="number" name="nm_kk" required>
                        </div>
                        <div class="input-field">
                            <label>Hub Keluarga</label>
                            <input type="text" name="hub_kel" required>
                        </div>
                        <button class="nextBtn">
                            <span class="btnText">Simpan</span>
                        </button>
                    </div>
                </div>
        </form>
    </div>
@endsection
