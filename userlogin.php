<?php

header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

session_start();      //定义SESSION变量
$_SESSION['userid']='';
$_SESSION['usertype']='';

$userid = $_POST['userid'];
$password = $_POST['password'];

//$_SESSION['userid']=$_POST['userid'];

$con = mysql_connect("localhost","root","");
mysql_select_db("qingzhou", $con);
mysql_query("set names gb2312 ");

$sql1 = "select userid,usertype from php_admin where userid='".$userid."' and password='".$password."'";
//echo $sql1; die();
$RS0 = mysql_query($sql1, $con);
if (mysql_affected_rows($con)>0)
{
	$RS = mysql_fetch_array($RS0);
	$_SESSION['userid'] = $RS['userid'];
	$_SESSION['usertype'] = $RS['usertype'];

	if($RS['usertype']=='0')
    {
    header("location: main.php");
    }
    else
    {
    header("location: addproduct.htm");
    }
}  
else
{
	header("location: userlogin.htm"); //重新定位网页
}

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