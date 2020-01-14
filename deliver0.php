<?php
session_start();
if (($_SESSION['userid'] == '') || ($_SESSION['usertype'] <> '1'))
{
	die('<script language="javascript">top.location.href="loginexit.php"</script>');
}

header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

$con = mysql_connect("localhost","root","");
mysql_select_db("qingzhou", $con);
mysql_query("set names gb2312 ");

$SQL = "UPDATE t_order0 SET isship ='1' where ordercode = '". $_GET['code'] ."'";
// echo $_SESSION['code0'];die();

// echo $SQL;die();

$RS0 = mysql_query($SQL, $con);

echo "fahuo³É¹¦";
sleep(1);

header("location: deliver.php");
?>