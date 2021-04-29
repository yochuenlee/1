var $=function(node){
return document.getElementById(node);
}
function $(objId){
return document.getElementById(objId);
}
document.onkeydown = function(e){
if(!e) e = window.event;
if((e.keyCode || e.which) == 13){
startRequest(0); return false;
}
}
function inst() {
//if ($("name")!=null) $("name").value = $("tishi1").innerHTML;
}

function st(ids,Num){
if ($(ids).value == $("tishi"+Num).innerHTML){
$(ids).value = "";
}
}

//过滤文本左右两端的空格
function GetRequest(Url,GetFunction){
if(window.ActiveXObject){
var xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
}else{
var xmlHttpRequest = new XMLHttpRequest();
}
xmlHttpRequest.onreadystatechange = function(){
if(xmlHttpRequest.readyState == 4){
if(xmlHttpRequest.status == 200){
GetFunction(xmlHttpRequest.responseText);
}else{
GetFunction(404);
}
}else{
GetFunction("<h3>查询中...</h3>");
}
}
var Url = Url.replace(/\+/g, "%2B"); 
xmlHttpRequest.open("post",'?'+Url,true);
xmlHttpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlHttpRequest.send(Url);
}

function startRequest(Num,Pag) {
var queryString;
if(Num == 2 || Num == 0){
if($("name").value == $("tishi1").innerHTML){
$("name").value = $("tishi1").innerHTML;
$('11').style.borderColor='red';
return false;
}else{
if($("name").value == ""){
$('11').style.borderColor='red';
return false;
}else{
$('11').style.borderColor='green';
SendUrl = "Act="+ $("time").value +"&doma="+ $("name").value +"&Page="+ Pag +"&T="+Math.random();
GetRequest(SendUrl,function(GetText){
if(GetText == 404){
$('11').style.borderColor='red';
$('jieguo').innerHTML='<span><b>提示：</b>查询失败。</span>';
}else if(GetText == 0){
$('11').style.borderColor='red';
$('jieguo').innerHTML='<span><b>提示：</b>载入中，请稍后。</span>';
return false;
}else{
$('11').style.borderColor='green';
$('jieguo').innerHTML=GetText;
}
});
return false;
}
}
}
return false;
}