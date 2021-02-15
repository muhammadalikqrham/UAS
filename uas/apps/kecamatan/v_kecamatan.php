<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php ");
    exit;
  }
    require 'conf/function.php';
    $kabkot = query("SELECT * 
                     FROM kecamatan
                     INNER JOIN kab_kota
                     ON kecamatan.kd_kabkota = kab_kota.kd_kabkota
                     ORDER BY kab_kota.nm_kabkota ASC");
    $prov = query("SELECT * FROM kab_kota ORDER BY nm_kabkota ASC");

?>
<div class="row">
        <div class="col">
   <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Kecamatan</h1><hr>
      
    <button type="button" class="mb-5 btn btn-primary btnSimpanKecamatan" data-toggle="modal" data-target="#formModalKecamatan">
        <i class="fa fa-plus-circle"></i> Tambah Data Kecamatan
    </button>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Kecamatan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Kecamatan</th>
                            <th class="text-center">Nama Kecamatan</th>
                            <th class="text-center">Nama Kabupaten/Kota</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($kabkot as $row) : ?>
                        <tr>
                            <td class="text-center"><?= $no ?></td>
                            <td class="text-center"><?= $row['kd_kecamatan']?></td>
                            <td class="text-center"><?= $row['nm_kecamatan']?></td>
                            <td class="text-center"><?= $row['nm_kabkota']?></td>
                            <td class="text-center">
                                <a href="edit_prov.php?id=<?=$row['kd_kecamatan']?>" class="btn btn-success btn-circle float-center ubahDataKecamatan" data-toggle="modal" data-target="#formModalKecamatan" data-id="<?=$row['kd_kecamatan']?>"><i class="fas fa-edit"></i></a> <?php if ($_SESSION['level'] == 2):?>| 
                                <a href="apps/kecamatan/del_kecamatan.php?id=<?=$row['kd_kecamatan']?>" class="btn btn-danger btn-circle float-center tombol-hapus"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="formModalKecamatan" tabindex="-1" aria-labelledby="judulModalKecamatan" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModalKecamatan">Tambah Data Kabupaten/Kota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="apps/kecamatan/add_Kecamatan.php" method="POST">
            <div class="form-group">
                <label for="kdKecamatan">Kode Kecamatan</label>
                <input type="text" id="kdKecamatan" name="kd_kecamatan" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="nmKecamatan">Nama Kecamatan</label>
                <input type="text" id="nmKecamatan" name="nm_kecamatan" class="form-control">
            </div>   
            <div class="form-group">
                <label for="nmKabkota">Nama Kabupaten/Kota</label>
                <select name="kdKabkota" id="kabkota" class="form-control selectpicker dropdown" data-live-search="true" data-size="5" data-dropup-auto="false">
                    <option value="default">--! Pilih Kabupaten/Kota !--</option>
                    <?php foreach($prov as $row):  ?>
                        <option data-tokens="<?=$row['nm_kabkota']?>" value="<?=$row['kd_kabkota']?>"><?=$row['nm_kabkota']?></option>
                    <?php endforeach; ?>
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