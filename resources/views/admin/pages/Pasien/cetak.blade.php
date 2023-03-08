<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak Kartu Pasien</title>
</head>
<style>
    .tbl {
        border: 1px solid #000000;
        border-radius: 3px;
        padding: 10px 10px 10px 10px;
    }
</style>

<body style="font-family:Times New Roman;font-size:12px">
    @foreach ($pasien as $pasien)
        <center>
            <h1></h1>
        </center>
        <table id="example1" class="tbl">
            <tr align="center" border="1">
                <td colspan="3">
                    <h3><i>Rekam Medis</i></h3>
                    <h4>Kartu Berobat Pasien</h4>
                    <hr>
                </td>
            </tr>
            <tr>
                <td>Kode RM </td>
                <td>:</td>
                <td>{{ $pasien->no_rm }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $pasien->nama_pasien }}</td>
            </tr>
            <tr>
                <td>Usia</td>
                <td>:</td>
                <td>{{ $pasien->usia }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $pasien->j_kelamin }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $pasien->alamat }} </td>
            </tr>
        </table>
    @endforeach
</body>

</html>
