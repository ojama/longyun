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

class LeftWidget extends Widget{
	public function render($data){
		
		if(!empty($data)){
		    if(S('leftdata'.$data['id'])){
			  $data=S('leftdata'.$data['id']);
		    }else{
			  $list=M('List');
			  $bwhere['pid']=array('eq',$data['id']);
			  $bwhere['type']=array('eq',$data['type']);
			  $bigclass=$list->field("id,name,url,pid,sort,link")->where($bwhere)->order('sort asc,id asc')->select();	
			  $data['bigclass']=$bigclass;

				//判断是否存在大类
				if($bigclass){
				  $allid='';
				  foreach ($bigclass as $k=>$v){
					  $allid.=$v['id'].',';
				  }
				  $allid=rtrim($allid,",");
				  $where['pid']=array('in',$allid);
				  $smallclass=$list->field("id,name,url,pid,sort,link")->where($where)->order('sort asc,id asc')->select();
				  $data['smallclass']=$smallclass;
				  S('leftdata'.$data['id'], $data, 3600 * 24);
				}
			}
		}

		$content=$this->renderFile('left',$data);
		return $content;
	}


}
?>