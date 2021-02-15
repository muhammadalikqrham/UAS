<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php ");
    exit;
  }
    require 'conf/function.php';
    $penduduk = query("SELECT * 
                    FROM penduduk
                    INNER JOIN desa
                    ON penduduk.desa = desa.kd_desa
                    INNER JOIN kecamatan
                    ON penduduk.kecamatan = kecamatan.kd_kecamatan
                    INNER JOIN kab_kota
                    ON penduduk.kab_kota = kab_kota.kd_kabkota
                    INNER JOIN provinsi
                    ON penduduk.provinsi = provinsi.kd_provinsi
                    ORDER BY penduduk.nm_penduduk ASC");
    $desa = query("SELECT * FROM desa ORDER BY nm_desa ASC");
    $kecamatan = query("SELECT * FROM kecamatan ORDER BY nm_kecamatan ASC");
    $provinsi = query("SELECT * FROM provinsi ORDER BY nm_provinsi ASC");

?>

<div class="row">
        <div class="col">
   <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Data Penduduk</h1><hr>
      
    <button type="button" class="mb-5 btn btn-primary btnSimpanPenduduk" data-toggle="modal" data-target="#formModalPenduduk">
        <i class="fa fa-plus-circle"></i> Tambah Data Penduduk
    </button>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Penduduk</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered tablePekerjaan" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">ID Penduduk</th>
                            <th class="text-center">Nama Penduduk</th>
                            <th class="text-center">Tangal Lahir</th>
                            <th class="text-center">Agama</th>   
                            <th class="text-center" width="20%">Alamat</th>   
                            <!-- <th class="text-center">Desa</th>   
                            <th class="text-center">Kecamatan</th>   
                            <th class="text-center">Kabupaten/Kota</th>   
                            <th class="text-center">Provinsi</th>    -->
                            <th class="text-center">Status Nikah</th>
                            <th class="text-center">Pekerjaan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($penduduk as $row) : ?>
                    <?php if ($row['status_nikah'] == 0) {
                            $row['status_nikah'] = "Belum menikah";
                        } else {
                            $row['status_nikah'] = "Sudah menikah";
                        } ?>
                        <tr id="dataPekerjaan"> 
                            <td class="text-center"><?= $no ?></td>
                            <td class="text-center"><?= $row['id_penduduk']?></td>
                            <td class="text-center"><?= $row['nm_penduduk']?></td>
                            <td class="text-center"><?= date("d F Y",strtotime($row['tgl_lahir']))?></td>
                            <td class="text-center"><?= $row['agama']?></td>
                            <td class="text-center"><?= $row['alamat']?>,Desa <?= $row['nm_desa']?>,Kecamatan <?= $row['nm_kecamatan']?>, Kota <?= $row['nm_kabkota']?>, <?= $row['nm_provinsi']?></td>
                            <!-- <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td> -->
                            <td class="text-center"><?= $row['status_nikah']?></td>
                            <td class="text-center pekerjaan<?=$no-1?>" id="pekerjaan"><?= $row['status_kerja']?></td>
                            <td class="text-center">
                                <a href="edit_prov.php?id=<?=$row['id_penduduk']?>" class="btn btn-success btn-circle float-center ubahDataPenduduk" data-toggle="modal" data-target="#formModalPenduduk" data-id="<?=$row['id_penduduk']?>"><i class="fas fa-edit"></i></a> <?php if ($_SESSION['level'] == 2):?>| 
                                <a href="apps/penduduk/del_penduduk.php?id=<?=$row['id_penduduk']?>" class="btn btn-danger btn-circle float-center tombol-hapus"><i class="fas fa-trash"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="formModalPenduduk" tabindex="-1" aria-labelledby="judulModalPenduduk" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModalPenduduk">Tambah Data Penduduk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="apps/penduduk/add_penduduk.php" method="POST">
            <div class="form-group">
                <label for="kdPenduduk">Kode Penduduk</label>
                <input type="text" id="kdPenduduk" name="kd_penduduk" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="nmPenduduk">Nama</label>
                <input type="text" id="nmPenduduk" name="nm_penduduk" class="form-control">
            </div>   
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control">
            </div>   
            <div class="form-group">
                <label for="agama">Agama</label>
                <select name="agama" id="agama" class="form-control">
                    <option value="default" selected >--! Pilih Agama !--</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                </select>
            </div>   
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control"></textarea>
            </div>   
            <div class="form-group">
                <label for="nmPenduduk">Provinsi</label>
                <select name="kdProvinsi" id="Provinsi" class="form-control" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur(); childProv();'>
                    <option value="false">--! Pilih Provinsi !--</option>
                    <?php foreach($provinsi as $row):  ?>
                        <option value="<?=$row['kd_provinsi']?>"><?=$row['nm_provinsi']?></option>
                    <?php endforeach; ?>
                </select>
            </div> 
            <div class="form-group" id="kabkota">
                <label for="Kabkota">Kabupaten/Kota</label>
                <select name="kdKabkota" id="Kabkota" class="form-control" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur(); childKabkota();'>
                    <option value="default">--! Pilih Kabupaten/Kota !--</option>
                </select>
            </div> 
            <div class="form-group">
                <label for="kecamatan">Nama Kecamatan</label>
                <select name="kdKecamatan" id="kecamatan" class="form-control" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur(); childKecamatan();'>
                    <option value="default">--! Pilih Kecamatan !--</option>
                </select>
            </div> 
            <div class="form-group">
                <label for="Desa">Desa</label>
                <select name="kdDesa" id="Desa" class="form-control" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                    <option value="default">--! Pilih Desa !--</option>
                </select>
            </div> 
            <div class="form-group">
                <label for="nmPenduduk">Status Nikah</label>
                <select name="kdStatusNikah" id="StatusNikah" class="form-control">
                    <option value="default" >--! Pilih Status Nikah !--</option>
                        <option value="0">Belum Menikah</option>
                        <option value="1">Sudah Menikah</option>
                </select>
            </div> 
            <div class="form-group">
                <label for="nmPenduduk">Pekerjaan</label>
                <select name="kdPekerjaan" id="Pekerjaan" class="form-control" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                    <option value="default" selected >--! Pilih Pekerjaan !--</option>         
                </select>
            </div> 
     </div>
    <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
         <button type="submit" class="btn btn-primary" name="simpan">Tambah Data</button>
         </form>
      </div>
    </div>
  </div>

