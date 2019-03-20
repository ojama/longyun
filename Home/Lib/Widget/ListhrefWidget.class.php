<?php
// +----------------------------------------------------------------------
// | 蓝科企业网站系统PHP版
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://lankecms.com All rights reserved.
// +----------------------------------------------------------------------
// | Sale ( http://51020.taobao.com )
// +----------------------------------------------------------------------
// | Author: 钟若天 <lankecms@163.com>
// +----------------------------------------------------------------------

class ListhrefWidget extends Widget{

	public function render($data){
		if (!empty($data['link'])) {
			$linkvar = (stripos($data['link'],"http://")!== false) ? $data['link'] : __APP__.$data['link'];
			return $linkvar;
		} else {
			if (C('URL_MODEL')==2) {
				if (!isset($data['url'])) {
				    $data['url']=M('List')->where(array('id'=>$data['id']))->getField('url');
				}
				return U('/'.$data['url']);
			}else{
				return U('List/index',array('id'=>$data['id']));
			}
		}		
	}
	

}
?> 