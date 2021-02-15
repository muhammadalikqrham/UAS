<?php 
session_start();
    require '../../conf/function.php';
    if (isset($_POST['kdKabkot'])) {
        $id = $_POST['kdKabkot'];
        $row = query("SELECT * 
                     FROM kab_kota
                     INNER JOIN provinsi
                     ON kab_kota.kd_provinsi = provinsi.kd_provinsi
                     WHERE kab_kota.kd_kabkota = '$id'
                     ORDER BY provinsi.nm_provinsi ASC ")[0];
        echo json_encode($row);
        exit;
    }
    if (isset($_POST['kdKabkotAwal'])) {
        $kd_kabkot = query("SELECT MAX(kd_kabkota) as kd_kabkota FROM kab_kota")[0];
        
        echo json_encode($kd_kabkot);
        exit;
    }
    if(isset($_POST['simpan']))
    {   
        echo "oke";
        if(ubahDataKabkota($_POST) > 0){
            $_SESSION['keterangan'] = "di Ubah";
            $_SESSION['icon'] = "success";
            $_SESSION['status']="Berhasil";
            header("Location: ../../admin.php?title=11Tabel%20Kabupaten/Kota");
        }
        else{
            $_SESSION['keterangan'] = "di Ubah";
            $_SESSION['icon'] = "error";
            $_SESSION['status']="Gagal";
            header("Location: ../../admin.php?title=11Tabel%20Kabupaten/Kota");
        }
    }
?>