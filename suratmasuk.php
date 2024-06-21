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
                        <a class="collapse-item active" href="suratmasuk.php">Surat Masuk</a>
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Surat Masuk</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <?php 
                            if($_SESSION['level']=="Admin"){
                        ?>
                            <a href="#" data-toggle="modal" data-target="#tambahsm" class="btn btn-primary" type="button">Tambah Data</a>
                        <?php } else {}?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Surat Masuk</th>
                                            <th>Perihal Surat</th>
                                            <th>Asal Surat</th>
                                            <th>Tanggal Surat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Surat Masuk</th>
                                            <th>Perihal Surat</th>
                                            <th>Asal Surat</th>
                                            <th>Tanggal Surat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $sql = mysqli_query($conn, "SELECT * FROM tb_suratmasuk");
                                            $no = 1;
                                            while($row=mysqli_fetch_assoc($sql)){
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['no_suratmasuk'] ?></td>
                                            <td><?= $row['isi_surat'] ?></td>
                                            <td><?= $row['asal_surat'] ?></td>
                                            <td><?php 
                                                $newDate = date("d-m-Y", strtotime($row['tgl_surat']));  
                                                echo $newDate;
                                                ?>
                                            </td>
                                            <td>
                                                <a href="cetakdisp.php?id=<?= $row['id_suratmasuk'] ?>" class="btn btn-info btn-circle btn-sm" target="_blank"><i class="fas fa-print"></i></a>
                                                <a href="detail_sm.php?id=<?= $row['id_suratmasuk'] ?>" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-exclamation-circle"></i></a>
                                                <?php 
                                                    if($_SESSION['level']=="Admin"){
                                                ?>
                                                <a href="disposisi.php?id=<?= $row['id_suratmasuk'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-archive"></i></a>
                                                <a href="#" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#edit<?php echo $row['id_suratmasuk']; ?>"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#hapus<?php echo $row['id_suratmasuk']; ?>"><i class="fas fa-trash"></i></a>
                                                <?php } else {}?>
                                            </td>
                                        </tr>
                                        <!-- hapus Modal-->
                                        <div class="modal fade" id="hapus<?php echo $row['id_suratmasuk']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Mengahpus Data?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Pilih "Hapus" untuk menghapus data surat <?= $row['no_suratmasuk'] ?>.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                        <a href="data/data_sm.php?act=hapus&id=<?php echo $row['id_suratmasuk']; ?>" class="btn btn-primary">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- editidk Modal-->
                                        <div class="modal fade bd-example-modal-lg" id="edit<?php echo $row['id_suratmasuk']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Surat Masuk</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php
                                                            $id=$row['id_suratmasuk'];
                                                            $sqledit=mysqli_query($conn, "SELECT * FROM tb_suratmasuk, tb_klasifikasi WHERE id_suratmasuk='$id' and tb_suratmasuk.klasifikasi = tb_klasifikasi.id_klasifikasi");
                                                            while($rowe=mysqli_fetch_assoc($sqledit)){
                                                        ?>
                                                        <form action="data/data_sm.php?act=edit" method="POST" enctype="multipart/form-data">
                                                        <div class="container">
                                                        <div class="row">
                                                        <div class="col-md-6">
                                                                <label for="" class="col-form-label">Nomor Surat Masuk</label>
                                                                <input type="text" name="nosm" placeholder="Nomor Surat Masuk" class="form-control bg-light border-0 small" required value="<?= $rowe['no_suratmasuk'] ?>">
                                                                <label for="" class="col-form-label">Nomor Agenda Surat Masuk</label>
                                                                <input type="text" name="noag" placeholder="Nomor Agenda Surat Masuk" class="form-control bg-light border-0 small" value="<?= $rowe['no_agenda'] ?>">
                                                                <label for="" class="col-form-label">Asal Surat</label>
                                                                <input type="text" name="asal" placeholder="Asal Surat" class="form-control bg-light border-0 small" required value="<?= $rowe['asal_surat'] ?>">
                                                                <label for="" class="col-form-label">Isi Ringkas/Perihal</label>
                                                                <textarea name="isi" placeholder="Isi Ringkas/Perihal Surat" id="" cols="10" rows="5" class="form-control bg-light border-0 small" required><?= $rowe['isi_surat'] ?></textarea>
                                                                <label for="" class="col-form-label">File Surat</label>
                                                                <input type="file" name="filesm" class="form-control bg-light border-0 small">
                                                                <span class="text-danger">Format File : jpg, png, jpeg. Ukuran Maksimal(5Mb)</span><br> 
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="" class="col-form-label">Kode Klasifikasi Surat</label>
                                                            
                                                            <select name="kla" id="" class="form-control bg-light border-0 small" required>
                                                                <option hidden value="<?= $rowe['id_klasifikasi'] ?>"><?= $rowe['kode_klasifikasi'] . " - " . $rowe['judul_klasifikasi']?></option>
                                                                <option value="-">-- PILIH KODE KLASIFIKASI --</option>
                                                                <?php
                                                                $query = mysqli_query($conn, "SELECT * FROM tb_klasifikasi");
                                                                while($d = mysqli_fetch_array($query)){
                                                                    echo "<option value='" . $d['id_klasifikasi'] . "'>" . $d['kode_klasifikasi'] . " - " . $d['judul_klasifikasi'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <label for="" class="col-form-label">Tanggal Surat</label>
                                                                <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text border-0"><i class="far fa-calendar-alt"></i></span>
                                                                </div>
                                                                    <input type="date" name="tglsm" class="form-control bg-light border-0 small" required value="<?= $rowe['tgl_surat'] ?>">
                                                                </div>
                                                            <label for="" class="col-form-label">Tanggal Diterima</label>
                                                                <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text border-0"><i class="far fa-calendar-alt"></i></span>
                                                                </div>
                                                                    <input type="date" name="tglsmd" class="form-control bg-light border-0 small" required value="<?= $rowe['tgl_diterima'] ?>">
                                                                </div>
                                                            <label for="" class="col-form-label">Keterangan Surat</label>
                                                                <textarea name="ket" placeholder="Keterangan Surat Masuk" id="" cols="10" rows="5" class="form-control bg-light border-0 small"><?= $rowe['ket_suratmasuk'] ?></textarea>
                                                            <label for="" class="col-form-label">File Surat Masuk :</label>
                                                                <?php
                                                                    if($rowe['file_suratmasuk']=='TIDAK ADA FILE'){
                                                                        echo "<b>TIDAK ADA FILE</b>";
                                                                    } else {
                                                                        ?>
                                                                        <a href="fsm.php?id=<?= $rowe['id_suratmasuk'] ?>" class="btn btn-primary btn-sm">Lihat Full</a>
                                                                        <?php
                                                                    }
                                                                ?>
                                                                <input type="hidden" name="id" value="<?= $rowe['id_suratmasuk'] ?>">
                                                                <input type="hidden" name="filelama" value="<?= $rowe['file_suratmasuk'] ?>" id="">
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                            <input type="submit" class="btn btn-primary" value="Edit Data">
                                                        </div>
                                                    </form>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php }
    include 'template/footer.php';
?>