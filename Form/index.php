<?php
if (isset($_POST['sub'])) {
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh" lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <title>用户登录</title>
</head>
<body>
<?php
require 'form.php';
$form = new form($_SERVER['PHP_SELF']);   //提交到本页
$items = [];
#$form->layout=false;                   //不使用表格布局，大家可以把这句注释掉看结果有何不同
#form_text($name,$id,$label_name,$label_for,$value=""){
$items[] = $form->form_text('username', '', '用户名', 'username');
#form_passwd($name,$id,$label_name,$label_for,$value=""){
$items[] = $form->form_passwd('password', '', '密码', 'password');
#form_hidden($name,$id,$label_name,$label_for,$value="")
$items[] = $form->form_hidden('hiddentest', '', 'hiddenname', 'hiddentest', 'sssss');
#form_file($name,$id,$label_name,$label_for,$size=""){
$items[] = $form->form_file('filetest', '', 'filetestname', 'filetest', 2048);
#form_checkbox($name,$label=array(),$label_name,$label_for="")
$items[] = $form->form_checkbox('checkboxt', ['ok' => 1, 'no' => 2], 'checkboxname', 'checkboxt');
#form_radio($name,$label=array(),$label_name,$label_for="")
$items[] = $form->form_radio('radiot', ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4], 'radioname', 'radiot');
#form_select($id,$name,$options=array(),$selected=false,$label_name,$label_for,$onchange="")
$items[] = $form->form_select('', 'sel', ['bh', 'vf', 'fd'], false, 'xuan', 'sel', '');
#form_selectmul($id,$name,$size,$options=array(),$label_name,$label_for)
$items[] = $form->form_selectmul('', 'selm', 3, ['ds', 'fgd', 'fdd'], 'duoxuan', 'selm');
#form_textarea($id,$name,$cols,$rows,$label_name,$label_for,$value="")
$items[] = $form->form_textarea('', 'texta', 10, 5, 'wenbenyu', 'texta', '');
#form_button($id,$name,$type,$value,$onclick="")
$items[] = $form->form_button('', 'sub', 'submit', '登录');
$form->CreateForm($items);
?>
</body>
</html>
