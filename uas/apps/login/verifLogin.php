<?php 
session_start();
include '../../conf/function.php';
if (isset($_POST['login'])) {
    $user = $_POST['userid'];
    $pass = md5($_POST['pass']);

    $query = query("SELECT*FROM user WHERE userid= '$user' AND passw= '$pass'")[0];
    if ($query) {
        $_SESSION['status']= "Telah";
        $_SESSION['keterangan'] = "Diterima";
        $_SESSION['icon'] = "success";
        $_SESSION['userid'] = $query['nama'];
        $_SESSION['level'] = $query['level'];
        $_SESSION['login'] = true;

        header("Location: ../../admin.php");
    }
    else
    {
        $_SESSION['status'] = "gagal";
        header("Location: ../../");

    }
    
    
}

?>