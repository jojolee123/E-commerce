<?php

session_start();

header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("qingzhou", $con);
mysql_query("set names gb2312 ");//图像可以上传文件



$sql="INSERT INTO t_product (productcode, productname, sellercode,price,productimage,stocknumber)
VALUES
('$_POST[productcode]','$_POST[productname]','".$_SESSION['userid']."','$_POST[price]','$_POST[productimage]','$_POST[stocknumber]')";

header("location: addproduct.htm");

if (strlen('$_POST[productcode]') == 0)
  {
  echo "商品号不能为空";
  mysql_close($con);

  }

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con)
?>