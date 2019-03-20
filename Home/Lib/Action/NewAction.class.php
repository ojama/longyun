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
class NewAction extends CommonAction{
	public function index(){
		$id=$this->_get('id','intval');
		$this->doNew($id,"id =%d");
	}

	public function html(){
		$url=$this->_get('url');
		$this->doNew($url,"url ='%s'");
	}

	protected function doNew($var,$where){
		$db=M('New');
		$newdata=$db->field('id,bid,pid,title,keywords,description,contents,time')->where($where,array($var))->find();
		if($newdata){
			$newdata['contents']=$this->doInside($newdata['contents']);
			$this->news=$newdata;
			$this->newlist=M('list')->field('id,pid,bid,type,name')->find($newdata['pid']);
			//相关新闻
			$this->related=$db->field('id,url,title,time')->where("pid = $newdata[pid] and id <> $newdata[id]")->select();
		}else{
			$this->_empty();
			exit;
		}	
		$this->prevnext=$this->prevnext('New',$newdata['id'],'title','条');
		$this->display('index');
	}

	public function tags(){
		$this->doTags('New');
	}
	
}
?>