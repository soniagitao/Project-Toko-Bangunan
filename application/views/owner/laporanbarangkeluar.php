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
        <h1 style="text-align:center"> Laporan Barang Keluar </h1>
            <a href="<?php echo base_url("Owner/exportbarangkeluar"); ?>">Export ke Excel</a><br><br>
            <table>
                <thead>
                    <tr>
                       
                    <th class="normal">Nama Supplier</th>
                        <th class="normal">Tanggal Penjualan</th>
                        <th class="normal">Jenis Barang</th>
                        <th class="normal">Jumlah jual</th>
                
                    </tr>
                </thead>
             
                <tbody>
                    <?php $id_penjualan=1; ?>
                    <?php foreach($keluar as $kr): ?>
                    <tr>
                    <td><?php echo $kr['nama_sup']; ?></td>
                    <td><?php echo $kr['tanggal_penjualan']; ?></td>
                    <td><?php echo $kr['jenis_barang']; ?></td>
                    <td><?php echo $kr['jumlah_jual']; ?></td>
                       
                    </tr>
                    <?php $id_penjualan++; ?>
                    
                    <?php endforeach; ?>
                </tbody>
        </div>
        </table>
    </body>
</html>