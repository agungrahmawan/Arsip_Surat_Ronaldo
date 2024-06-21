<?php
    session_start();
    if(!isset($_SESSION['user'])) {
        echo "<script language='javascript'>alert('Anda harus login terlebih dahulu!!!'); document.location.href='login.php';</script>";
    } else {
        if($_SESSION['level']!=='Admin'){
            echo "<script language='javascript'>document.location.href='login.php';</script>";
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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Surat</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List:</h6>
                        <a class="collapse-item" href="suratmasuk.php">Surat Masuk</a>
                        <a class="collapse-item" href="suratkeluar.php">Surat Keluar</a>
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

            <!-- Nav Item - pengaturan Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsepengaturan"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>pengaturan</span>
                </a>
                <div id="collapsepengaturan" class="collapse show" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List:</h6>
                        <a class="collapse-item" href="user.php">User</a>
                        <a class="collapse-item" href="klasifikasi.php">Kode Klasifikasi</a>
                        <a class="collapse-item active" href="instansi.php">Instansi</a>
                    </div>
                </div>
            </li>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h1 class="h3 mb-2 text-gray-800">Data Instansi saat ini</h1>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <?php 
                                        $sql = mysqli_query($conn, "SELECT * FROM tb_instansi WHERE id_instansi = '1'");
                                        while($row = mysqli_fetch_assoc($sql)){
                                    ?>
                                    <div class="col-md-6">
                                        <form action="data/data_instansi.php?act=edit" method="POST" enctype="multipart/form-data">
                                        <label for="" class="col-form-label">Nama Instansi</label>
                                        <input type="text" name="namains" placeholder="Nama Instansi" class="form-control bg-light border-0 small" value="<?= $row['nama'] ?>" required>
                                        <label for="" class="col-form-label">Nama Yayasan</label>
                                        <input type="text" name="yayasan" placeholder="Nama Yayasan" class="form-control bg-light border-0 small" value="<?= $row['institusi'] ?>" required>
                                        <label for="" class="col-form-label">Status</label>
                                        <input type="text" name="status" placeholder="Status Instansi" class="form-control bg-light border-0 small" value="<?= $row['status'] ?>" required>
                                        <label for="" class="col-form-label">Logo Instansi</label>
                                        <input type="file" name="logo" class="form-control bg-light border-0 small">
                                        <span class="text-danger">Format Logo : jpg, jpeg, png. Ukuran Maksimal(4Mb)</span><br>
                                        <img src="assets/logo/<?= $row['logo'] ?>" alt="<?= $row['logo'] ?>" width="80px">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="col-form-label">Nama Kepala</label>
                                        <input type="text" name="namakep" placeholder="Nama Kepala" class="form-control bg-light border-0 small" value="<?= $row['kepala'] ?>" required>
                                        <label for="" class="col-form-label">Nip</label>
                                        <input type="text" name="nip" placeholder="Nip Kepala" class="form-control bg-light border-0 small" value="<?= $row['nip'] ?>" required>
                                        <label for="" class="col-form-label">Email</label>
                                        <input type="email" name="email" placeholder="Email Instansi" class="form-control bg-light border-0 small" value="<?= $row['email'] ?>" required>
                                        <label for="" class="col-form-label">No. Telepon</label>
                                        <input type="text" name="notelp" placeholder="No Telpon Instansi" class="form-control bg-light border-0 small" value="<?= $row['notelp'] ?>" required>
                                        <label for="" class="col-form-label">Alamat Instansi</label>
                                        <textarea name="alamat" required placeholder="Alamat Instansi" id="" cols="30" rows="5" class="form-control bg-light border-0 small" required><?= $row['alamat'] ?></textarea>
                                        <input type="hidden" name="logolama"  value="<?= $row['logo'] ?>">
                                        <br>
                                    </div>
                                        <input type="submit" class="btn btn-facebook btn-block" name="edit" value="Edit Data Instansi">
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php }}
    include 'template/footer.php';
?>