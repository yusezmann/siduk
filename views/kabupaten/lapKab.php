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
        <h1>Data Kabupaten</h1>
        <table border="0">
        <tr>
                <th>ID Kabupaten</th>
                <th>Nama Kabupaten</th>
                <th>Jumlah Penduduk</th>
                <th>Provinsi</th>
        </tr>
        <?php
        foreach($dataProvider->getModels() as $kab){ 
        ?>
        <tr>
                <td><?= $kab->id_kab ?></td>
                <td><?= $kab->nama_kab ?></td>
                <td><?= $kab->jmlh_penduduk ?></td>
                <td><?= $kab->provinsi->nama_prov ?></td>
        </tr>
        <?php
        }
        ?>
        </table>
    </div>   
</body>
</html>