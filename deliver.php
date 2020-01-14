
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
mysql_query("set names gb2312");


echo  $_SESSION['userid'];
$SQL = "SELECT orderprice,address,ordercode ,(case isship when '0' then CONCAT('<a  href=http://localhost/dashboard/deliver0.php?code=', ordercode ,'>已付款等待发货)</a>') when '1' then '已发货' end) as isship from t_order0 WHERE ispay='1' and orderid in (select orderid from t_orderdetail WHERE  productcode in (select productcode from t_product WHERE sellercode = '".$_SESSION['userid']."'))" ;
//echo $SQL; die();
$RS0 = mysql_query($SQL, $con);
//print_r(mysql_fetch_array($RS0));
?>

<HTML>
<HEAD>


<script language=javascript>
	function beginpay()
	{
		/*
             document.form1.action = 'beginpay.php';
             document.form1.submit();
    */
 }
</script>
</HEAD>
<TITLE>商家管理</TITLE>

<BODY>

<p></p>
<center>
<table ID="SrhTable" border=1 width=100% cellpadding=0 cellspacing=1 align=center width=80%>
<tr>


<td>订单编号</td>
<td>地址</td>
<td>订单价格</td>
<td>点击发货</td>
</tr>

<?php
while($RS = mysql_fetch_array($RS0))
{

?>
<tr>
<td ><?php echo strval($RS["ordercode"])?></td>
<td ><?php echo strval($RS["address"])?></td>
<td ><?php echo strval($RS["orderprice"])?></td>
<td ><?php echo strval($RS["isship"])?></td>
<?php
echo "</tr>\n";

?>
<?php
}
mysql_close($con);
$RS=NULL;
$Con =NULL;
?>
</table>

</HTML>
