<?php include_once("../head_config/wap_head_config.php");?>
<?php include("../inc/conn.php");?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
body,html
{
margin: 0;
padding: 0;
width: 100%;
height: 100%;
font-size: 16px;
}

.more_link a:link
{
display: block;
text-decoration: none;
font-size: 14px;
color: #000;
}
.more_link a:visited
{
display: block;
text-decoration: none;
color: #000;
}
.more_link a:hover
{
display: block;
text-decoration: none;
color: #000;
}
.more_link a:active
{
display: block;
text-decoration: none;
color: #000;
}

ul,li
{
margin: 0;
padding: 0;
}

#map_canvas 
{
width: 100%;
height: 100%;

}
#attributeList li 
{
border-bottom: 1px dashed #999999;
padding: 5px 5px;
line-height: 20px;
}
</style>


<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>

<title>易咻网,让天下车主在身边就能享受妥帖、安全、优价的服务！</title>
</head>
<body onload="window.init()">

<div id="map_canvas" style="width: 100%;height: 100%;"></div>




<div style="position: fixed;line-height: 36px;width: 100%;left: 0;top: 0;background-color: #fff;">
<table width="100%" cellpadding="0" cellspacing="">
<tr>
<td style="color: #666;">
<img src="../svg/logo.svg" style="height: 18px;vertical-align: text-bottom;padding-left: 3px;padding-right: 3px;"/>为您提供<span style="color: #ff0000;" id="all_sj"></span>个商家
</td>




<td width="60" class="more_link">
<a href="index_sj_more.php" style="text-align: center;color: #000;font-weight: bold;">
点击更多
</a>
</td>




<td align="right" style="padding-right: 5px;" width="30px">
<a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2148fe24ea507b8e&redirect_uri=http://exiu.hk/wap/weixin_reg.php&response_type=code&scope=snsapi_userinfo&connect_redirect=1#wechat_redirect"><img src="../svg/huiyuan.svg" style="height: 24px;vertical-align: text-bottom;padding-left: 3px;"/></a>
</td>
</tr>
</table>

</div>


<div style="position: fixed;line-height: 36px;width: 100%;left: 0;bottom: 0;background-color: #000;">
sdfsdf





	<script type="text/javascript">
	//滚动插件
	(function($){
		$.fn.extend({
			Scroll:function(opt,callback){
					//参数初始化
					if(!opt) var opt={};
					var _this=this.eq(0).find("ul:first");
					var lineH=_this.find("li:first").height(), //获取行高
						line=opt.line?parseInt(opt.line,10):parseInt(this.height()/lineH,10), //每次滚动的行数，默认为一屏，即父容器高度
						speed=opt.speed?parseInt(opt.speed,10):500, //卷动速度，数值越大，速度越慢（毫秒）
						timer=opt.timer?parseInt(opt.timer,10):3000; //滚动的时间间隔（毫秒）
					if(line==0) line=1;
					var upHeight=0-line*lineH;
					//滚动函数
					scrollUp=function(){
							_this.animate({
									marginTop:upHeight
							},speed,function(){
									for(i=1;i<=line;i++){
											_this.find("li:first").appendTo(_this);
									}
									_this.css({marginTop:0});
							});
					}
					//鼠标事件绑定
					_this.hover(function(){
							clearInterval(timerID);
					},function(){
							timerID=setInterval("scrollUp()",timer);
					}).mouseout();
			}       
		});
	})(jQuery);
	
	$(document).ready(function(){
		$("#s2").Scroll({line:1,speed:500,timer:4000});
	});
	</script>

