
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

$productname = $_POST['productname'];                    //������Ʒ
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
font{font-family: "����";font-size:9pt}
.font1{font-family: "����";font-size:14.3px}
td{font-family: "����";font-size:9pt}
a{text-decoration:none}
-->
</style>

<script language=javascript>
	function addorder()                                            //���ɶ�������ȡ����
	{
        var r = /^\+?[1-9][0-9]*$/;����         //����Ƿ�Ϊ����
        var checkboxes = document.getElementsByName("checkbox1");   //ѡ�е���Ʒ��������elementsssssssss
        var texts = document.getElementsByName("text1");            //������Ʒ�Ĳɹ���������
        var str = []; 
        for(i=0;i<checkboxes.length;i++){            //��һ����ѡ�е�ѭ��
            if(checkboxes[i].checked){ 
                str.push(checkboxes[i].value);          //��Ʒ����
                if (texts[i].value=="" || !(r.test(texts[i].value))) { alert('�����빺������'); return false; }
                str.push(texts[i].value);       //��������
            } 
         } 
         document.getElementById("checkedproduct").value = str;   //str��ֵΪ1��20��2��10����10��Ϊ20ƻ��
         if((""==str)){

             alert('��ѡ����Ʒ��Ӷ���'); return false; 
         }else{
             document.form1.action = 'addorder0.php';
             document.form1.submit();
         }	}
</script>
</HEAD>
<TITLE>�û�����ʾ������ѧ�ã�</TITLE>

<BODY>
<form id=form1 name=form1 method=post>
������Ʒ��<input type=text name=productname>
<input type=submit value=����>
���͵�ַ��<input type=text name=address>
<input align=left type=button value=���ɶ��� onclick="return addorder();">
<input type=hidden id=checkedproduct name=checkedproduct>
</form>
<p></p>
<center>
<table  ID="SrhTable" border=0 width=100% cellpadding=0 cellspacing=1>
<tr>
<td></td>
<td>��Ʒ����</td>
<td>��Ʒ����</td>
<td>��Ʒ�۸�</td>
<td>��Ʒ���</td>
<td>�ɹ�����</td>
<td>��ƷͼƬ</td>
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
