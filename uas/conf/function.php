<?php 

$db = mysqli_connect("localhost", "root", "", "kependudukan");

function query($query){
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
function tambahDataUser($data){
    global $db;
    $firsName = $data['firstName'];
    $secondName = $data["secondName"];
    $username = $data["username"];
    $password = md5($data["password"]);
    $username = $data["username"];
    $level = $data["level"];
    $query = "INSERT INTO user VALUES('$username','$password','$firsName $secondName','$level')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function tambahDataKabkot($data){
    global $db;
    $kd_kabkot = $data['kd_kabkot'];
    $nm_kabkot = $data["nm_kabkot"];
    $kd_prov = $data["kdProv"];
    $query = "INSERT INTO kab_kota VALUES('$kd_kabkot','$nm_kabkot','$kd_prov')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function tambahDataProv($data){
    global $db;
    $kd_prov = $data['kd_prov'];
    $nm_prov = $data["nm_prov"];
    $query = "INSERT INTO provinsi VALUES('$kd_prov','$nm_prov')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function tambahDataKecamatan($data){
    global $db;
    $kd_kecamatan = $data['kd_kecamatan'];
    $nm_kecamatan = $data["nm_kecamatan"];
    $kd_kabkota = $data["kdKabkota"];
    $query = "INSERT INTO kecamatan VALUES('$kd_kecamatan','$nm_kecamatan','$kd_kabkota')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function tambahDataDesa($data){
    global $db;
    $kd_desa = $data['kd_desa'];
    $nm_desa = $data["nm_desa"];
    $kd_kecamatan = $data["kdKecamatan"];
    $query = "INSERT INTO desa VALUES('$kd_desa','$nm_desa','$kd_kecamatan')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function tambahDataPenduduk($data){
    global $db;
    $kd_penduduk = $data['kd_penduduk'];
    $nm_penduduk = $data["nm_penduduk"];
    $tgl_lahir = $data["tgl_lahir"];
    $agama = $data["agama"];
    $alamat = $data["alamat"];
    $kdProvinsi = $data["kdProvinsi"];
    $kdKabkota = $data["kdKabkota"];
    $kdKecamatan = $data["kdKecamatan"];
    $kdDesa = $data["kdDesa"];
    $kdStatusNikah = $data["kdStatusNikah"];
    $kdPekerjaan = $data["kdPekerjaan"];
    $query = "INSERT INTO penduduk VALUES('$kd_penduduk',
                                          '$nm_penduduk',
                                          '$tgl_lahir',
                                          '$agama',
                                          '$alamat',
                                          '$kdDesa',
                                          '$kdKecamatan',
                                          '$kdKabkota',
                                          '$kdProvinsi',
                                          '$kdStatusNikah',
                                          '$kdPekerjaan'
                                          )";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function ubahDataPenduduk($data){
    global $db;
    $kd_penduduk = $data['kd_penduduk'];
    $nm_penduduk = $data["nm_penduduk"];
    $tgl_lahir = $data["tgl_lahir"];
    $agama = $data["agama"];
    $alamat = $data["alamat"];
    $kdProvinsi = $data["kdProvinsi"];
    $kdKabkota = $data["kdKabkota"];
    $kdKecamatan = $data["kdKecamatan"];
    $kdDesa = $data["kdDesa"];
    $kdStatusNikah = $data["kdStatusNikah"];
    $kdPekerjaan = $data["kdPekerjaan"];
    $query = "UPDATE  penduduk SET nm_penduduk = '$nm_penduduk',
                                    tgl_lahir = '$tgl_lahir',
                                    agama = '$agama',
                                    alamat = '$alamat',
                                    desa = '$kdDesa',
                                    kecamatan = '$kdKecamatan',
                                    kab_kota = '$kdKabkota',
                                    provinsi = '$kdProvinsi',
                                    status_nikah = '$kdStatusNikah',
                                    status_kerja = '$kdPekerjaan'
                              WHERE id_penduduk = '$kd_penduduk'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function ubahDatadesa($data){
    global $db;
    $kd_desa = $data['kd_desa'];
    $nm_desa = $data["nm_desa"];
    $kd_kecamatan = $data["kdKecamatan"];
    $query = "UPDATE desa SET  nm_desa = '$nm_desa',
                                   kd_kecamatan = '$kd_kecamatan'
                              WHERE kd_desa = '$kd_desa'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function ubahDataKecamatan($data){
    global $db;
    $kd_kecamatan = $data['kd_kecamatan'];
    $nm_kecamatan = $data["nm_kecamatan"];
    $kd_kabkota = $data["kdKabkota"];
    $query = "UPDATE kecamatan SET  nm_Kecamatan = '$nm_kecamatan',
                                   kd_kabkota = '$kd_kabkota'
                              WHERE kd_Kecamatan = '$kd_kecamatan'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function ubahDataKabkota($data){
    global $db;
    $kd_kabkot = $data['kd_kabkot'];
    $nm_kabkot = $data["nm_kabkot"];
    $kd_prov = $data["kdProv"];
    $query = "UPDATE kab_kota SET  nm_kabkota = '$nm_kabkot',
                                   kd_provinsi = '$kd_prov'
                              WHERE kd_kabkota = '$kd_kabkot'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function ubahDataProv($data){
    global $db;
    $kd_prov = $data['kd_prov'];
    $nm_prov = $data["nm_prov"];
    $query = "UPDATE provinsi SET  nm_provinsi = '$nm_prov'
                              WHERE kd_provinsi = '$kd_prov'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function hapusDataProv($data){
    global $db;
    $query = "DELETE FROM provinsi WHERE kd_provinsi ='$data'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function hapusDataKabkot($data){
    global $db;
    $query = "DELETE FROM kab_kota WHERE kd_kabkota ='$data'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function hapusDataKecamatan($data){
    global $db;
    $query = "DELETE FROM kecamatan WHERE kd_kecamatan ='$data'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function hapusDataDesa($data){
    global $db;
    $query = "DELETE FROM desa WHERE kd_desa ='$data'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function hapusDataPenduduk($data){
    global $db;
    $query = "DELETE FROM penduduk WHERE id_penduduk ='$data'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
?>