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
 
	<table>
		<tr>
			<td><img src="{{ asset('frontend/logo/library.png') }}" alt="logo" width="50px"></td>
			<td>
			<h3>Data Admin</h3>
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
                <th>Nama</th>
                <th>Foto</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Telpon</th>
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach ($data_admin as $item)
			<tr>
			  <td>{{ $no++ }}</td>
			  <td>{{ $item->name }}</td>
			  <td><img src="/data/data_admin/{{ $item->foto }}" width="80"></td>
			  <td>{{ $item->email }}</td>
			  <td>
				@if ($item->jenis_kelamin != '')
				  {{ $item->jenis_kelamin }}
				@else
				  <div class="text-danger">Profil belum lengkap</div> 
				@endif
			  </td>
			  <td>
				@if ($item->jabatan != '')
				  {{ $item->jabatan }}
				@else
				  <div class="text-danger">Profil belum lengkap</div> 
				@endif
			  </td>
			  <td>
				@if ($item->telpon != '')
				  {{ $item->telpon }}
				@else
				  <div class="text-danger">Profil belum lengkap</div> 
				@endif
			</td>
			@endforeach
		</tbody>
	</table>

 
<script type="text/javascript">
window.print();
</script>

</body>
</html>