    
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
        <form action="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Tambah Data</h3>
                </div>
            </div>
            
            <div class="clearfix"></div>
            <div class="row">
            <form method="post" action="<?php echo base_url("penjual/save"); ?>">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table class="table table-bordered" id="tableLoop">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Jenis Barang</th>
                                                <th class="text-center">Jumlah</th>
                                                <th><button class="btn btn-success btn-block" id="Tambah"><i class="fa fa-plus"></i>Tambah</button></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Simpan" class="btn btn-primary float-right">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>

    

    

        