<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Input Data Barang Keluar</h3>
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

                            <form action="<?php echo base_url('Penjual/inputKeluar')?>" method="post" id="SimpanData">
                            
                            <div class="form-group">
                                <label for="ID Supplier">User</label>
                                <select class="form-control" id="id_user" name="id_user">
                                    <?php foreach($user as $us): ?>
                                      <option value="<?php echo $us->id_user; ?>"><?php echo $us->username; ?></option>     
                                    <?php endforeach ?>                            
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal_penjualan" placeholder="Tanggal" name="tanggal_penjualan">
                            </div>
                            
                            <div class="card-box table-responsive">
                              <table class="table table-bordered" id="tableLoop">
                                <thead>
                                  <tr>
                                    <th class="text-center">#</th>
                                    <th name="jenis_barang" id="jenis_barang">Jenis Barang</th>
                                    <th name="jumlah_jual" id="jumlah_jual">Jumlah</th>
                                    <th><button class="btn btn-success btn-block" id="Tambah"><i class="fa fa-plus"></i>Tambah</button></th>
                                  </tr>
                                </thead>
                                <tbody></tbody>
                              </table>
                              <button type="submit" id="Submit" name="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                            </form>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
              
              <!-- <script type="text/JavaScript">
                function tambahBaris() {
                  var i=1;  
                      $('#add').click(function(){  
                        i++;
                          $('#dynamic_field').append('<tr id="row'+i+'"><td><select class="form-control" id="id_barang" name="id_barang[]"><?php foreach($barang as $brg): ?><option value="<?php echo $brg->id_barang; ?>"><?php echo $brg->jenis_barang; ?></option><?php endforeach ?></select></td><td><input type="text" class="form-control" id="jumlah_jual" placeholder="jumlah" name="jumlah_jual[]"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
                      });
                      $(document).on('click', '.btn_remove', function(){  
                          var button_id = $(this).attr("id");   
                          $('#row'+button_id+'').remove();  
                      });
                }
              </script> -->