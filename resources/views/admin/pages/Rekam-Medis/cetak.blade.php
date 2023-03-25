<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rekam Medis</title>
</head>
<style>
    hr {
        width: 65%
    }

    .table__body {
        width: 95%;
        max-height: calc(89% - 1.6rem);
        background-color: #fffb;

        margin: .8rem auto;
        border-radius: .6rem;

        overflow: auto;
        overflow: overlay;
        margin-left: 140webpx
    }

    .table__body::-webkit-scrollbar {
        width: 0.5rem;
        height: 0.5rem;
    }

    .table__body::-webkit-scrollbar-thumb {
        border-radius: .5rem;
        background-color: #0004;
        visibility: hidden;
    }

    .table__body:hover::-webkit-scrollbar-thumb {
        visibility: visible;
    }

    table {
        width: 50%;
    }

    td img {
        width: 36px;
        height: 36px;
        margin-right: .5rem;
        border-radius: 50%;

        vertical-align: middle;
    }

    table,
    th,
    td {
        border-collapse: collapse;
        padding: 0.8rem;
        text-align: left;
    }

    thead th {
        position: sticky;
        top: 0;
        left: 0;
        background-color: #d5d1defe;
        cursor: pointer;
        text-transform: capitalize;
    }

    tbody tr:nth-child(even) {
        background-color: #0000000b;
    }

    tbody tr {
        --delay: .1s;
        transition: .5s ease-in-out var(--delay), background-color 0s;
    }

    tbody tr.hide {
        opacity: 0;
        transform: translateX(100%);
    }

    tbody tr:hover {
        background-color: #fff6 !important;
    }

    tbody tr td,
    tbody tr td p,
    tbody tr td img {
        transition: .2s ease-in-out;
    }

    tbody tr.hide td,
    tbody tr.hide td p {
        padding: 0;
        font: 0 / 0 sans-serif;
        transition: .2s ease-in-out .5s;
    }

    tbody tr.hide td img {
        width: 0;
        height: 0;
        transition: .2s ease-in-out .5s;
    }
</style>

<body style="font-family:Times New Roman;font-size:12px">
    {{-- @foreach ($pasien as $pasien) --}}
    <center>
        <h1>Data Rekam Medis</h1>
        <p>Di cetak pada {{ now() }}</p>
    </center>
    <hr>
    <hr>
    <center>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        {{-- <th> No Rekam Medis</th> --}}
                        <th> Pasien</th>
                        <th> Dokter</th>
                        <th> Tindakan</th>
                        <th> Keluhan</th>
                        <th> Diagnosa</th>
                        <th> Tanggal Pemeriksaan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekam as $rekam)
                        <tr>
                            {{-- <td> {{ $rekam->pasien['no_rm'] }} </td> --}}
                            <td> {{ $rekam->pasien->nama_pasien }} </td>
                            <td> {{ $rekam->dokter }} </td>
                            <td> {{ $rekam->tindakan }} </td>
                            <td> {{ $rekam->keluhan }} </td>
                            <td> {{ $rekam->diagnosa }} </td>
                            <td> {{ $rekam->tgl_pemeriksaan }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </center>
</body>

</html>
