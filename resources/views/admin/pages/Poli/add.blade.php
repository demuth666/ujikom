@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Tambah Poli</header>
        <form action="{{ route('store.poli') }}" method="POST">
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>Nama Poli</label>
                            <input type="text" name="nama_poli" required>
                        </div>

                        <div class="input-field">
                        </div>


                    </div>
                </div>
                <div class="details-id">
                    <div class="fields">
                        <div class="input-field">
                            <label>lantai</label>
                            <input type="number" name="lantai" required>
                        </div>
                    </div>
                    <button class="nextBtn">
                        <span class="btnText">Simpan</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
