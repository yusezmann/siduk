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
                <th>No</th>
                <th>Nama Provinsi</th>
                <th>Nama Kabupaten</th>
                <th>Jumlah Penduduk</th>
        </tr>
        <?php
        $no = 1;
        foreach($dataProvider->getModels() as $kab){ 
        ?>
        <tr>
                <td><?= $no++  ?></td>
                <td><?= $kab->idprov0->nama_prov ?></td>
                <td><?= $kab->nama_kab ?></td>
                <td><?= $kab->jmlh_penduduk ?></td>
        </tr>
        <?php
        }
        ?>
        </table>
    </div>   
</body>
</html>