<?php
session_start();
session_destroy();

echo "<script language='javascript'>alert('Anda Telah Keluar !!!'); document.location.href='login.php'; </script>";
?>