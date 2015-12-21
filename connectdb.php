<?php
   $con = mysqli_connect("localhost","root","","dbprogif");
        if ($con == false)
        {
            die("ERROR! Tidak dapat terhubung ".mysqli_connect_error());
        }
?>
