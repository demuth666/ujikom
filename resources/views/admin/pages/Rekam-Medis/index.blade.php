@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Rekam Medis</h3>
            <form action="{{ route('rekam.medis.search') }}" method="GET" class="input-group">
                <input type="search" name="data" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </form>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> No Rekam Medis</th>
                        <th> Pasien</th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($rekam))
                        @foreach ($rekam as $rekam)
                            <tr>
                                <td> {{ $rekam->pasien['no_rm'] }} </td>
                                <td> {{ $rekam->pasiens }} </td>
                                <td>
                                    <div class="button-action">
                                        <a href="{{ route('detail.pemeriksaan', $rekam->pasien_id) }}">
                                            <button class="button-edit" role="button">Lihat detail</button>
                                        </a>
                                        <form action="{{ route('destroy.rekam.medis', $rekam->id) }}" id="delete-form"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button-delete" role="button" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        @else
            <p>Data tidak ditemukan</p>
            @endif
        </section>
    </main>
@endsection
