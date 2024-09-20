<!DOCTYPE html>
<html>
<head>
	<title>Data Oprec</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        img {
            object-fit: cover;
        }
	</style>
	<center>
		<h1>Data Oprec</h4>
	</center>

	<table class='table table-bordered' width="100%" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>NIM</th>
            <th>Agama</th>
            <th>No HP</th>
            <th>Alamat Rumah</th>
            <th>Alamat Domisili</th>
            <th>Nama Orang Tua</th>
            <th>Motivasi</th>
            <th>Pengalaman Organisasi</th>
            <th>Golongan Darah</th>
            <th>Riwayat Penyakit</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i=1
        @endphp
        @foreach($oprec as $o)
        <tr>
            <td>{{ $i++ }}</td>
            <!-- Menggunakan public_path untuk memastikan gambar bisa diakses oleh DOMPDF -->
            <td><img src="{{ public_path('storage/oprec/' . $o->foto) }}" alt="Foto" width="75" height="100"></td>
            <td>{{$o->nama}} / {{ $o->jenis_kelamin }}</td>
            <td>{{$o->tempatTglLahir}}</td>
            <td>{{$o->nim}} / {{$o->prodi}}</td>
            <td>{{$o->agama}}</td>
            <td>{{$o->nohp}}</td>
            <td>{{$o->alamat_rumah}}</td>
            <td>{{$o->alamat_domisili}}</td>
            <td>{{$o->nama_orangtua}} / {{$o->nohp_orangtua}}</td>
            <td>{{$o->motivasi}}</td>
            <td>{{$o->pengalaman_organisasi}}</td>
            <td>{{$o->golongan_darah}}</td>
            <td>{{$o->riwayat_penyakit}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
