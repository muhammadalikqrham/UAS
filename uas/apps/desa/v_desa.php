<?php
session_start(); 
if (!isset($_SESSION['login'])) {
    header("Location: index.php ");
  }
    require 'conf/function.php';
    $desa = query("SELECT * 
                     FROM desa
                     INNER JOIN kecamatan
                     ON desa.kd_kecamatan = kecamatan.kd_kecamatan
                     ORDER BY kecamatan.kd_kecamatan ASC");
    $kecamatan = query("SELECT * FROM kecamatan ORDER BY nm_kecamatan ASC");

?>
<div class="row">
        <div class="col">
   <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Data Desa</h1><hr>
      
    <button type="button" class="mb-5 btn btn-primary btnSimpanDesa" data-toggle="modal" data-target="#formModalDesa">
        <i class="fa fa-plus-circle"></i> Tambah Data Desa
    </button>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Desa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Desa</th>
                            <th class="text-center">Nama Desa</th>
                            <th class="text-center">Nama Kecamatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($desa as $row) : ?>
                        <tr>
                            <td class="text-center"><?= $no ?></td>
                            <td class="text-center"><?= $row['kd_desa']?></td>
                            <td class="text-center"><?= $row['nm_desa']?></td>
                            <td class="text-center"><?= $row['nm_kecamatan']?></td>
                            <td class="text-center">
                                <a href="edit_prov.php?id=<?=$row['kd_desa']?>" class="btn btn-success btn-circle float-center ubahDataDesa" data-toggle="modal" data-target="#formModalDesa" data-id="<?=$row['kd_desa']?>"><i class="fas fa-edit"></i></a> <?php if ($_SESSION['level'] == 2):?>|
                                <a href="apps/desa/del_desa.php?id=<?=$row['kd_desa']?>" class="btn btn-danger btn-circle float-center tombol-hapus"><i class="fas fa-trash"></i></a>
                                <?php endif;?>
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
<div class="modal fade" id="formModalDesa" tabindex="-1" aria-labelledby="judulModalDesa" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModalDesa">Tambah Data Desa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="apps/desa/add_desa.php" method="POST">
            <div class="form-group">
                <label for="kdDesa">Kode Desa</label>
                <input type="text" id="kdDesa" name="kd_desa" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="nmDesa">Nama Desa</label>
                <input type="text" id="nmDesa" name="nm_desa" class="form-control">
            </div>   
            <div class="form-group">
                <label for="nmDesa">Nama Kecamatan</label>
                <select name="kdKecamatan" id="kecamatan" class="form-control selectpicker dropdown" data-dropup-auto="false" data-live-search="true" data-size="5">
                    <option value="default" selected>--! Pilih Kecamatan !--</option>
                    <?php foreach($kecamatan as $row):  ?>
                        <option value="<?=$row['kd_kecamatan']?>"><?=$row['nm_kecamatan']?></option>
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


