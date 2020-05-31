      <!-- page content -->
      <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tabel Detail Barang Masuk</h3>
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
              </form>
              </div>
            </div>
          </div>

            <div class="clearfix"></div>

          
                <?php if (empty($detailmasuk)) :?>
                <div class="alert alert-danger" role="alert">
                    Data Detail Barang keluar tidak ditemukan
                </div>
                <?php endif; ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <!-- <a href="<?= base_url();?>penjual/formLoop/" class="btn btn-primary btn-md">Tambah Data</a> -->
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Barang</th>
                          <th>Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($detailmasuk as $dmsk) : ?>
                              <tr>
                                <td><?php echo $dmsk->jenis_barang ?></td>
                                <td><?php echo $dmsk->jumlah ?></td>
                              </tr>
    
                            <?php endforeach; ?>
                      </tbody>
                    </table>
                    <td>
                    <a href="<?= base_url(); ?>penjual/tabelMasuk/" class="btn btn-outline-danger btn-round">Kembali</a>
                    </td>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>