<?php 
    require 'conf/function.php';
    $prov = query("SELECT * FROM provinsi ORDER BY kd_provinsi ASC");
    // $kd_prov = query("SELECT MAX(kd_provinsi) as kd_provinsi FROM provinsi")[0];

?>
<div class="row">
        <div class="col">
   <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Data Provinsi</h1><hr>
      
    <button type="button" class="mb-5 btn btn-primary btnSimpanProvinsi" data-toggle="modal" data-target="#formModalProvinsi">
        <i class="fa fa-plus-circle"></i> Tambah Data Provinsi
    </button>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Provinsi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Provinsi</th>
                            <th class="text-center">Nama Provinsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($prov as $row) : ?>
                        <tr>
                            <td class="text-center"><?= $no ?></td>
                            <td class="text-center"><?= $row['kd_provinsi']?></td>
                            <td class="text-center"><?= $row['nm_provinsi']?></td>
                            <td class="text-center">
                                <a href="edit_prov.php?id=<?=$row['kd_provinsi']?>" class="btn btn-success btn-circle float-center ubahDataProvinsi" data-toggle="modal" data-target="#formModalProvinsi" data-id="<?=$row['kd_provinsi']?>"><i class="fas fa-edit"></i></a> <?php if ($_SESSION['level'] == 2):?>| 
                                <a href="apps/prov/del_prov.php?id=<?=$row['kd_provinsi']?>" class="btn btn-danger btn-circle float-center tombol-hapus"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="formModalProvinsi" tabindex="-1" aria-labelledby="judulModalProvinsi" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModalProvinsi">Tambah Data Provinsi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="apps/prov/add_prov.php" method="POST">
            <div class="form-group">
                <label for="kdProv">Kode Provinsi</label>
                <input type="text" id="kdProv" name="kd_prov" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="nmProv">Nama Provinsi</label>
                <input type="text" id="nmProv" name="nm_prov" class="form-control">
            </div>   
     </div>
    <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
         <button type="submit" class="btn btn-primary" name="simpan">Tambah Data</button>
         </form>
      </div>
    </div>
  </div>


