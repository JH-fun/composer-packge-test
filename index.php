<?php

//Zjmainstay超强版本
//动态开启错误提示

ini_set('display_errors','on');
error_reporting(E_ALL);

//默认长度和类型
$length = '32';
$type = 'number-lower-upper';

if(!empty($_POST)) {
function getPassword($type = 'number-lower-upper', $customStr = '', $length = 32) {
$strArr = array(
'number' => '0123456789',
'lower' => 'abcdefghijklmnopqrstuvwxyz',
'upper' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
'special' => '~!@#$%^&amp;*()_+{}|[]\-=:<>?/',
);

if($type == 'all') { //全部
$str = implode('', $strArr);
} else if($type == 'custom') { //自定义类型
if(empty($customStr)) { //未填写自定义类型，则默认为数字+大小写字母
$type = 'number-lower-upper';
} else {
$str = $customStr;
}
}

//custom 没带自定义类型 或 其他类型
if(empty($str)) {
$typeParts = explode('-', $type);
$str = '';
foreach($typeParts as $part) {
$str .= $strArr[$part];
}
}

$maxLength = 32;
$length = empty($length) ? $maxLength : min((int)$length, $maxLength);
if(empty($length)) {
$length = $maxLength;
}

$randStr = str_shuffle($str);
if(strlen($randStr) < $length) { //随机字符长度不够密码长度，循环生成
$passwordStr = '';
do {
$passwordLength = strlen($passwordStr);
$passwordStr .= substr($randStr, 0, $length-$passwordLength); //如果
$passwordLength = strlen($passwordStr);
} while($passwordLength < $length);

} else {
$passwordStr = substr($randStr, 0, $length);
}

return $passwordStr;
}

$password = getPassword($_POST['type'], $_POST['customType'], $_POST['length']);
$length = empty($_POST['length']) ? $length : $_POST['length'];
$type = empty($_POST['type']) ? $type : $_POST['type'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>密码生成器</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-CN" />
<script type="text/javascript" src="http://zjmainstay.cn/jquerylib/jquery-1.8.2.min.js"></script>
</head>
<body>
<style type="text/css">
* {
margin: 5px;
}
</style>
<form action="<?php echo $_SERVER['SCRIPT_NAME']?>" method="POST">
<div>
<label>长度：</label>
<input type="text" name="length" value="<?php echo $length ?>" style="width: 100px;" placeholder="长度为0-32"/>
</div>
<div>
<label>类型：</label>
<select name="type" style="width: 150px;" id="type">
<option value="number">纯数字</option>
<option value="lower">小写字母</option>
<option value="upper">大写字母</option>
<option value="lower-upper">大小写字母</option>
<option value="number-lower">数字+小写字母</option>
<option value="number-upper">数字+大写字母</option>
<option value="number-lower-upper">数字+大小写字母</option>
<option value="special">特殊字符</option>
<option value="number-special">数字+特殊字符</option>
<option value="lower-special">小写字母+特殊字符</option>
<option value="upper-special">大写字母+特殊字符</option>
<option value="all">全部</option>
<option value="custom">自定义</option>
</select>
<input name="customType" type="text" style="display:none;" size="50" value="<?php echo @$_POST['customType'] ?>"/>
</div>
<div>
<input type="submit" value="生成"/>

<?php if(!empty($password)) { ?>
<input type="text" id="password" readOnly="true" value="<?php echo $password ?>" size="50"/><span class="tips"></span>
<?php } ?>
</div>
</form>
<script type="text/javascript">
$(document).ready(function(){
//初始化默认选择数字+大小写字母
$("#type").get(0).selectedIndex = $("#type option").index($("#type option[value=<?php echo $type ?>]"));
if($("#type").val() == 'custom') {
$("input[name=customType]").show();
}

$("#type").change(function() {
if($(this).val() == 'custom') {
$("input[name=customType]").show();
} else {
$("input[name=customType]").hide();
}
});
$("#password").click(function() {
$(this).select();
$(".tips").html("请使用 Ctrl + C 复制");
});
});
</script>
</body>
</html>


<?php
//$j=1;
//$step=9999/363;
//echo $j."    "."1"."<br/>";
//for($i=1;$i<9999;$i=$i+$step){
//    $j++;
//    echo$j."    ";
//    echo floor(rand($i, $i+$step))."<br/>";
//}
//$j++;
//    echo $j."    "."9999"."<br/>";

//$str = 'asdas gggg eewxxf ddeerrd.';
//for ($i = 0; $i < strlen($str); $i++) {
//    if ($i < strlen($str) - 1) {
//        if (('A' <= $str[$i] && $str[$i] < 'Z') || ('a' < $str[$i] && $str[$i] < 'z')) {
//            
//        } else {
//            $str[$i - 1] = strtoupper($str[$i - 1]);
//        }
//    } elseif ($i = strlen($str) - 1) {
//        if (('A' < $str[$i] && $str[$i] < 'Z') || ('a' < $str[$i] && $str[$i] < 'z')) {
//            $str[$i] = strtoupper($str[$i]);
//        } else {
//            $str[$i - 1] = strtoupper($str[$i - 1]);
//        }
//    }
//}
//var_dump($str);
//$str=  str_replace(".", " ", $str);
//var_dump($str);
//$temp = explode(' ', $str);
//var_dump($temp);
?>