<?php
session_start();
if (($_SESSION['userid'] == '') || ($_SESSION['usertype'] <> '0')) 
{
	die('<script language="javascript">top.location.href="loginexit.php"</script>');
}

header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

// $_SESSION['code0']='';

// $code0 = $_GET['code'] ;
if($_GET['code'] != '')
{
    $_SESSION['code0']=$_GET['code'];
}
else
{
    $_SESSION['code0']=$_SESSION['code'];
}
// echo $code0;die();

// $con = mysql_connect("localhost","root","sql");
// mysql_select_db("qingzhou", $con);
// mysql_query("set names gb2312 ");

// $productname = $_POST['productname'];

// $SQL = "UPDATE t_order0 SET ispay = '1' WHERE ordercode = '". $_GET['code'] ."' AND userid='". $_SESSION['userid'] ."'";
// // echo $SQL;die();

// $RS0 = mysql_query($SQL, $con);

// header("location: orderlist.php");
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>用户注册</title>
</head>

<body>
	
<form action="beginpay0.php" name=form1 method=post>
<p>请扫描下方二维码进行付款</p><br>
<p><input type=submit id=submit1 value='付款'></p><br>
<p><img src="money.jpg" width=250px height=250px ></p><br>

</form>
</body>

</html>