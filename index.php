<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;1,500&family=Poppins:wght@400;500;600;700&display=swap');
  </style>
  <title>Hello, world!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Input data</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Data Karyawan</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <section id="data-karyawan">
      <div class="mt-3 container tabel-data">
        <h3>Daftar Karyawan</h3>
        <form action="cetak_anggota.php">
          <button type="submit" class="btn btn-primary">Cetak PDF</button>
        </form>
        <br>
        <div class="table-responsive text-center">
          <table class="table table-hover">
            <thead>
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
            </thead>

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
        </div>

      </div>
    </section>

    <section id="normalisasi-matriks">
      <div class="mt-5 container tabel-data">
        <h3>Normalisasi Matriks</h3>
        <div class="table-responsive text-center">
          <table class="table table-hover">
            <thead>
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
            </thead>

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
              $mat_disiplin = $data['kedisiplinan'] / $max_disiplin['max'];
              $mat_kebersihan = $data['kebersihan'] / $max_kebersihan['max'];
              $mat_kejujuran = $data['kejujuran'] / $max_kejujuran['max'];
              $mat_komunikasi = $data['komunikasi'] / $max_komunikasi['max'];
              $mat_kerjasama = $data['kerjasama'] / $max_kerjasama['max'];
              $mat_tg_jawab = $data['tg_jawab'] / $max_tg_jawab['max'];
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
        </div>

      </div>
    </section>

    <section id="table-perhitungan">
      <div class="mt-5 mb-5 container tabel-data">
        <h3>Perhitungan</h3>
        <div class="table-responsive text-center">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Perhitungan</th>
                <th>Hasil</th>
              </tr>
            </thead>

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
              $mat_disiplin = $data['kedisiplinan'] / $max_disiplin['max'];
              $mat_kebersihan = $data['kebersihan'] / $max_kebersihan['max'];
              $mat_kejujuran = $data['kejujuran'] / $max_kejujuran['max'];
              $mat_komunikasi = $data['komunikasi'] / $max_komunikasi['max'];
              $mat_kerjasama = $data['kerjasama'] / $max_kerjasama['max'];
              $mat_tg_jawab = $data['tg_jawab'] / $max_tg_jawab['max'];

              $v = (($mat_disiplin * 20) + ($mat_kebersihan * 15) + ($mat_kejujuran * 15) + ($mat_komunikasi * 10) + ($mat_kerjasama * 20) + ($mat_tg_jawab * 20));
              echo "
				    <tr>
						<td> $data[id] </td>
						<td> $data[nama] </td>
            <td> (($mat_disiplin*20) + ($mat_kebersihan*15) + ($mat_kejujuran*15) + ($mat_komunikasi*10) + ($mat_kerjasama*20) + ($mat_tg_jawab*20))</td>
            <td>$v</td>
					</tr>
					";
            }
            ?>
            <!-- Akhir Record -->
          </table>
        </div>

      </div>
    </section>
  </div>

  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>