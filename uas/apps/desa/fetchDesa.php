<?php 
include '../../conf/function.php';

if (isset($_POST['kdDesa'])) {
    $id = $_POST['kdDesa'];
    // var_dump($id);
    // die;
    $row = query("SELECT * 
                FROM desa
                INNER JOIN kecamatan
                ON desa.kd_kecamatan = kecamatan.kd_kecamatan
                WHERE desa.kd_desa = '$id'
                ORDER BY kecamatan.kd_kecamatan ASC ")[0];
    echo json_encode($row);
    exit;
}
if (isset($_POST['kdDesaAwal'])) {
    $kd_desa = query("SELECT MAX(kd_desa) as kd_desa FROM desa")[0];
    
    echo json_encode($kd_desa);
    exit;
}

?>