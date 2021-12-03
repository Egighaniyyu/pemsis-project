<?php 
    // membuat koneksi
    $koneksi = mysqli_connect("localhost", "root", "", "db_karyawan");

    // mengecek koneksi
    if(!$koneksi) {
        die("Connection Failed: " . mysqli_connect_error());
    }
