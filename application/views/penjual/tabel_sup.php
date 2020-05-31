      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Tabel Data Supplier</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <form action="" method="post">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for..." name="keyword">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>
          
                <?php if (empty($sup)) :?>
                <div class="alert alert-danger" role="alert">
                    Data Supplier tidak ditemukan
                </div>
                <?php endif; ?>

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Nama</th>
                              <th>No.Telp</th>
                              <th>Alamat</th>
                              <th>Edit</th>
                              <th>Hapus</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($sup as $sp) : ?>
                              <tr>
                                <td><?= $sp['nama_sup']; ?></td>
                                <td><?= $sp['no_telp']; ?></td>
                                <td><?= $sp['alamat']; ?></td>
                                <td>
                                  <a href="<?= base_url(); ?>Penjual/EditSup/<?= $sp['id_sup']; ?>" class="btn btn-outline-success btn-round">Edit</a>
                                </td>
                                <td>
                                  <a href="<?= base_url(); ?>Penjual/hapusSup/<?= $sp['id_sup']; ?>" class="btn btn-outline-danger btn-round" onclick="return confirm('Yakin Data ini akan Dihapus?');">Hapus</a>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>