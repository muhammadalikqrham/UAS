<?php 
session_start();
    require '../../conf/function.php';
    if (isset($_POST['kdProv'])) {
        $id = $_POST['kdProv'];
        $row = query("SELECT * FROM provinsi WHERE kd_provinsi = '$id'")[0];
        echo json_encode($row);
        exit;
    }
    if (isset($_POST['kdProvAwal'])) {
        $kd_prov = query("SELECT MAX(kd_provinsi) as kd_provinsi FROM provinsi")[0];

        echo json_encode($kd_prov);
        exit;
    }
    if(isset($_POST['simpan']))
    {   
        echo "oke";
        if(ubahDataProv($_POST) > 0){
            $_SESSION['keterangan'] = "di Ubah";
            $_SESSION['icon'] = "success";
            $_SESSION['status']="Berhasil";
            header("Location: ../../admin.php?title=10Tabel%20Provinsi");
        }
        else{
            $_SESSION['keterangan'] = "di Ubah";
            $_SESSION['icon'] = "error";
            $_SESSION['status']="Gagal";
            header("Location: ../../admin.php?title=10Tabel%20Provinsi");
        }
    }
?>