<style>
.scrollDiv{height:30px;/* 必要元素 */line-height:30px;overflow:hidden;color: #fff;font-size: 14px; /* 必要元素 */}
.scrollDiv li{height:30px;padding-left:2px;overflow: hidden;padding: 0;margin: 0;list-style: none;}
#s2{height:30px;}
</style>

<div style="background-color: #000;height: 36px;overflow: hidden;">
<table width="100%" cellpadding="0" cellspacing="0" style="line-height: 36px;height: 36px;">
<tr>
<td width="25" align="center">
<!--
<a style="color: #909090;text-decoration: none;" href="copy_gl_list.php?c_sjid=<?php echo $c_sjid?>">更多<img  src="../svg/r_arr.svg" style="height: 18px;vertical-align: text-bottom;"/></a>

<span style="color: #ff9900;font-size: 14px;">公告</span>--><img  src="../svg/news8.svg" style="height: 20px;vertical-align: middle;"/>
</td>
<td>
<div class="scrollDiv" id="s2">
<ul style="padding: 0;margin: 0;list-style: none;">
<?php
$tt_result=mysql_query("select * from sj_banner where category='首页' and money>0 order by c_money desc limit 5");
while($tt_row=mysql_fetch_array($tt_result))
{
?>
<li><a href="index_banner_content.php?bannerid=<?php echo $tt_row[0]?>&sjid=<?php echo $tt_row['sj_id']?>" style="text-decoration: none;color: #e9930e;padding-left: 3px;font-size: medium;display: block;"><?php echo $tt_row['title']?></a></li>
<?php
}
?>
</ul>
</div>
</td>

<?php if(isset($_SESSION[yh_id]))
{
?>  
<td width="70px">
<form id="sos_fm" name="sos_fm" method="get" action="index_yh_sos.php" style="padding: 0;margin: 0;">
<input type="hidden"  id="yh_x" name="yh_x"/>
<input type="hidden"  id="yh_y" name="yh_y"/>

<input type="submit" value="一键救援"  style="display: block;width: 70px;text-align: center;background-color: #cc0000;color: #fff;font-size: 12px;text-decoration: none;border-radius:5px 5px 5px 5px;border: none;height: 30px;"/>
</form>
</td>
<?php
}
?>
</tr>
</table>
</div>




</div>

</body>
</html>

<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp&libraries=convertor"></script>
<script type="text/javascript">


var anchor = new qq.maps.Point(16, 16),
size = new qq.maps.Size(30, 30),
origin = new qq.maps.Point(0, 0),
icon = new qq.maps.MarkerImage('../svg/center.png', size, origin, anchor);
        

var anchor_1 = new qq.maps.Point(16, 16),
size_1 = new qq.maps.Size(30, 30),
origin_1 = new qq.maps.Point(0, 0),
icon_1 = new qq.maps.MarkerImage('../svg/center2.png', size_1, origin_1, anchor_1);

window.onload = function(){
getLocation();









}


function getLocation(){
  //判断是否支持 获取本地位置
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{
    alert("不支持");
    
  }
  }
function showPosition(position)
  {
var lat=position.coords.latitude; 
var lng=position.coords.longitude;
//调用地图命名空间中的转换接口   type的可选值为 1:gps经纬度，2:搜狗经纬度，3:百度经纬度，4:mapbar经纬度，5:google经纬度，6:搜狗墨卡托
qq.maps.convertor.translate(new qq.maps.LatLng(lat,lng), 1, function(res){
  //取出经纬度并且赋值
latlng = res[0];
var map = new qq.maps.Map(document.getElementById("map_canvas"),{
center:  latlng,
zoom: 15
});
//设置marker标记
var marker = new qq.maps.Marker({
map : map,
position : latlng
});





    var infoWin = new qq.maps.InfoWindow({
        map: map
    });

    



/*

for(var i = 0;i < data.length; i++) 
{
(function(n){
var latlngs=new qq.maps.LatLng(data[i][0], data[i][1]);
var marker = new qq.maps.Marker({
position: latlngs,
map: map
});
qq.maps.event.addListener(marker, 'click', function() {
infoWin.open();
infoWin.setContent('<div style="text-align:center;white-space:'+
'nowrap;margin:10px;">这是第 ' +
n + ' 个标注</div>');
infoWin.setPosition(latlngs);
});
})(i);
}

*/
var cssC={color:"#005fbe",fontSize:"12px",fontWeight:"normal"};
var cssP={color:"#990000",fontSize:"12px",fontWeight:"normal"};


$.ajax({
type: "POST",
url: "ajax_index_distance.php",
data:{s_me_A:lat,s_me_B:lng},
success: function(data)
{
var data=JSON.parse(data); //解析成json对象
for(var i=0;i<data.length;i++)
{

    
(function(n){

var vv=data[i].company;
var kk=data[i].model;
var xx=data[i].id;
 
//alert(data[i].map_y);
    
var latlngs=new qq.maps.LatLng(data[i].map_y, data[i].map_x);

if(kk=='机动车')
{
var marker = new qq.maps.Marker({
icon: icon,
position: latlngs,
map: map
});

var label = new qq.maps.Label({
position: latlngs,
map: map,
offset: new qq.maps.Size(5,-20),
zIndex: 1000,
content:vv
});

label.setStyle(cssC);

}
else
{
var marker = new qq.maps.Marker({
icon: icon_1,
position: latlngs,
map: map
});  

var label = new qq.maps.Label({
position: latlngs,
map: map,
offset: new qq.maps.Size(5,-20),
zIndex: 1000,
content:vv
});
label.setStyle(cssP);

}



/*
qq.maps.event.addListener(marker, 'click', function() {
window.location.href="index_sj_content.php?sjid="+l;

infoWin.open();
infoWin.setContent('<div style="text-align:center;white-space:'+
'nowrap;margin:10px;">这是第 ' +
n + ' 个标注</div>');
infoWin.setPosition(latlngs);


});
*/

(function(x)
{
qq.maps.event.addListener(label,'click',function() {  
window.location.href="index_sj_content.php?sjid="+x;
}); //在图标实例上添加鼠标点击事件    
})(xx);


(function(l)
{
qq.maps.event.addListener(marker,'click',function() {  
window.location.href="index_sj_content.php?sjid="+l;
}); //在图标实例上添加鼠标点击事件    
})(xx);



})(i);






}

$("#all_sj").html(data.length);

}




});




});

}


</script>

<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx2148fe24ea507b8e","d76bbcb5fe6411c1fae6e84d70ef9247");
$signPackage = $jssdk->GetSignPackage();
$melink='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
$meimg='http://'.$_SERVER['HTTP_HOST']."/wap/logo.jpg";
$melink_f="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2148fe24ea507b8e&redirect_uri=http://exiu.hk/wap/weixin_yz.php&response_type=code&scope=snsapi_userinfo&connect_redirect=1#wechat_redirect";
?>
<script src="jweixin-1.0.0.js"></script>
<script>
wx.config({
    //debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: ['hideOptionMenu','showOptionMenu','hideMenuItems','showMenuItems','chooseImage','onMenuShareAppMessage'
      // 所有要调用的 API 都要加到这个列表中
      ]
});

