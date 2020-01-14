<?php
session_start();
if (($_SESSION['userid'] == '') || ($_SESSION['usertype'] <> '0')) 
{
	die('<script language="javascript">top.location.href="loginexit.php"</script>');
}

header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

$con = mysql_connect("localhost","root","");
mysql_select_db("qingzhou", $con);
mysql_query("set names gb2312 ");

// echo $_SESSION['code0'];die();
$SQL = "UPDATE t_order0 SET ispay = '1' WHERE ordercode= '". $_SESSION['code0'] ."' AND userid='". $_SESSION['userid'] ."'";
// echo $SQL;die();

$RS0 = mysql_query($SQL, $con);

header("location: orderlist.php");
?>