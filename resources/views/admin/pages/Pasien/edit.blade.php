@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Edit Dokter</header>
        <form action="{{ route('update.pasien', $pasien->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">

                        <div class="input-field">
                            <label>Nama Pasien</label>
                            <input type="text" name="nama_pasien" value="{{ $pasien->nama_pasien }}" required>
                        </div>

                        <div class="input-field">
                            <label>Jenis Kelamin</label>
                            <select name="j_kelamin" value="{{ $pasien->j_kelamin }}" required>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Agama</label>
                            <input type="text" name="agama" value="{{ $pasien->agama }}" required>
                        </div>

                        <div class="input-field">
                            <label>Alamat</label>
                            <input type="text" name="alamat" value="{{ $pasien->alamat }}" required>
                        </div>

                        <div class="input-field">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" value="{{ $pasien->tgl_lahir }}" required>
                        </div>

                        <div class="input-field">
                            <label>Usia</label>
                            <input type="number" name="usia" value="{{ $pasien->usia }}" required>
                        </div>
                    </div>
                </div>

                <div class="details-id">
                    <div class="fields">


                        <div class="input-field">
                            <label>No Telp</label>
                            <input type="number" name="no_tlp" value="{{ $pasien->no_tlp }}" required>
                        </div>

                        <div class="input-field">
                            <label>Nama KK</label>
                            <input type="text" name="nm_kk" value="{{ $pasien->nm_kk }}" required>
                        </div>

                        <div class="input-field">
                            <label>Hub Kel</label>
                            <input type="text" name="hub_kel" value="{{ $pasien->hub_kel }}" required>
                        </div>
                        <button class="nextBtn">
                            <span class="btnText">Simpan</span>
                        </button>
                    </div>
                </div>
        </form>
    </div>
@endsection
