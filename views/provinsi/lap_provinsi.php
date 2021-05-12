<!DOCTYPE html>
<html>
<head>
    <title>Print Invoice</title>
    <style>
        .page
        {           
            padding:2cm;
        }
        table
        {
            border-spacing:0;
            border-collapse: collapse; 
            width:100%;
        }

        table td, table th
        {
            border: 1px solid #ccc;
        }
		
		table th
        {
            background-color:red;
        }
    </style>
</head>
<body>	
    <div class="page">	
        <h1>Data Provinsi</h1>
        <table border="0">
        <tr>
                <th>ID Provinsi</th>
                <th>Nama Provinsi</th>
                <th>Jumlah Penduduk</th>
        </tr>
        <?php
        foreach($dataProvider->getModels() as $prov){ 
        ?>
        <tr>
                <td><?= $prov->id_prov ?></td>
                <td><?= $prov->nama_prov ?></td>
                <td><?= $prov->prov->jmlh_penduduk ?></td>
        </tr>
        <?php
        }
        ?>
        </table>
    </div>   
</body>
</html>