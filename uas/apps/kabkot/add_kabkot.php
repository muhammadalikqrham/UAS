<?php 
session_start();
    require '../../conf/function.php';
    if(isset($_POST['simpan']))
    {   
        if(tambahDataKabkot($_POST) > 0){
            $_SESSION['status']= "Berhasil";
            $_SESSION['keterangan'] = "di Tambah";
            $_SESSION['icon'] = "success";

            header("Location: ../../admin.php?title=11Tabel Kabupaten/Kota");
        }
        else{
            $_SESSION['keterangan'] = "di Tambah";
            $_SESSION['icon'] = "error";
            $_SESSION['status']="Gagal";
            header("Location: ../../admin.php?title=11Tabel Kabupaten/Kota");
        }
    }
?>