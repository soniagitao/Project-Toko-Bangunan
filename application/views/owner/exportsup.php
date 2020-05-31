<!DOCTYPE html>
<html>
    <head>
    <title>Laporan Supplier</title>
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
        
            <table>
                <thead>
    
                    <tr>
                       
                        <th class="normal">Nama Supplier</th>
                        <th class="normal">No Telepon</th>
                        <th class="normal">ALAMAT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id_sup=1; ?>
                    <?php foreach($sup as $sp): ?>
                    <tr>
                        
                        <td><?= $sp->nama_sup; ?></td>
                        <td><?= $sp->no_telp; ?></td>
                        <td><?= $sp->alamat; ?></td>
                    </tr>
                    <?php $id_sup++; ?>
                    
                    <?php endforeach; ?>
                </tbody>
        </div>
        </table>
    </body>
</html>
