<?php
// +----------------------------------------------------------------------
// | 蓝科企业网站系统PHP版
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://lankecms.com All rights reserved.
// +----------------------------------------------------------------------
// | Sale ( http://lankecms.taobao.com )
// +----------------------------------------------------------------------
// | Author: 钟若天 <lankecms@163.com>
// +----------------------------------------------------------------------

class ProductAction extends CommonAction{
	public function index(){
		$id=$this->_get('id','intval');
		$this->doPro($id,"id =%d");
	}

	public function html(){
		$url=$this->_get('url');
		$this->doPro($url,"url ='%s'");
	}

	protected function doPro($var,$where){
		$db=M('Product');
		$product=$db->field('id,pid,bid,name,property1,property2,property3,property4,title,keywords,description,photo,contents')->where($where,array($var))->find();
		if ($product) {
			$product['contents']=$this->doInside($product['contents']);
			$this->related=$db->field('id,name,description,url,thumb')->where("pid = $product[pid] and id <> $product[id]")->select();
			if(!empty($product['photo'])){
			  $this->photo=explode(',',$product['photo']);	
			}
			$this->prolist=M('list')->field('id,pid,bid,type,name')->find($product['pid']);
		}else{
			$this->_empty();
			exit;
		}
		$this->prevnext=$this->prevnext('Product',$product['id'],'name','个');
		$this->product=$product;
		$this->display('index');
	}

	public function tags(){
		$this->doTags('Product');
	}


}
?>