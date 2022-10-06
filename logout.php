<?php
    include('./input-config.php');

    session_destroy();

    echo "
    <script>
         alert('Logout berhasil');
        window.location='login.php';
    </script>
  ";
