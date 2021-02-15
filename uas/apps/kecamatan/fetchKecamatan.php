<?php 
include '../../conf/function.php';

if (isset($_POST['kdKecamatan'])) {
    $id = $_POST['kdKecamatan'];
    $row = query("SELECT * 
                FROM kecamatan
                INNER JOIN kab_kota
                ON kecamatan.kd_kabkota = kab_kota.kd_kabkota
                WHERE kecamatan.kd_kecamatan = '$id'
                ORDER BY kab_kota.nm_kabkota ASC ")[0];
    echo json_encode($row);
    exit;
}
if (isset($_POST['kdKecamatanAwal'])) {
    $kd_kecamatan = query("SELECT MAX(kd_kecamatan) as kd_kecamatan FROM kecamatan")[0];
    
    echo json_encode($kd_kecamatan);
    exit;
}

?>