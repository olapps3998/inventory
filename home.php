<?php
// include header
include "header.php";
// set the tpl page
$page = "home.tpl";

$module = $_GET['module'];
$act = $_GET['act'];


$smarty->assign("msg", $_GET['msg']);
$smarty->assign("breadcumbTitle", "Home");
$smarty->assign("breadcumbTitleSmall", "Halaman utama aplikasi");
$smarty->assign("breadcumbMenuName", "Home");
$smarty->assign("breadcumbMenuSubName", "Dashboard");

// include footer
include "footer.php";
?>
