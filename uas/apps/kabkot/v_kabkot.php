<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php ");
    exit;
  }
    require 'conf/function.php';
    $kabkot = query("SELECT * 
                     FROM kab_kota
                     INNER JOIN provinsi
                     ON kab_kota.kd_provinsi = provinsi.kd_provinsi
                     ORDER BY provinsi.nm_provinsi ASC");
    $prov = query("SELECT * FROM provinsi ORDER BY nm_provinsi ASC");

?>
<div class="row">
        <div class="col">
   <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Data Kabupaten/Kota</h1><hr>
      
    <button type="button" class="mb-5 btn btn-primary btnSimpanKabkot" data-toggle="modal" data-target="#formModalKabkota">
        <i class="fa fa-plus-circle"></i> Tambah Data Kabupaten/Kota
    </button>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Kabupaten/Kota</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Kabupaten/Kota</th>
                            <th class="text-center">Nama Kabupaten/Kota</th>
                            <th class="text-center">Nama Provinsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($kabkot as $row) : ?>
                        <tr>
                            <td class="text-center"><?= $no ?></td>
                            <td class="text-center"><?= $row['kd_kabkota']?></td>
                            <td class="text-center"><?= $row['nm_kabkota']?></td>
                            <td class="text-center"><?= $row['nm_provinsi']?></td>
                            <td class="text-center">
                                <a href="edit_prov.php?id=<?=$row['kd_kabkota']?>" class="btn btn-success btn-circle float-center ubahDataKabkota" data-toggle="modal" data-target="#formModalKabkota" data-id="<?=$row['kd_kabkota']?>"><i class="fas fa-edit"></i></a> <?php if ($_SESSION['level'] == 2):?>| 
                                <a href="apps/kabkot/del_kabkot.php?id=<?=$row['kd_kabkota']?>" class="btn btn-danger btn-circle float-center tombol-hapus"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="formModalKabkota" tabindex="-1" aria-labelledby="judulModalKabkot" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModalKabkot">Tambah Data Kabupaten/Kota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="apps/kabkot/add_kabkot.php" method="POST">
            <div class="form-group">
                <label for="kdKabkot">Kode Kabupaten/Kota</label>
                <input type="text" id="kdKabkot" name="kd_kabkot" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="nmKabkot">Nama Kabupaten/Kota</label>
                <input type="text" id="nmKabkot" name="nm_kabkot" class="form-control">
            </div>   
            <div class="form-group">
                <label for="nmProv">Nama Provinsi</label>
                <select name="kdProv" id="prov" class="form-control selectpicker dropdown" data-dropup-auto="false" data-live-search="true" data-size="5">
                    <option value="default" selected>--! Pilih Provinsi !--</option>
                    <?php foreach($prov as $row):  ?>
                        <option value="<?=$row['kd_provinsi']?>"><?=$row['nm_provinsi']?></option>
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


