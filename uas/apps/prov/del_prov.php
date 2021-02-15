<?php 
session_start();
    require '../../conf/function.php';
    $id = $_GET['id'];
        if(hapusDataProv($id) > 0){
           $_SESSION['status']= "Berhasil";
           $_SESSION['keterangan'] = "di Hapus";
           $_SESSION['icon'] = "success";

            header("Location: ../../admin.php?title=10Tabel%20Provinsi");
        }
        else{
            $_SESSION['keterangan'] = "di Hapus";
            $_SESSION['icon'] = "error";
            $_SESSION['status']="Tidak Dapat";

            header("Location: ../../admin.php?title=10Tabel%20Provinsi");

        }
?>