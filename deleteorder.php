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

$SQL = "DELETE FROM t_order0 WHERE ordercode= '". $_GET['code'] ."' AND ispay = '0'";
// echo $_SESSION['code0'];die();

// echo $SQL;die();

$RS0 = mysql_query($SQL, $con);
$SQL1 = "DELETE FROM t_orderdetail WHERE orderid in  (select orderid from t_order0 where ordercode= '". $_GET['code'] ."' AND ispay = '0' )";
$RS1 = mysql_query($SQL1, $con);
echo "删除成功";
sleep(1);

header("location: orderlist.php");
?>
