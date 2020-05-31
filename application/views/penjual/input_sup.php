<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Input Data Supplier</h3>
              </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <div class="card-body">
                                <?php if (validation_errors()): ?>
                                <div class="alert alert-danger" role="alert">
                                <?= validation_errors()?>
                            </div>
                            <?php endif ?> 

                            <form action="" method="post">
                            
                            <label for="ID Supplier">User</label>
                                <select class="form-control" id="id_user" name="id_user">
                                    <?php foreach($user as $us): ?>
                                      <option value="<?php echo $us->id_user; ?>"><?php echo $us->username; ?></option>     
                                    <?php endforeach ?>                            
                                </select>

                            <div class="form-group">
                                <label for="ID Supplier">Nama Supplier</label>
                                <input type="text" class="form-control" id="nama_sup" placeholder="Nama Supplier" name="nama_sup">
                            </div>

                            <div class="form-group">
                                <label for="Nomor Telepon">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_telp" placeholder="Nomor Telepon" name="no_telp">
                            </div>

                            <div class="form-group">
                                <label for="Alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                            </form>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>   