<?php 
session_start();
include '../../conf/function.php';

if(isset($_POST['simpan']))
{   
    if(ubahDataDesa($_POST) > 0){
        $_SESSION['keterangan'] = "di Ubah";
        $_SESSION['icon'] = "success";
        $_SESSION['status']="Berhasil";
        header("Location: ../../admin.php?title=13Tabel%20Desa");
    }
    else{
        $_SESSION['keterangan'] = "di Ubah";
        $_SESSION['icon'] = "error";
        $_SESSION['status']="Gagal";
        header("Location: ../../admin.php?title=13Tabel%20Desa");
    }
}

?>