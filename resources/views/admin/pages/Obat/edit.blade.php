@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Edit Obat</header>
        <form action="{{ route('update.obat', $obat->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>Nama Obat</label>
                            <input type="text" name="nama_obat" value="{{ $obat->nama_obat }}" required>
                        </div>

                        <div class="input-field">
                            <label>Jumlah Obat</label>
                            <input type="number" name="jml_obat" value="{{ $obat->jml_obat }}" required>
                        </div>

                        <div class="input-field">
                            <label>Ukuran</label>
                            <input type="number" name="ukuran" value="{{ $obat->ukuran }}" required>
                        </div>

                        <div class="input-field">
                            <label>Harga</label>
                            <input type="number" name="harga" value="{{ $obat->harga }}" required>
                        </div>

                        <button class="nextBtn">
                            <span class="btnText">Simpan</span>
                        </button>
                    </div>
                </div>
        </form>
    </div>
@endsection
