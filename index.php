<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="isi">
		<center>
			<h3>Daftar Karyawan</h3>
			<form action="cetak_anggota.php">
				<button type="submit">Cetak PDF</button>
			</form>
			<br>
			<table border="1">
				<tr>
					<th width="5%">ID</th>
					<th>Nama</th>
					<th>Kedisiplinan</th>
					<th>Kebersihan</th>
                    <th>Kejujuran</th>
                    <th>Komunikasi</th>
                    <th>Kerjasama</th>
                    <th>Tanggung Jawab</th>
				</tr>
				<!-- Awal Record -->
				<?php 
				include 'connection.php';
				$sql = "SELECT * FROM tb_karyawan ORDER BY id ASC";
				$result = mysqli_query($koneksi, $sql);
				while ($data = mysqli_fetch_assoc($result)) {
					echo "
				    <tr>
						<td> $data[id] </td>
						<td> $data[nama] </td>
                        <td> $data[kedisiplinan] </td>
						<td> $data[kebersihan] </td>
						<td> $data[kejujuran] </td>
                        <td> $data[komunikasi] </td>
                        <td> $data[kerjasama] </td>
                        <td> $data[tg_jawab] </td>
					</tr>
					";
				}
                $obj_disiplin = mysqli_query($koneksi, "SELECT max(kedisiplinan) as 'max' FROM tb_karyawan");
                $max_disiplin = mysqli_fetch_assoc($obj_disiplin);

                $obj_kebersihan = mysqli_query($koneksi, "SELECT max(kebersihan) as 'max' FROM tb_karyawan");
                $max_kebersihan = mysqli_fetch_assoc($obj_kebersihan);

                $obj_kejujuran = mysqli_query($koneksi, "SELECT max(kejujuran) as 'max' FROM tb_karyawan");
                $max_kejujuran = mysqli_fetch_assoc($obj_kejujuran);

                $obj_komunikasi = mysqli_query($koneksi, "SELECT max(komunikasi) as 'max' FROM tb_karyawan");
                $max_komunikasi = mysqli_fetch_assoc($obj_komunikasi);

                $obj_kerjasama = mysqli_query($koneksi, "SELECT max(kerjasama) as 'max' FROM tb_karyawan");
                $max_kerjasama = mysqli_fetch_assoc($obj_kerjasama);

                $obj_tg_jawab = mysqli_query($koneksi, "SELECT max(tg_jawab) as 'max' FROM tb_karyawan");
                $max_tg_jawab = mysqli_fetch_assoc($obj_tg_jawab);
                
                echo "
                <tr>
                    <td colspan='2'> Max </td>
                    <td> $max_disiplin[max] </td>
                    <td> $max_kebersihan[max] </td>
                    <td> $max_kejujuran[max] </td>
                    <td> $max_komunikasi[max] </td>
                    <td> $max_kerjasama[max] </td>
                    <td> $max_tg_jawab[max] </td>
                </tr>
                ";
				
				?>
				<!-- Akhir Record -->
			</table>

            <br><br>
            <h3>Normalisasi matriks</h3>
            <table border="1">
				<tr>
					<th width="5%">ID</th>
					<th>Nama</th>
					<th>Kedisiplinan</th>
					<th>Kebersihan</th>
                    <th>Kejujuran</th>
                    <th>Komunikasi</th>
                    <th>Kerjasama</th>
                    <th>Tanggung Jawab</th>
				</tr>
				<!-- Awal Record -->
				<?php 
				include 'connection.php';
                $obj_disiplin = mysqli_query($koneksi, "SELECT max(kedisiplinan) as 'max' FROM tb_karyawan");
                $max_disiplin = mysqli_fetch_assoc($obj_disiplin);

                $obj_kebersihan = mysqli_query($koneksi, "SELECT max(kebersihan) as 'max' FROM tb_karyawan");
                $max_kebersihan = mysqli_fetch_assoc($obj_kebersihan);

                $obj_kejujuran = mysqli_query($koneksi, "SELECT max(kejujuran) as 'max' FROM tb_karyawan");
                $max_kejujuran = mysqli_fetch_assoc($obj_kejujuran);

                $obj_komunikasi = mysqli_query($koneksi, "SELECT max(komunikasi) as 'max' FROM tb_karyawan");
                $max_komunikasi = mysqli_fetch_assoc($obj_komunikasi);

                $obj_kerjasama = mysqli_query($koneksi, "SELECT max(kerjasama) as 'max' FROM tb_karyawan");
                $max_kerjasama = mysqli_fetch_assoc($obj_kerjasama);

                $obj_tg_jawab = mysqli_query($koneksi, "SELECT max(tg_jawab) as 'max' FROM tb_karyawan");
                $max_tg_jawab = mysqli_fetch_assoc($obj_tg_jawab);

				$sql = "SELECT * FROM tb_karyawan ORDER BY id ASC";
				$result = mysqli_query($koneksi, $sql);
				while ($data = mysqli_fetch_assoc($result)) {
                    $mat_disiplin = $data['kedisiplinan']/$max_disiplin['max'];
                    $mat_kebersihan = $data['kebersihan']/$max_kebersihan['max'];
                    $mat_kejujuran = $data['kejujuran']/$max_kejujuran['max'];
                    $mat_komunikasi = $data['komunikasi']/$max_komunikasi['max'];
                    $mat_kerjasama = $data['kerjasama']/$max_kerjasama['max'];
                    $mat_tg_jawab = $data['tg_jawab']/$max_tg_jawab['max'];
					echo "
				    <tr>
						<td> $data[id] </td>
						<td> $data[nama] </td>
                        <td> $mat_disiplin</td>
						<td> $mat_kebersihan </td>
						<td> $mat_kejujuran </td>
                        <td> $mat_komunikasi </td>
                        <td> $mat_kerjasama </td>
                        <td> $mat_tg_jawab </td>
					</tr>
					";
				}
				?>
				<!-- Akhir Record -->
			</table>

		</center>
	</div>

</body>
</html>