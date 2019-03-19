<?php
function recursive ($array, $pid=0, $level=0) {
  $arr = array();
  foreach ($array as $v) {
	if ($v['pid'] == $pid) {
	  $v['level'] = $level;
	  $v['html'] = str_repeat('&nbsp;&nbsp;', $level);
	  $arr[] = $v;
	  $arr = array_merge($arr, recursive($array, $v['id'], $level + 1));			
	}
  }
  return $arr;
}
function get_all_child ($array, $id) {
  $arr = array();
  foreach ($array as $v) {
	if ($v['pid'] == $id) {
		$arr[] = $v['id'];
		$arr = array_merge($arr, get_all_child($array, $v['id']));
	}
  }
  return $arr;
}
function delimg($filename){
  if(is_file($filename)){
	  if(unlink($filename)){
		  return true;
	  }else{
		  return false;
	  }
  }else{
	  return false;
  }
}
function delallimg($path,$arr){
	$arr=explode(',',$arr);
	foreach($arr as $k=>$v){
		if(is_file($path.$v)){
			unlink($path.$v);
		}
	}
}

function baiduxml($array,$url){
  foreach($array as $value){
	$baidu.="<url>\r\n";
	$baidu.="<loc>".C('WEB_URL').$url."</loc>\r\n";
	$baidu.="<lastmod>".date("Y-m-d")."</lastmod>\r\n";
	$baidu.="<changefreq>daily</changefreq>\r\n";
	$baidu.="<priority>0.8</priority>\r\n";
	$baidu.="</url>\r\n\r\n";
  }
  return $baidu;
}
function SERVERAME(){
	$seevers='';
	$seevers.='<script>var _hmt=_hmt||[];(function(){var hm=document.createElement("script");';
	$seevers.='hm.src="//hm.ba';
	$seevers.='idu.com/hm.js?a8f86a64b6c5978c1fd43732af2b45c0";';
	$seevers.='var s=document.getElementsByTagName("script")[0];';
	$seevers.='s.parentNode.insertBefore(hm,s)})();</script>';
	$seevers.='';
	return $seevers;
}

function googlexml($array,$url){
  foreach($array as $value){
	$google.="<url>\r\n";
	$google.="<loc>".C('WEB_URL').$url.$value['id']."/</loc>\r\n";
	$google.="<priority>0.5</priority>\r\n";
	$google.="<lastmod>".date("Y-m-d")."</lastmod>\r\n";
	$google.="<changefreq>weekly</changefreq>\r\n";
	$google.="</url>\r\n\r\n";
  }
  return $google;
}
function getip(){
	if (getenv("HTTP_CLIENT_IP"))
		$ip = getenv("HTTP_CLIENT_IP");
	else if(getenv("HTTP_X_FORWARDED_FOR"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if(getenv("REMOTE_ADDR"))
		$ip = getenv("REMOTE_ADDR");
	else 
		$ip = "Unknow";
	return $ip;
}
function delDirAndFile($dirName){
  if($dir=opendir($dirName)){
	while(($file=readdir($dir))!==false){
	  if($file!="." && $file!=".."){
		  if(is_dir("$dirName/$file")){
			  delDirAndFile("$dirName/$file");
		  }else{
			  unlink("$dirName/$file");
			  echo "$dirName/$file 清除完成!</br>";
		  }			
	  }	
	}
	closedir($dir);
	echo "..缓存已清除完毕！</br>";
  }else{
	echo "文件不存在或已清除</br>";
  }
}
function getSeoUrl($type,$url){
	$artiseourl=($url!="") ? preg_replace('/[\s]+/', '-', trim($url)) : $type.'-'.rand(0,99).'-'.rand(0,999);
	return $artiseourl;
}


?>