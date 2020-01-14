<?php
header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

session_start();
$_SESSION['userid']='';
$_SESSION['username']='';
$_SESSION['usermobile']='';
$_SESSION['useremail']='';
$_SESSION['password']='';
$_SESSION['usertype']='';

$userid = $_POST["userid"];
$username = $_POST["username"];
$password = $_POST["usermobile"];
$usertype = $_POST["useremail"];
$password = $_POST["password"];
$usertype = $_POST["usertype"];

$con = mysql_connect("localhost","root","");
mysql_select_db("qingzhou", $con);
mysql_query("set names gb2312 ");

$sql = "insert into php_admin(userid, username,usermobile,useremail, password,usertype) values('".$userid."','".$username."','".$usermobile."','".$useremail."','".$password."','".$usertype."')";

header("location: userlogin.htm");

mysql_query($sql);
// echo $sql; die();

$sql1 = "select * from php_admin where userid='".$userid."'";
//echo $sql1; die();
$RS0 = mysql_query($sql1);
?>

<table>

<?php
while($RS = mysql_fetch_array($RS0))
{
?>
<tr><td><?php echo strval($RS["userid"])?></td>
<td><?php echo strval($RS["username"])?></td>
<td><?php echo strval($RS["password"])?></td></tr>

<?php
}
mysql_close($con);
$RS=NULL;
$Conn =NULL;
?>

</table>


</html>
