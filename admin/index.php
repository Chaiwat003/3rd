<?php
    ob_start();
    session_start();
    define('isdoc',1);

    include '../condb.php';
    include 'function_admin.php';
    include 'adminmain/_head.php';

    if ($_iadmin_1000lam_ != "") 
    {
        if (isset($_GET['page']) && $_GET['page'] != 'login' && $_GET['page'] != 'logout')
        {
            $page = $_GET['page'];
            include 'adminmain/'.$page.'.php';
        }
        else if (isset($_GET['page']) && $_GET['page'] == "logout")
        {
            session_destroy();
            header("location: ".$urlconfig."admin/index.php");
        }
        else
        {
            include 'adminmain/login.php';
        }
    }
    else
    {
        include 'adminmain/login.php';
    }
    include 'adminmain/_menu.php';
    include 'adminmain/_foot.php';
    ob_end_flush();
?>