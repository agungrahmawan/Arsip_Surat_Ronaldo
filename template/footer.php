            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Abdul Aziz Ronaldo 201953022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" untuk mengakhiri sesi masuk ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="keluar.php">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- tambahuser Modal-->
    <div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="data/data_user.php?act=tambah" method="POST">
                        <label for="" class="col-form-label">Username</label>
                        <input type="text" name="username" placeholder="Username" class="form-control bg-light border-0 small" required>
                        <label for="" class="col-form-label">Password</label>
                        <input type="text" name="password" placeholder="Password" class="form-control bg-light border-0 small" required>
                        <label for="" class="col-form-label">Nama User</label>
                        <input type="text" name="nama" placeholder="Nama User" class="form-control bg-light border-0 small" required>
                        <label for="" class="col-form-label">Level</label>
                        <select name="level" id="" class="form-control bg-light border-0 small">>
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                        </select>
                </div>
                <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Tambah Data">
                </div>
                    </form>
            </div>
        </div>
    </div>
    
    <!-- tambahkla Modal-->
    <div class="modal fade" id="tambahkla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Klasifikasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="data/data_klasifikasi.php?act=tambah" method="POST">
                        <label for="" class="col-form-label">Kode Klasifikasi</label>
                        <input type="text" name="kode" placeholder="Kode Klasifikasi" class="form-control bg-light border-0 small">
                        <label for="" class="col-form-label">Judul Klasifikasi</label>
                        <input type="text" name="judul" placeholder="Judul Klasifikasi" class="form-control bg-light border-0 small">
                        <label for="" class="col-form-label">Keterangan</label>
                        <textarea name="keterangan" placeholder="Keterangan" id="" cols="30" rows="5" class="form-control bg-light border-0 small"></textarea>    
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Tambah Data">
                    </div>
                    </form>
            </div>
        </div>
    </div>
    
    <!-- tambahsm Modal-->
    <div class="modal fade bd-example-modal-lg" id="tambahsm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Surat Masuk</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
                </div>
                <div class="modal-body">
                <form action="data/data_sm.php?act=tambah" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="col-form-label">Nomor Surat Masuk</label>
                                <input type="text" name="nosm" placeholder="Nomor Surat Masuk" class="form-control bg-light border-0 small" required>
                                <label for="" class="col-form-label">Nomor Agenda Surat Masuk</label>
                                <input type="text" name="noag" placeholder="Nomor Agenda Surat Masuk" class="form-control bg-light border-0 small" >
                                <label for="" class="col-form-label">Asal Surat</label>
                                <input type="text" name="asal" placeholder="Asal Surat" class="form-control bg-light border-0 small" required>
                                <label for="" class="col-form-label">Isi Ringkas/Perihal</label>
                                <textarea name="isi" placeholder="Isi Ringkas/Perihal Surat" id="" cols="10" rows="5" class="form-control bg-light border-0 small" required></textarea>
                                <label for="" class="col-form-label">File Surat</label>
                                <input type="file" name="filesm" class="form-control bg-light border-0 small">
                                <span class="text-danger">Format File : jpg, png, jpeg, pdf. Ukuran Maksimal(5Mb)</span><br> 
                            </div>
                            <div class="col-md-6">
                                <label for="" class="col-form-label">Kode Klasifikasi Surat</label>
                                <select name="kla" id="" class="form-control bg-light border-0 small" required>
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
                                <input value="<?= date('Y-m-d') ?>" type="date" name="tglsm" class="form-control bg-light border-0 small" required>
                                </div>
                                <label for="" class="col-form-label">Tanggal Diterima</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text border-0"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input value="<?= date('Y-m-d') ?>" type="date" name="tglsmd" class="form-control bg-light border-0 small" required>
                                </div>
                                <label for="" class="col-form-label">Keterangan Surat</label>
                                <textarea name="ket" placeholder="Keterangan Surat Masuk" id="" cols="10" rows="5" class="form-control bg-light border-0 small"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Tambah Data">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- tambahsk Modal-->
    <div class="modal fade bd-example-modal-lg" id="tambahsk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Surat Keluar</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
                </div>
                <div class="modal-body">
                <form action="data/data_sk.php?act=tambah" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="col-form-label">Nomor Surat Keluar</label>
                                <input type="text" name="nosk" placeholder="Nomor Surat Keluar" class="form-control bg-light border-0 small" required>
                                <label for="" class="col-form-label">Nomor Agenda Surat Keluar</label>
                                <input type="text" name="noag" placeholder="Nomor Agenda Surat Masuk" class="form-control bg-light border-0 small" >
                                <label for="" class="col-form-label">Tujuan Surat</label>
                                <input type="text" name="tujuan" placeholder="Tujuan Surat" class="form-control bg-light border-0 small" required>
                                <label for="" class="col-form-label">Isi Ringkas/Perihal</label>
                                <textarea name="isi" placeholder="Isi Ringkas/Perihal Surat" id="" cols="10" rows="5" class="form-control bg-light border-0 small" required></textarea>
                                <label for="" class="col-form-label">File Surat</label>
                                <input type="file" name="filesk" class="form-control bg-light border-0 small">
                                <span class="text-danger">Format File : jpg, png, jpeg,pdf. Ukuran Maksimal(5Mb)</span><br> 
                            </div>
                            <div class="col-md-6">
                                <label for="" class="col-form-label">Kode Klasifikasi Surat</label>
                                <select name="kla" id="" class="form-control bg-light border-0 small" required>
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
                                <input value="<?= date('Y-m-d') ?>" type="date" name="tglsk" class="form-control bg-light border-0 small" required>
                                </div>
                                <label for="" class="col-form-label">Tanggal Keluar</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text border-0"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input value="<?= date('Y-m-d') ?>" type="date" name="tglk" class="form-control bg-light border-0 small" required>
                                </div>
                                <label for="" class="col-form-label">Keterangan Surat</label>
                                <textarea name="ket" placeholder="Keterangan Surat Keluar" id="" cols="10" rows="5" class="form-control bg-light border-0 small"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Tambah Data">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>


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
    <script>
        $('#disposisi').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true
        })

        $('#laporansm').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true
        })
    </script>
</body>

</html>
