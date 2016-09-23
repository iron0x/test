<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh" lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <title>用户登录</title>
</head>
<body>
<?php
require_once("form.php");
$form=new form($_SERVER['PHP_SELF']);   //提交到本页
#$form->layout=false;                   //不使用表格布局，大家可以把这句注释掉看结果有何不同
$name=$form->form_text("userid","userid","用户名","userid");
$passwd=$form->form_passwd("passwd","passwd","密码","passwd");
$submit=$form->form_button("","submit","submit","登录");
$form_item=array($name,$passwd,$submit);
$form->CreateForm($form_item);
?>
</body>
</html>
