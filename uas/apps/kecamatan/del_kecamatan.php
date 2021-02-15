<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php ");
  }
    require '../../conf/function.php';
    $id = $_GET['id'];
        if(hapusDataKecamatan($id) > 0){
           $_SESSION['status']= "Berhasil";
           $_SESSION['keterangan'] = "di Hapus";
           $_SESSION['icon'] = "success";

            header("Location: ../../admin.php?title=12Tabel%20Kecamatan");
        }
        else{
            $_SESSION['keterangan'] = "di Hapus";
            $_SESSION['icon'] = "error";
            $_SESSION['status']="Tidak Dapat";

            header("Location: ../../admin.php?title=12Tabel%20Kecamatan");
        }
?>