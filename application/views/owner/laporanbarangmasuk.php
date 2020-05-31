<!DOCTYPE html>
<html>
    <head>
        <title>Report Table</title>
        <style type="text/css">
        #outtable{
            padding:20px;
            border: 1px solid #e3e3e3;
            width:900px;
            border-radius:5px;
        }
        .short{
            width:50px;
        }
        .normal{
            width:150px;
        }
        table{
            border-collapse:collapse;
            font-family:arial;
            color:#5E5B5C;
        }
        thead th{
            text-align: left;
            padding:10px;
        }
        tbody td{
            border-top:1px solid #e3e3e3;
            padding:10px;
        }
        tbody tr:nth-child(even){
            background: #F6F5FA;
        }
        tbody tr:hover{
            background:#EAE9F5;
        }
        </style>
    </head>
    <body>
        <div id="outtable">
        <h1 style="text-align:center"> TOKO BANGUNAN CAHAYA ALAM </h1>
        <h1 style="text-align:center"> Laporan Barang Masuk</h1>
        <a href="<?php echo base_url("Owner/exportbarangmasuk"); ?>">Export ke Excel</a><br><br>
            <table>
                <thead>
                    <tr>
                    <th class="normal">Id Barang</th>
                       <th class="normal">Tanggal</th>
                        <th class="normal">Nama Supplier</th>
                        <th class="normal">Jenis Barang</th>
                        <th class="normal">Jumlah</th>
                
                    </tr>
                </thead>
                <tbody>
                    <?php $id_nota=1; ?>
                    <?php foreach ($masuk as $msk) : ?>
                  
                              <tr>
                              <td><?= $msk['id_barang']; ?></td>
                                <td><?= $msk['tanggal']; ?></td>
                                <td><?= $msk['nama_sup']; ?></td>
                                <td><?= $msk['jenis_barang']; ?></td>
                                <td><?= $msk['jumlah']; ?></td>
                                <td>
                       
                    </tr>
                    <?php $id_nota++; ?>
                    
                    
                            <?php endforeach; ?>
                </tbody>
        </div>
        </table>
    </body>
</html>
