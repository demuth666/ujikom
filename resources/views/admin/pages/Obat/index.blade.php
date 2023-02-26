@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Obat</h3>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </div>
        </section>
        <div class="add">
            <a href={{ route('add.obat') }}>
                <button class="button-create" role="button">Tambah</button>
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
                                    <form action="{{ route('destroy.obat', $obat->id) }}" method="POST">
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
        </section>
    </main>
@endsection
