@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Obat</h3>
            <form action="{{ route('search.obat') }}" method="GET" class="input-group">
                <input type="search" name="data" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </form>
        </section>
        <div class="add">
            <a href={{ route('add.obat') }}>
                <button class="button-add" role="button" type="submit">
                    <span class="button__icon">
                        <ion-icon name="add-circle-outline"></ion-icon>
                    </span>
                </button>
            </a>
        </div>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Nama Obat</th>
                        <th> Jumlah Obat</th>
                        <th> Ukuran</th>
                        <th> Harga</th>
                        <th> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($obat))
                        @foreach ($obat as $obat)
                            <tr>
                                <td> {{ $obat->nama_obat }} </td>
                                <td><strong> {{ $obat->jml_obat }}</strong></td>
                                <td> {{ $obat->ukuran }} </td>
                                <td> {{ $obat->harga }} </td>
                                <td>
                                    <div class="button-action">
                                        <a href="{{ route('edit.obat', $obat->id) }}">
                                            <button class="button-edit" role="button">Edit</button>
                                        </a>
                                        <form action="{{ route('destroy.obat', $obat->id) }}" id="delete-form"
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
