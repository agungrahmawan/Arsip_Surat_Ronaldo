<?php
    session_start();
    if(!isset($_SESSION['user'])) {
        echo "<script language='javascript'>alert('Anda harus login terlebih dahulu!!!'); document.location.href='login.php';</script>";
    } else {
    include 'config/db.php';
    include 'template/header.php';
?>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MENU UTAMA
            </div>

            <!-- Nav Item - surat Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Surat</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List:</h6>
                        <a class="collapse-item" href="suratmasuk.php">Surat Masuk</a>
                        <a class="collapse-item active" href="suratkeluar.php">Surat Keluar</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - laporan Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List:</h6>
                        <a class="collapse-item" href="laporansm.php">Laporan Surat Masuk</a>
                        <a class="collapse-item" href="laporansk.php">Laporan Surat Keluar</a>
                    </div>
                </div>
            </li>

            <?php
                if($_SESSION['level']=='Admin'){
            ?>
            <!-- Nav Item - pengaturan Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepengaturan"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>pengaturan</span>
                </a>
                <div id="collapsepengaturan" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List:</h6>
                        <a class="collapse-item" href="user.php">User</a>
                        <a class="collapse-item" href="klasifikasi.php">Kode Klasifikasi</a>
                        <a class="collapse-item" href="instansi.php">Instansi</a>
                    </div>
                </div>
            </li>
            <?php
                } else {}
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Lainnya
            </div>

            <!-- Nav Item - tentang -->
            <li class="nav-item">
                <a class="nav-link" href="tentang.php">
                    <i class="fas fa-fw fa-info-circle"></i>
                    <span>Tentang Aplikasi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <?php
                                    $hariini = date('Y-m-d');
                                    $sqli = mysqli_query($conn, "SELECT * FROM tb_suratmasuk WHERE tgl_surat='$hariini'");
                                    $ceksqli = mysqli_num_rows($sqli);
                                ?>
                                <span class="badge badge-danger badge-counter"><?= $ceksqli ?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Surat Masuk Hari INi (<?= date('d-m-Y') ?>)
                                </h6>
                                <?php
                                    if($ceksqli>0){
                                    while($rowm = mysqli_fetch_array($sqli)){
                                ?>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?= $rowm['isi_surat'] ?></div>
                                        <div class="small text-gray-500"><?= $rowm['asal_surat'] ?> - <?= $rowm['no_suratmasuk'] ?></div>
                                    </div>
                                </a>
                                <?php }} else { ?>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="font-weight-bold text-center">
                                        <div class="text-truncate">Tidak Ada Surat</div>
                                    </div>
                                </a>
                                <?php } ?>
                                <a class="dropdown-item text-center small text-gray-500" href="suratmasuk.php">Lihat Semua Surat Masuk</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['user']?></span>
                                <img class="img-profile rounded-circle"
                                    src="assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php
                        $id = $_GET['id'];
                        $sqlsm = mysqli_query($conn, "SELECT * FROM tb_suratkeluar, tb_klasifikasi WHERE id_suratkeluar='$id' and tb_suratkeluar.klasifikasi = tb_klasifikasi.id_klasifikasi");
                        $t = mysqli_fetch_assoc($sqlsm);
                    ?>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Surat keluar</h1>
                    </div>

                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <p class=" h6 m-0 font-weight-bold text-primary">Detail Surat Keluar</p>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <label for="" class="col-form-label">Nomor Surat Keluar</label>
                                            <input type="text" name="nosm" placeholder="" class="form-control bg-light border-1 small" readonly value="<?= $t['no_suratkeluar'] ?>">
                                            <label for="" class="col-form-label">Nomor Agenda Surat Keluar</label>
                                            <input type="text" name="nosm" placeholder="" class="form-control bg-light border-1 small" readonly value="<?= $t['no_agenda'] ?>">
                                            <label for="" class="col-form-label">Tujuan Surat</label>
                                            <input type="text" name="tujuan" placeholder="" class="form-control bg-light border-1 small" readonly value="<?= $t['tujuan_surat'] ?>">
                                            <label for="" class="col-form-label">Isi Ringkas</label>
                                            <textarea name="isi" placeholder="" id="" cols="10" rows="5" class="form-control bg-light border-1 small" readonly ><?= $t['isi_surat'] ?></textarea>  
                                            <label for="" class="col-form-label">Keterangan</label>
                                            <textarea name="keterangan" placeholder="" id="" cols="10" rows="5" class="form-control bg-light border-1 small" readonly><?= $t['ket_suratkeluar'] ?></textarea>                                         
                                            </div>

                                            <div class="col-md-6">
                                            <label for="" class="col-form-label">Kode Klasifikasi Surat</label>
                                            <input type="text" name="kla" class="form-control bg-light border-1 small" readonly value="<?= $t['kode_klasifikasi'] . " - " . $t['judul_klasifikasi'] ?>">
                                            <label for="" class="col-form-label">Tanggal Surat</label>
                                            <input type="date" name="tglsm" class="form-control bg-light border-1 small" readonly value="<?= $t['tgl_surat'] ?>">
                                            <label for="" class="col-form-label">Tanggal Diterima</label>
                                            <input type="date" name="tglsm" class="form-control bg-light border-1 small" readonly value="<?= $t['tgl_keluar'] ?>">

                                            <label for="" class="col-form-label">File Surat : Klik File untuk melihat full gambar</label><br>
                                                                <?php
                                                                    if($t['file_suratkeluar']=='TIDAK ADA FILE'){
                                                                        echo "<b>TIDAK ADA FILE</b>";
                                                                    } else {
                                                                        ?>
                                                                        <a href="fsk.php?id=<?= $t['id_suratkeluar'] ?>" ><img src='file/suratkeluar/<?=$t['file_suratkeluar']?>' alt='<?=$t['file_suratkeluar']  ?>' width='30%'></a><br>
                                                                        <?php
                                                                    }
                                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <a href="suratkeluar.php" class="btn btn-primary btn-icon-split mb-4">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>
                                </div>
                            </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php }
    include 'template/footer.php';
?>