function onBridgeReady()
{
wx.hideMenuItems({
menuList:[
        'menuItem:openWithQQBrowser', // 在QQ浏览器中打开
        'menuItem:openWithSafari', // 在Safari中打开
        'menuItem:profile',
        'menuItem:addContact',
        'menuItem:copyUrl' //复制链接
        ]
});
}
wx.ready(function(){


wx.showOptionMenu();
onBridgeReady();
wx.onMenuShareAppMessage({
title: '易咻网', // 分享标题
desc: '让天下车主在身边就能享受妥帖、安全、优价的服务！', // 分享描述
link: '<?php echo $melink_f?>', // 分享链接
imgUrl: '<?php echo $meimg?>', // 分享图标
type: '', // 分享类型,music、video或link，不填默认为link
dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
success: function () 
{ 
// 用户确认分享后执行的回调函数

},
cancel: function () 
{ 
// 用户取消分享后执行的回调函数
}
});



wx.onMenuShareTimeline({
title: '易咻网', // 分享标题
link: '<?php echo $melink?>', // 分享链接
imgUrl: '<?php echo $meimg?>', // 分享图标
success: function () { 

},
cancel: function () 
{ 
// 用户取消分享后执行的回调函数
}
});
});




   
</script>
<?php
include_once("../inc_cap/cap_ip.php");
$bot_sou='首页';
$bot_category='首页';
$bot_content='首页';
$yh_id=0;
if(isset($_SESSION['yh_id']))
{
$yh_id=$_SESSION['yh_id'];    
}
add_sou($bot_sou,$bot_category,$bot_content,'0','0',$yh_id);
?>
21313123123123
中文


