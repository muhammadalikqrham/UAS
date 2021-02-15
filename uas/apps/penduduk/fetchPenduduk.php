<?php 
    include '../../conf/function.php';
    if (isset($_POST['kdPendudukAwal'])) {
        $kd_penduduk = query("SELECT MAX(id_penduduk) as id_penduduk FROM penduduk")[0];
        
        echo json_encode($kd_penduduk);
        exit;
    }
    if (isset($_POST['kdProv'])) {
        $kdProv = $_POST['kdProv'];
        $kabkota = query("SELECT * FROM kab_kota WHERE kd_provinsi = '$kdProv' ORDER BY nm_kabkota ASC");
        
        echo json_encode($kabkota);
        exit;
    }
    if (isset($_POST['kdKabkota'])) {
        $kdKabkota = $_POST['kdKabkota'];
        $kecamatan = query("SELECT * FROM kecamatan WHERE kd_kabkota = '$kdKabkota' ORDER BY nm_kecamatan ASC");
        
        echo json_encode($kecamatan);
        exit;
    }
    if (isset($_POST['kdKecamatanOps'])) {
        $kdkecamatan = $_POST['kdKecamatanOps'];
        $desa = query("SELECT * FROM desa WHERE kd_kecamatan = '$kdkecamatan' ORDER BY nm_desa ASC");
        echo json_encode($desa);
        exit;
    }
    if (isset($_POST['kdPenduduk'])) {
        $kdpenduduk = $_POST['kdPenduduk'];
        $desa = query("SELECT * 
                        FROM penduduk
                        INNER JOIN desa
                        ON penduduk.desa = desa.kd_desa
                        INNER JOIN kecamatan
                        ON penduduk.kecamatan = kecamatan.kd_kecamatan
                        INNER JOIN kab_kota
                        ON penduduk.kab_kota = kab_kota.kd_kabkota
                        INNER JOIN provinsi
                        ON penduduk.provinsi = provinsi.kd_provinsi
                        WHERE penduduk.id_penduduk = '$kdpenduduk'
                        ORDER BY penduduk.nm_penduduk ASC")[0];
        echo json_encode($desa);
        exit;
    }

?>