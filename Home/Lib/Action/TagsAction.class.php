<?php
class TagsAction extends CommonAction{
	public function index(){
		$db=M('Tags');
		import('ORG.Util.Page');
		$count=$db->where($where)->count();
		$page=new Page($count,200);
		$prevs= (C('CNEN')=='cn') ? '上一页' : 'Previous' ;
		$nexts= (C('CNEN')=='cn') ? '下一页' : 'Next' ;
		$page->setConfig('prev',$prevs);
		$page->setConfig('next',$nexts);
		$page->setConfig('theme',"%upPage% %linkPage% %downPage%");
		$this->show=$page->show();

		$this->tags=$db->field('id,name,type,sort')->order('sort')->limit($page->firstRow.','.$page->listRows)->select();
		$this->pid=M('List')->field('id')->where(array('type'=>'Product','pid'=>0))->limit(1)->order('sort')->find();
		$this->display();
	}

	public function tag(){
		$this->display();
	}


}
?>