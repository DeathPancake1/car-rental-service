<?php
session_start();

if(isset($_SESSION['user_name']))
{
    unset($_SESSION['user_name']);
}

if(isset($_SESSION['admin_name']))
{
    unset($_SESSION['admin_name']);
}

header("Location: login.html");
die;