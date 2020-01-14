# E-commerce
A simple dynamic web design
一 前言
   使用XAMPP集成软件包和navicat数据库软件
   编程和数据库均使用字符集为”gb2312”
二 组成部分
   用户登录，用户注册，商家添加商品，商家发货，买家修改信息，买家购买商品，买家查询历史订单，买家付款，买家删除订单，搜索商品
三 数据库设计
   1 php_admin
   此表用来保存卖家和买家的信息，其中userid为主键
   用户账号userid，用户名username，用户密码password，用户类型usertype，用户电话usermobile，用户邮箱useremail
   2 t_order0
   此表用来保存订单的信息，订单号为主键，订单价格表示总的价格，ispay为0则未付款，为1则已付款，isship为0则未发货，为1则已发货
   订单号orderid，订单编号ordercode，用户账号userid，地址address，订单价格orderprice，是否支付ispay，是否发货isship，是否删除isdelete
   3、t_orderdetail
   此表用来保存一个订单中包含了多种商品的商品信息，由orderid 和productcode共同决定，其中的price表示这个商品的单价
   根订单号orderid，商品号productcode，商品价格price，购买数量purchasenumber，商品图片productimage
   4、t_product
   此表用来保存每个商品的信息，主键是商品号
   商品号productcode，商品名productname，卖家号sellercode，商品价格price，商品图片productimage，库存量stocknumber

   

