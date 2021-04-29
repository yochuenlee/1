<?php 
//无需修改本页任何内容，除非你十分了解并足够把握
if($isoso=="1"){ $sjian="onBlur";}else{ $sjian="onKeyup";}
function webalert($Key){
 $html="<script>\r\n";
 $html.="alert('".$Key."');\r\n";
 $html.="history.go(-1);\r\n";
 $html.="</script>";
 exit($html);
}
function webtable($Key){
 $html.="<table cellspacing=\"0\">\r\n";
 $html.='<tbody><tr>';
 $html.="<td data-label=\"查询提示\">$Key</td>";
 $html.='</tr></tbody>';
 $html.="</table>";
 exit($html);
}

//是否显示
function isshow($key1s, $key){
 global $isoso; 
 $isese="X".$isoso;
switch ($isese){
case "X0": //模糊包含
if(stristr($key, $key1s)){ return "y"; }else{ return "n";}
case "X1": //精准等于
if($key==$key1s){ return "y"; }else{ return "n";}
default:
 if(stristr($key, $key1s)){ return "y"; }else{ return "n";}
}
 return "?";
}
//读取指定行
function getline($filename, $line){
  $n = 0;
  $handle = fopen($filename,'r');
  if ($handle) {
    while (!feof($handle)) {
        $n++;
        $out = fgets($handle, 4096);
        if($line==$n) break;
    }
    fclose($handle);
  }
  if($line==$n) return $out;
  return false;
}
//显示条件在查询选项下拉
function seoline($txt){  
 global $tiaojians;
 $lists = ""; $li=0;
 if(!stristr(Trim($txt),"\t")){
  return "<option value=\"\">无效首行</option>\r\n";
 }
 $list1 =  explode("\t",$txt);
foreach($list1 as $lista){
 if(strlen($lista)>0 && stristr($tiaojians,"-{$lista}-")){
  $lists .= "<option value=\"{$li}\">$lista</option>\r\n";
 }
 $li++;
}
 $wuy= "<option value=\"\">无效条件</option>\r\n";
 if($lists==""){ return $wuy; }else{ return $lists;}
}
//标题行显示控制
function showtimu($txt,$tps,$han,$tima){  
 global $isoso,$mtext,$ishide,$isurls,$isimgs;
 if(!stristr(Trim($txt),"\t")){
  return '<tbody><tr><td data-label=\"查询提示\">无效数据行</td></tr></tbody>';
 }
 $list1 = explode("\t",$txt); 
 $jj=0;  $timas = explode("\t",$tima); 
 if($tps=="y"){$lists="<tr>";}else{$lists="<thead><tr class=\"tt\">";}  
foreach($list1 as $lista){
  $lista=Trim($lista); $timus=$timas[$jj];$jj++; 
  if(strlen($lista)<9){
$listb="<nobr>&nbsp;$lista</nobr>";  //4字不换行
  }else{
$listb="".$lista;  
  }
  $lists .=  "<td data-label=\"$timus\">$listb</td>\r\n";
}
 if($tps=="y"){$lists.="</tr>\r\n";}else{$lists.="</tr>\r\n</thead>";} 
  return $lists;
}
//显示符合结果都内容
function sooline($filename, $lie, $key, $pages){
  global $mpage;
  $n = 0; $m=0; $pe=$pages*$mpage; $ps=$pages*$mpage-$mpage;
  $handle = fopen($filename,'r');
  if ($handle) {
    while (!feof($handle)) {
        $n++;
        $out = fgets($handle, 4096);
if($n==1){
 $tima = $out;
 $tips = showtimu($out,"0",$n);
}elseif($n==2){
$tips .= "<tbody>";
}else{
if(stristr(Trim($out),"\t")){
 $lista =  explode("\t",$out);
 $cc=count($lista);
if(is_numeric($lie)){
 $key1s = $lista[$lie];
}else{
 $lia =  explode("-",$lie);
 $key1s = "";
foreach($lia as $lic){
 if(strlen($lic)>0 && $lic<$cc){
$key1s .= $lista[$lic];
 }
}
}
 if(isshow($key, $key1s)=="y"){
 $m++;
 if($m>$ps && $m<=$pe){ 
$tips .= showtimu($out,"y", $n, $tima);
 }
 }
}
$tips .= "</tbody>";
}
    }
    fclose($handle);
  }

if($m>$mpage){
  $pgs=round($m/$mpage); $tips.="<tfoot><tr><td colspan=\"{$cc}\" data-label=\"分页信息\">共<b>{$pgs}</b>页<b>{$m}</b>条结果 ";
  $tips.="<!--共{$pgs}页--></td></tr></tfoot>";
}
if($m<1){$tips.="<tbody><tr><td colspan=\"{$cc}\" data-label=\"查询提示\">未查询到{$key}的相关结果</td></tr></tbody>";}
return $tips;
}




/**
 * chalide_free_20201105_222628_7e9b50b6e3a3fb09a2339d28605e4776.zip
 * Created by chalide.cn 20201105_222628
 * @author yujianyue<admin@ewuyi.net> 
 * @tels 15058593138(同微信号) 
 * 版权约束：保留署名权和发行权 不得转售 或 将源码直接发布到公开渠道 
 * 问题反馈：15058593138 同微信号 沟通请提供版本号[ chalide_free_20201105_222628_7e9b50b6e3a3fb09a2339d28605e4776.zip ]
 * 帮助：源码自带说明书，详见压缩包内*.html/*.txt文件(都不建议删除)。
 * 保留：原始数据也请保留；供以后规律参考(比如看前几行都是什么)。
 * 技巧：原始版本能用而你修改后不能用，说明是你操作问题(建议保留原始版本)。
 */
 ?>