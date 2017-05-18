<?php
session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
    header('Location:manage.php?op=home');
}else{
    header('Location:login.php');
}