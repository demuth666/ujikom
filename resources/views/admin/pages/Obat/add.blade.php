@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Tambah Obat</header>
        <form action={{ route('store.obat') }} method="POST">
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>Nama Obat</label>
                            <input type="text" name="nama_obat" required>
                        </div>

                        <div class="input-field">
                            <label>Jumlah Obat</label>
                            <input type="number" name="jml_obat" required>
                        </div>

                        <div class="input-field">
                            <label>Ukuran</label>
                            <input type="number" name="ukuran" required>
                        </div>

                        <div class="input-field">
                            <label>Harga</label>
                            <input type="number" name="harga" required>
                        </div>
                    </div>
                </div>
                <div class="details-id">
                    <div class="fields">
                        <button class="nextBtn">
                            <span class="btnText">Simpan</span>
                        </button>
                    </div>
                </div>
        </form>
    </div>
@endsection
