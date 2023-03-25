@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Edit Rekam Medis</header>
        <form action={{ route('rekam.medis.update', $rekam->id) }} method="POST">
            @method('PUT')
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">

                        <div class="input-field">
                            <label>No Rekam Medis</label>
                            <select name="pasien_id" class="pilih" required disabled>
                                @foreach ($lab as $lab)
                                    <option value="{{ $lab->id }}" {{ $lab->id == $lab->id ? 'selected' : '' }}
                                        required>{{ $lab->no_rm }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Dokter</label>
                            <select name="dokter" class="pilih" required>
                                @foreach ($dokter as $dokter)
                                    <option value="{{ $dokter->nama_dokter }}" @selected(old('dokter') == $dokter->id) required>
                                        {{ $dokter->nama_dokter }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Pasien</label>
                            <input type="text" name="pasiens" value="{{ $rekam->pasiens }}" required>
                        </div>

                    </div>
                </div>

                <div class="details-id">
                    <div class="fields">

                        <div class="input-field"></div>

                    </div>
                    <button class="nextBtn">
                        <span class="btnText">Simpan</span>
                    </button>
                </div>
        </form>
    </div>
@endsection
