<?php
$arr1=include'./config.php';
$arr2=include'./mysql.php';
$arr3=include'./static.php';
$arr4=array(
    'TMPL_ACTION_ERROR'=>'Public:jump',
    'TMPL_ACTION_SUCCESS'=>'Public:jump',
	'TMPL_L_DELIM'=>'<{',
	'TMPL_R_DELIM'=>'}>',
	'DEFAULT_THEME'=>'default',
	// 'TMPL_DETECT_THEME'=>true, // 自动侦测模板主题
	// 'THEME_LIST'=>'default,V2C01',
	'URL_CASE_INSENSITIVE'=>true,  //url不区分大小写
	'URL_HTML_SUFFIX'=>'html',
	'OUTPUT_ENCODE'=>false, //关闭页面压缩
	//'SHOW_PAGE_TRACE'=>true,
);
	if($arr3['URL_MODEL']==2) {
		$arr4['URL_ROUTER_ON']=true;
		$arr4['URL_ROUTE_RULES']=array(
			$arr3['NEW_URL'].'/:url'=>'New/html',
			$arr3['DOWN_URL'].'/:url'=>'Download/html',
			$arr3['PRO_URL'].'/:url'=>'Product/html',
			$arr3['PHO_URL'].'/:url'=>'Photo/html',
			'/^new_tags_(.+)_(\d+)$/'=>'New/tags?id=:1&p=:2',
			'/^new_tags_(.+)$/'=>'New/tags?id=:1',
			'/^download_tags_(.+)_(\d+)$/'=>'Download/tags?id=:1&p=:2',
			'/^download_tags_(.+)$/'=>'Download/tags?id=:1',
			'/^product_tags_(.+)_(\d+)$/'=>'Product/tags?id=:1&p=:2',
			'/^product_tags_(.+)$/'=>'Product/tags?id=:1',
			'/^photo_tags_(.+)_(\d+)$/'=>'Photo/tags?id=:1&p=:2',
			'/^photo_tags_(.+)$/'=>'Photo/tags?id=:1',
			'Feedback'=>'Feedback/index',
			'Inquiry'=>'Inquiry/index',
			'/^([a-zA-Z0-9-]+)$/'=>'List/html?url=:1',
			'/^([a-zA-Z0-9-]+)_(\d+)$/'=>'List/html?url=:1&p=:2'
		);
	}
return array_merge($arr1,$arr2,$arr3,$arr4);
?>