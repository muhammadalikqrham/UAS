<?php 
session_start();
    require '../../conf/function.php';
    if(isset($_POST['simpan']))
    {   
        if(tambahDataPenduduk($_POST) > 0){
            $_SESSION['status']= "Berhasil";
            $_SESSION['keterangan'] = "di Tambah Silahkan Login";
            $_SESSION['icon'] = "success";

            header("Location: ../../admin.php?title=14Tabel%20Penduduk");
        }
        else{
            $_SESSION['keterangan'] = "di Tambah";
            $_SESSION['icon'] = "error";
            $_SESSION['status']="Gagal";
            header("Location: ../../admin.php?title=14Tabel%20Penduduk");
        }
    }
?>