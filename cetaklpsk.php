<?php 
    $tglaw = $_GET['tglaw'];
    $tglak = $_GET['tglak'];
	include 'config/db.php';
    $query = mysqli_query($conn, "SELECT * FROM tb_suratkeluar WHERE tgl_keluar BETWEEN '$tglaw' AND '$tglak'");
    $query2 = mysqli_query($conn, "SELECT * FROM tb_instansi");
    $it = mysqli_fetch_array($query2);
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>CETAK LAPORAN SURAT <?=$it['nama']?></title>
    <link href="assets/logo/<?= $it['logo'] ?>" rel="shortcut icon">
    <link href="assets/vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    
    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        h1, h2, h5, p, table {
            color: black;
            font-family:'Times New Roman';
        }
        .table td, .table th {
            color: black;
            border: 1px solid black;
        }
        table, tr, th, td {
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-2">
                <img src="assets/logo/<?=$it['logo']?>" alt="<?=$it['logo']?>" width="110px">
            </div>
            <div class="col-md-10">
                <h1 class="text-center"><?=$it['institusi']?></h1>
                <h2 class="text-center"><?=$it['nama']?></h2>
                <p class="text-center"><?=$it['alamat']?><br>
                Telp <?=$it['notelp']?>
                Email <?=$it['email']?></p>
            </div>
        </div>
        <hr>
        <h5 class="text-center">LAPORAN SURAT KELUAR</h5>
        <p class="text-center">Laporan Surat Keluar dari tanggal 
        <?php 
        $newDate3 = date("d-m-Y", strtotime($tglaw));  
        echo $newDate3;
        ?> sampai dengan tanggal 
        <?php 
        $newDate3 = date("d-m-Y", strtotime($tglak));  
        echo $newDate3;
        ?></p>
        <div class="row">
            <table class="table table-bordered text-dark" width="100%">
                <tr>
                    <th>No</th>
                    <th>No. Surat Keluar</th>
                    <th>No. Agenda</th>
                    <th>Perihal Surat</th>
                    <th>Tujuan Surat</th>
                    <th>Kode Klasifikasi</th>
                    <th>Tanggal Surat</th>
                    <th>Tanggal Keluar</th>
                    <th>Keterangan</th>
                </tr>
                <?php 
                     $no = 1;
                    while($row=mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?= $row['no_suratkeluar'] ?></td>
                    <td><?= $row['no_agenda'] ?></td>
                    <td><?= $row['isi_surat'] ?></td>
                    <td><?= $row['tujuan_surat'] ?></td>
                    <td><?= $row['klasifikasi'] ?></td>
                    <td><?php 
                            $newDate = date("d-m-Y", strtotime($row['tgl_surat']));  
                            echo $newDate;
                        ?>
                    </td>
                    <td><?php 
                            $newDate2 = date("d-m-Y", strtotime($row['tgl_keluar']));  
                            echo $newDate2;
                        ?>
                    </td>
                    <td><?= $row['ket_suratkeluar'] ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
    <script>
		window.print();
	</script>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
</html>