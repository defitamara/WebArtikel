<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
		.judul {
            border: none;
        }
	</style>
	{{-- <center>
		<h5>Laporan PDF </h5>
		<h5>Data Artikel</h5>
	</center> --}}
 
	<table>
		<tr>
			<td class="judul"><img src="{{ asset('frontend/logo/library.png') }}" alt="logo" width="50px"></td>
			<td class="judul">
			<h3>Daftar Artikel</h3>
			<p>Diunduh pada: 
				<?php 
				date_default_timezone_set('Asia/Jakarta');
				echo date('d-m-Y, H:i:s'); 
				?>
			</p>
			</td>
		</tr>
	</table>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Judul Artikel</th>
				<th>Gambar</th>
				<th>Penulis</th>
				<th>Tanggal</th>
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach ($artikel as $item)
			<tr>
				<td rowspan="2"><?php echo $no++; ?></td>
				<td>{{ $item->judul_artikel }}</td>
				<td><img src="/data/data_artikel/{{ $item->gambar }}" width="100"></td>
				{{-- <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</td> --}}
				<td>{{ $item->username }}</td>
				<td>{{ $item->tanggal }}</td>
			</tr>
			<tr>
				<th>Isi Artikel</th>
            	<td colspan="4">{!! $item->isi_artikel !!}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

 
<script type="text/javascript">
window.print();
</script>

</body>
</html>