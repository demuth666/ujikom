@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Pasien</h3>
            <form action="{{ route('search.pasien') }}" method="GET" class="input-group">
                <input type="search" name="data" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </form>
        </section>
        <div class="add">
            <a href={{ route('add.pasien') }}>
                <button class="button-create" role="button">Tambah</button>
            </a>
        </div>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Nama Pasien</th>
                        <th> Jenis Kelamin</th>
                        <th> Agama</th>
                        <th> Alamat</th>
                        <th> Tanggal Lahir</th>
                        <th> usia</th>
                        <th> No Telp</th>
                        <th> Nama KK</th>
                        <th> Hub keluarga</th>
                        <th> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($pasien))
                        @foreach ($pasien as $pasien)
                            <tr>
                                <td><strong> {{ $pasien->nama_pasien }}</strong></td>
                                <td> {{ $pasien->j_kelamin }} </td>
                                <td> {{ $pasien->agama }} </td>
                                <td> {{ $pasien->alamat }} </td>
                                <td> {{ $pasien->tgl_lahir }} </td>
                                <td> {{ $pasien->usia }} </td>
                                <td> {{ $pasien->no_tlp }} </td>
                                <td> {{ $pasien->nm_kk }} </td>
                                <td> {{ $pasien->hub_kel }} </td>
                                <td>
                                    <div class="button-action">
                                        <a href={{ route('edit.pasien', $pasien->id) }}>
                                            <button class="button-edit" role="button">Edit</button>
                                        </a>
                                        <form action={{ route('destroy.pasien', $pasien->id) }} id="delete-form"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="button-delete" role="button">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            @else
                <p>Data tidak ditemukan</p>
                @endif
            </table>
        @else
            <p>Data tidak ditemukan</p>
            @endif
        </section>
    </main>
@endsection
