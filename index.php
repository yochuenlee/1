<?php include "inc/conn.php";?><?php include "inc/pubs.php";?>
<?php 
$stime=microtime(true); 

$getal = trim($_POST['doma']);
$typer = Trim($_POST['Act']);
$pages = Trim($_POST['Page']);
$datadir = "./{$dbfold}/{$dbfile}.xls.php";
if(strlen($getal)>0 && strlen($typer)>0){
 if (!file_exists($datadir)){
  exit("<h3>数据库不存在!</h3>\r\n");
 }
  $linebiao = getline($datadir, "1");
  $tiaojian1 = explode("\t",$linebiao);
  $tiaojiane = count($tiaojian1);
  if($typer=="a"){
$typer = "-"; $li=0;
foreach($tiaojian1 as $lista){
 if(strlen($lista)>0 && stristr($tiaojians,"-{$lista}-")){
$typer .= "{$li}-";
 }
 $li++;
}
 if($typer=="-"){
  exit("<h3>无效(a)查询条件!</h3>\r\n");
 }
  }else{
 if($tiaojiane<$typer){
  exit("<h3>无效(1)查询条件!</h3>\r\n");
 }
  $tiaojian2 = $tiaojian1[$typer];
 if(!$tiaojian2){
  exit("<h3>无效(2)查询条件!</h3>\r\n");
 }
 if(!stristr($tiaojians,"--{$tiaojian2}--")){
  exit("<h3>无效(3)查询条件!</h3>\r\n");
 }
 }
 if(!$pages || $pages==""){ $pages=1; }
 if(!is_numeric($pages)){ $pages=1; }
  
 $datar=date("Ymd-His");
 //Header("Content-type: application/octet-stream"); 
 //Header("Accept-Ranges: bytes"); 
 //header("Content-Disposition: attachment; filename={$datar}.xlsx"); 
 echo "<div style=\"margin:0 auto;overflow-x:auto;width:99.5%;max-width:1188px;\">";
 echo "<table cellspacing=\"0\">";
 echo sooline($datadir, $typer, $getal, $pages);
 echo "</table></div>";

exit();
}

?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes" />

<!--  php+Txt网页版通用快速搜索系统 20201105_222628  -->
<title><?php echo $title;?>，查立得</title>
<!-- 请保留以下信息:不显示的-->
<meta name="author" content="yujianyue, admin@ewuyi.net">
<meta name="copyright" content="www.12391.net">
<!-- 请保留以上信息:不显示的-->
<link href="inc/css/style.css?t=<?php echo $dtime;?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="inc/js/js.js?t=V<?php echo $dtime;?>"></script>
</head>
<body onLoad="inst();">
<div class="html">
<div class="divs" id="divs">
<div id="head" class="head">
<?php echo $title;?>
</div>
<div class="main" id="main">
<form name="m" method="POST" action="#" >
<div class="so_box" id="11">
<input name="name" type="text" class="txts" id="name" value="请输入<?php echo $tiaojian1;?>" placeholder="请输入<?php echo $tiaojian1;?>" onFocus="st('name',1)" autocomplete="off" <?php echo $sjian;?>="startRequest(2,1)" />
<div class="more" id="clearkey">
<select name="time" id="time" class="time" onChange="startRequest(2,1)">
<?php
 if (!file_exists($datadir)){
  echo "<option value=\"\">无数据库</option>\r\n";
 }else{
  $linebiao = getline($datadir, "1");
  echo seoline($linebiao);
  if(strlen($issall)>1) echo "<option value=\"a\" selected>关键词</option>\r\n";
 } 
?>
</select>
</div>
<div class="more so_but" id="clearkey" onClick="startRequest(2,1)">
<input type="button" name="button" class="buts" id="sub" value="查 询" />
</div>
</div>
<div class="so_bus" id="jieguo">
<!---你的其他说明在这里添加：开始-->
<?php
if(!file_exists($dedesc)){
echo "<!-- $dedesc 不存在 -->\r\n";
}else{
echo file_get_contents($dedesc)."\r\n";
}
?>
<!--你的其他说明在这里添加：结束-->
</div>
<div id="tishi1" style="display:none;">请输入<?php echo $tiaojian1;?></div>
</form>
<div class="none" id="ACE"><?php echo $keys;?></div>
<div class="none" id="ADR"><?php echo $title;?></div>
<div class="so_bus none" id="ADE" >提示:各选项的查询结果不同。</div>
</div>
<div class="boto" id="boto">
&copy;<?php echo date('Y');?>&nbsp; 查立得 & <a href="<?php echo $copyu;?>" target="_blank"><?php echo $copyr;?></a>
</div>
</div>
</div>

<!--  技术支持请提供 chalide_free_20201105_222628_7e9b50b6e3a3fb09a2339d28605e4776.zip  -->
</body>

<!--
  问题反馈：15058593138(同微信号)  
-->
</html>