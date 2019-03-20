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

class ListAction extends CommonAction{
	
	public function index(){
		$id=$this->_get('id','intval');
		$this->doList($id,"id =%d");

	}

	public function html(){
		$url=$this->_get('url');
		$this->doList($url,"url ='%s'");
	}

	protected function doList($var,$str){
		$bid='';
		$list=M('List')->field('id,pid,bid,url,type,title,name,keywords,description,contents')->where($str,array($var))->find();
		$this->getid = ($list['pid']==0 && $list['type']!='page') ? 0 : $list['id'] ;
		if (!$list) {
			$this->_empty();
			exit;
		}
		$id=$list['id'];
		$table=ucfirst($list['type']);
		switch($table){
			case 'Product':
			$template='photo';
			$num=C('LIST_PRONUM');
			break;
			
			case 'New':
			$template='index';
			$num=C('LIST_NEWNUM');
			break;
			
			case 'Photo':
			$template='photo';
			$num=C('LIST_PHOTONUM');
			break;
			
			case 'Download':
			$template='index';
			$num=C('LIST_DOWNNUM');
			break;
			
			case 'Page':
			$template='page';
			break;
			
			default:
			$template='index';
			}
		
		if($table == 'Page'){
			//$this->pagelist=recursive(M('List')->field('id,url,pid,name')->where("type = 'page'")->order('sort')->select());
			$list['contents']=$this->doInside($list['contents']);
		}else{		
			if($list['pid']!=0){
				if($indb=M('List')->field('id')->where('pid = '.$id)->select()){
				  foreach($indb as $v){
					  $inpid.=$v['id'].',';
				  }
				$where['pid']=array('in',rtrim($id.",".$inpid,","));
				}else{
					$where['pid']=array('eq',$id);
				} 
				$list['id']=$list['pid'];
			}else{
				$where['bid']=array('eq',$id);
			}
			
			$db=M($table);
			$count=$db->where($where)->count();
			
			import('@.Org.Page');
			$pageurl = (C('URL_MODEL')==2) ? $list['url'] : '' ;
			$page=new Page($count,$num,'',$pageurl);
			//$prevs= (C('CNEN')=='cn') ? '上一页' : 'Previous' ;
			//$nexts= (C('CNEN')=='cn') ? '下一页' : 'Next' ;
			$page->setConfig('prev','«');
			$page->setConfig('next','»');
			$page->setConfig('theme',"%upPage% %first% %prePage% %linkPage% %nextPage% %end% %downPage%");
			$show=$page->show();
			
			$article=$db->where($where)->order('sort asc,id desc')->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign('article',$article);			
			$this->assign('page',$show);
			$this->assign('table',$table);
		}	
		$this->assign('list',$list);
		$this->assign('bid',$bid);
    	$this->display($template);	
	}


}
?>