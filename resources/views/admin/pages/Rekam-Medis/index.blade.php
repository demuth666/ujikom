@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Rekam Medis</h3>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </div>
        </section>
        <a href="#">
            <button class="button-create" role="button">Tambah</button>
        </a>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> No Rekam Medis</th>
                        <th> Tindakan</th>
                        <th> Obat</th>
                        <th> Kd User</th>
                        <th> Pasien</th>
                        <th> Diagnosa</th>
                        <th> Resep</th>
                        <th> Keluhan</th>
                        <th> Tanggal Pemeriksaan</th>
                        <th> Keterangan</th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekam as $rekam)
                        <tr>
                            <td> {{ $rekam->tanggal_periksa }} </td>
                            <td><strong> {{ $rekam->nama_pasien }}</strong></td>
                            <td> {{ $rekam->keluhan }} </td>
                            <td> {{ $rekam->nama_dokter }} </td>
                            <td> {{ $rekam->diagnosa }} </td>
                            <td> {{ $rekam->obat }} </td>
                            <td> {{ $rekam->tindakan }} </td>
                            <td>
                                <div class="button-action">
                                    <a href="#">
                                        <button class="button-edit" role="button">Edit</button>
                                    </a>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="button-delete" role="button">Hapus</button>
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
