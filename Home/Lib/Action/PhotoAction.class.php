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

class PhotoAction extends CommonAction{
	public function index(){
		$id=$this->_get('id','intval');
		$this->doPho($id,"id =%d");
	}

	public function html(){
		$url=$this->_get('url');
		$this->doPho($url,"url ='%s'");
	}

	protected function doPho($var,$where){
		$db=M('Photo');
		$photodata=$db->field('id,pid,bid,name,title,keywords,description,photo,contents')->where($where,array($var))->order('sort')->find();
		if ($photodata) {
			$photodata['contents']=$this->doInside($photodata['contents']);
			$this->related=$db->field('id,name,description,url,thumb')->where("pid = $photodata[pid] and id <> $photodata[id]")->select();			
			if(!empty($photodata['photo'])){
				$this->photo=explode(',',$photodata['photo']);
			}
			$this->photolist=M('list')->field('id,pid,bid,type,name')->find($photodata['pid']);
		} else {
			$this->_empty();
			exit;
		}
		$this->prevnext=$this->prevnext('Photo',$photodata['id'],'name','个');
		$this->photodata=$photodata;
		$this->display('index');
	}
	
	public function tags(){
		$this->doTags('Photo');
	}
		

}
?>