<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #fff;
			margin: 0;
			padding: 0;
			text-align: center;
		}

		h1 {
			color: #333;
		}

		/* CSS untuk tabel */
		.styled-table {
			border-collapse: collapse;
			margin: 25px 0;
			font-size: 0.9em;
			min-width: 400px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}

		.styled-table thead {
			background-color: #009879;
			color: #ffffff;
		}

		.styled-table th,
		.styled-table td {
			padding: 12px 15px;
			text-align: center;
		}

		.styled-table tbody tr {
			border-bottom: 1px solid #dddddd;
		}

		.styled-table tbody tr:nth-of-type(even) {
			background-color: #f3f3f3;
		}

		.styled-table tbody tr:last-of-type {
			border-bottom: 2px solid #009879;
		}

		table,
		th,
		td {
			border: 0px solid;
		}

		.signature-container {
			font-size: 14px;
			text-align: left;
			/* Menggeser teks ke kiri */
			margin-top: 20px;
			color: #555;
			/* Warna teks */
		}

		.signature {
			font-size: 12px;
			/* Ukuran font tanda tangan */
			/* font-weight: bold; */
			margin-top: 10px;
		}

		.signature-title {
			font-size: 16px;
			/* Ukuran font judul tanda tangan (misalnya, "Tanda Tangan:") */
			margin-top: 10px;
			color: #777;
			font-weight: bold;
			/* Warna teks judul tanda tangan */
		}

	</style>

</head>

<body>

	<h1>Laporan PDF >> <?= $title ?></h1>
	<p>PT. Arif Lapengo (jalan wew: xxxx xx )</p>

	<br>

	<?php if ($data): ?>
	<table class="styled-table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Toko</th>
				<th>Alamat</th>
				<th>Telp</th>
			</tr>
		</thead>
		<?php $i=1; ?>

		<tbody>
			<?php foreach($data as $row): ?>
			<tr>
				<td><?= $i++; ?></td>
				<td><?= $row->nama_toko ?></td>
				<td><?= $row->alamat ?></td>
				<td><?= $row->nomer_handphone ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<?php else: ?>
	<p>Data <b>Toko</b> kosong atau tidak ditemukan.</p>
	<?php endif ?>

	<div class="signature-container">
		<div class="signature">Cetak, <?= $tanggal_sekarang ?></div>
		<div class="signature" style="font-size: 8px;"><p>
		[Tanda Tangan] <br><br>
		</p></div>
		<div class="signature-title">By: <?= $by ?></div>
	</div>


</body>

</html>
