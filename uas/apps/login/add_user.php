<?php 
session_start();
    require '../../conf/function.php';
    if(isset($_POST['daftar']))
    {   
        if(tambahDataUser($_POST) > 0){
            $_SESSION['status']= "Berhasil";
            $_SESSION['keterangan'] = "di Tambah";
            $_SESSION['icon'] = "success";

            header("Location: ../../index.php ");
        }
        else{
            $_SESSION['keterangan'] = "di Tambah";
            $_SESSION['icon'] = "error";
            $_SESSION['status']="Gagal";
            header("Location: ../../index.php");
        }
    }
?>