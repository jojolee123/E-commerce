
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

$productname = $_POST['productname'];                    //搜索商品
$SQL = "select * from t_product where productname like '%". $productname ."%'";

//echo $sql1; die();
$RS0 = mysql_query($SQL, $con);
//echo $RS0
//print_r(mysql_fetch_array($RS0));
?>

<HTML>
<HEAD>
<style type="text/css">
<!--
font{font-family: "宋体";font-size:9pt}
.font1{font-family: "宋体";font-size:14.3px}
td{font-family: "宋体";font-size:9pt}
a{text-decoration:none}
-->
</style>

<script language=javascript>
	function addorder()                                            //生成订单，提取数据
	{
        var r = /^\+?[1-9][0-9]*$/;　　         //检查是否为整数
        var checkboxes = document.getElementsByName("checkbox1");   //选中的商品种类数量elementsssssssss
        var texts = document.getElementsByName("text1");            //各种商品的采购数量汇总
        var str = []; 
        for(i=0;i<checkboxes.length;i++){            //第一个被选中的循环
            if(checkboxes[i].checked){ 
                str.push(checkboxes[i].value);          //商品编码
                if (texts[i].value=="" || !(r.test(texts[i].value))) { alert('请输入购买数量'); return false; }
                str.push(texts[i].value);       //购买数量
            } 
         } 
         document.getElementById("checkedproduct").value = str;   //str的值为1，20，2，10买了10华为20苹果
         if((""==str)){

             alert('请选择商品添加订单'); return false; 
         }else{
             document.form1.action = 'addorder0.php';
             document.form1.submit();
         }	}
</script>
</HEAD>
<TITLE>用户管理示例（教学用）</TITLE>

<BODY>
<form id=form1 name=form1 method=post>
搜索商品：<input type=text name=productname>
<input type=submit value=搜索>
配送地址：<input type=text name=address>
<input align=left type=button value=生成订单 onclick="return addorder();">
<input type=hidden id=checkedproduct name=checkedproduct>
</form>
<p></p>
<center>
<table  ID="SrhTable" border=0 width=100% cellpadding=0 cellspacing=1>
<tr>
<td></td>
<td>商品编码</td>
<td>商品名称</td>
<td>商品价格</td>
<td>商品库存</td>
<td>采购数量</td>
<td>商品图片</td>
</tr>

<?php
while($RS = mysql_fetch_array($RS0))
{
?>
<tr>
<td><input type=checkbox id="checkbox1" name="checkbox1" 
	value="<?php echo strval($RS["productcode"])?>"></td>
<td><?php echo strval($RS["productcode"])?></td>
<td><?php echo strval($RS["productname"])?></td>
<td><?php echo strval($RS["price"])?></td>
<td><?php echo strval($RS["stocknumber"])?></td>
<td><input type=text id="text1" name="text1"></td>
<td><?php echo "<img src=" . strval($RS["productimage"]).">"?></td></tr>

<?php 
}
mysql_close($con);
$RS=NULL;
$Con =NULL;
?>

</table>

</html>
