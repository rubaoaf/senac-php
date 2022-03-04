<?php
    $conn = mysqli_connect('', '', '', '') or die(mysqli_error());
    echo "Banco conectado";
    $conn -> close();
