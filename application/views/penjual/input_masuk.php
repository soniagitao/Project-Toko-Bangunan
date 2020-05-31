<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            
              <div class="title_left">
                <h3>Form Input Data Barang Masuk</h3>
              </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div id="notif"></div>
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

                            <form action="<?php echo base_url('Penjual/inputMasuk')?>" method="post" id="SimpanData">
                            
                            <div class="form-group">
                                <label for="ID Supplier">User</label>
                                <!-- <input type="text" class="form-control" id="id_user" placeholder="ID User" name="id_user"> -->

                                <select class="form-control" id="id_user" name="id_user">
                                <?php foreach($user as $us): ?>
                                  <option value="<?php echo $us->id_user; ?>"><?php echo $us->username; ?></option>     
                                <?php endforeach ?>                            
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="ID Supplier">Nama Supplier</label>
                                <select class="form-control" id="id_sup" name="id_sup">
                                <?php foreach($sup as $sp): ?>
                                  <option value="<?php echo $sp->id_sup; ?>"><?php echo $sp->nama_sup; ?></option>     
                                <?php endforeach ?>                            
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Tanggal">Tanggal</label>
                                <input type="date" date-format="dd-MM-yyyy" class="form-control" id="tanggal" placeholder="Tanggal" name="tanggal">
                            </div>

                            <div class="card-box table-responsive">
                                    <table class="table table-bordered" id="tableLoop">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th name="jenis_barang" id="jenis_barang">Jenis Barang</th>
                                                <th name="jumlah" id="jumlah">Jumlah</th>
                                                <th><button class="btn btn-success btn-block" id="Tambah"><i class="fa fa-plus"></i>Tambah</button></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                            </div>

                            <button type="submit" id="Submit" name="submit" class="btn btn-primary float-right">Submit</button>
                            </form>
                          </div>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
              