<?php

header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

session_start();      //定义SESSION变量


$con = mysql_connect("localhost","root","");
mysql_select_db("qingzhou", $con);
mysql_query("set names gb2312 ");


if ($_POST[password]!='')
{
$sql1 = "UPDATE php_admin SET password = '$_POST[password]' WHERE userid = '".$_SESSION['userid']."'";
$RS0 = mysql_query($sql1, $con);
//echo $sql1;die();
}
if($_POST[username]!='')
{
$sql1 = "UPDATE php_admin SET username = '$_POST[username]' WHERE userid = '".$_SESSION['userid']."'";
$RS0 = mysql_query($sql1, $con);
//echo $sql1;die();
}
if($_POST[usermobile]!='')
{
$sql1 = "UPDATE php_admin SET usermobile = '$_POST[usermobile]' WHERE userid = '".$_SESSION['userid']."'";
$RS0 = mysql_query($sql1, $con);
//echo $sql1;die();
}
if($_POST[useremail]!='')
{
$sql1 = "UPDATE php_admin SET useremail = '$_POST[useremail]' WHERE userid = '".$_SESSION['userid']."'";
//echo $sql1;die();
$RS0 = mysql_query($sql1, $con);
}

header("location: selectproduct0.php"); //重新定位网页
//mysql_query("UPDATE php_admin SET password = '$_POST[password]' WHERE userid = '$_SESSION['userid']'");


?>

<html>
<body>

<?php
//retrieve session data
mysql_close($con);
$RS=NULL;
$con =NULL;
?>

</body>
</html>