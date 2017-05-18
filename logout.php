<?php

    unset($_SESSION['name']);
    unset($_SESSION['password']);
    unset($_SESSION['folder']);
    header("Location:out.php");
