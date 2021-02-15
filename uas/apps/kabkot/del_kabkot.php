<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php ");
    exit;
  }
    require '../../conf/function.php';
    $id = $_GET['id'];
        if(hapusDataKabkot($id) > 0){
           $_SESSION['status']= "Berhasil";
           $_SESSION['keterangan'] = "di Hapus";
           $_SESSION['icon'] = "success";

            header("Location: ../../admin.php?title=11Tabel%20Kabupaten/Kota");
        }
        else{
            $_SESSION['keterangan'] = "di Hapus";
            $_SESSION['icon'] = "error";
            $_SESSION['status']="Tidak Dapat";

            header("Location: ../../admin.php?title=11Tabel%20Kabupaten/Kota");
        }
?>