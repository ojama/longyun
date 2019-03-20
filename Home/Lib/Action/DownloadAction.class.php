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
class DownloadAction extends CommonAction{
	public function index(){
		$id=$this->_get('id','intval');
		$this->doDown($id,"id =%d");	
	}

	public function html(){
		$url=$this->_get('url');
		$this->doDown($url,"url ='%s'");
	}

	protected function doDown($var,$where){
		$db=M('Download');
		$down=$db->field('id,bid,pid,name,title,keywords,description,contents,filename,time')->where($where,array($var))->find();	
		if ($down) {
			$down['contents']=$this->doInside($down['contents']);
			$this->down=$down;
			$this->downlist=M('list')->field('id,pid,bid,type,name')->find($down['pid']);
			$this->related=$db->field('id,url,name,time')->where("pid = $down[pid] and id <> $down[id]")->select();
		} else {
			$this->_empty();
			exit;
		}
		
		$this->prevnext=$this->prevnext('Download',$down['id'],'name','个');		
		$this->display('index');	
	}

	public function tags(){
		$this->doTags('Download');
	}


}
?>