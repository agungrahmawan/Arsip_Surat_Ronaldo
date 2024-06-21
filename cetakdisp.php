<?php 
    $id=$_GET['id'];
	include 'config/db.php';
    $query = mysqli_query($conn, "SELECT * FROM tb_disposisi, tb_suratmasuk WHERE tb_suratmasuk.id_suratmasuk='$id' AND tb_disposisi.id_suratmasuk=tb_suratmasuk.id_suratmasuk");
    $query2 = mysqli_query($conn, "SELECT * FROM tb_instansi");
    $it = mysqli_fetch_array($query2);
    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>CETAK DISPOSISI <?=$it['nama']?></title>
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

        .table {
            border: 1px solid black;
        }
        .table td, .table th {
            color: black;
            border-top: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-3">
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
        <h2 class="text-center font-weight-bold">LEMBAR DISPOSISI</h2>
        <div class="row-mt-2">
            <table class="table">
                <tbody>
                    <tr>
                        <td width="100px">Asal Surat</td>
                        <td>: <?=$row['asal_surat']?></td>
                        <td class="text-right">Diterima Tgl.</td>
                        <td>: <?php $n = date("d-m-Y", strtotime($row['tgl_diterima']));  
                            echo $n;?></td>
                    </tr>
                    <tr>
                        <td width="100px">No. Surat</td>
                        <td>: <?=$row['no_suratmasuk']?></td>
                        <td class="text-right">No Agenda.</td>
                        <td>: <?=$row['no_agenda']?></td>
                    </tr>
                    <tr>
                        <td width="100px">Tgl. Surat</td>
                        <td>: <?php $n2 = date("d-m-Y", strtotime($row['tgl_surat']));  
                            echo $n2;?></td>
                        <td class="text-right">Kode</td>
                        <td>: <?=$row['kode_klasifikasi']?></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Sifat</td>
                        <td>: <?=$row['sifat']?></td>
                    </tr>
                    <tr>
                        <td width="100px">Perihal</td>
                        <td colspan="3" style="height:100px">: <?=$row['isi_surat']?></td>
                    </tr>
                    <tr>
                        <td width="150px" class="font-weight-bold">Diteruskan Kepada</td>
                        <td>: <?=$row['tujuan']?></td>
                        <td class="text-right font-weight-bold">Isi Disposisi</td>
                        <td>: <?=$row['isi_disposisi']?></td>
                    </tr>
                    <tr>
                        <td width="100px" class="font-weight-bold">Catatan</td>
                        <td colspan="3" style="height:130px">: <?=$row['catatan']?></td>
                    </tr>
                </tbody>
            </table>
            <p class="text-right mr-5 pr-4 mb-5 pb-5 font-weight-bold">Kepala Dinas</p>
            <p class="text-right"><?=$it['kepala']?><br>
                Nip. <?=$it['nip']?>
            </p>
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