<?php
class LinkWidget extends Widget{
	public function render($data){
		if(S('linksdata')){
			$data=S('linksdata');
		}else{
			$data['links']=$this->links=M('Link')->field('id,name,url,sort')->order('sort')->select();
			S('linksdata',$data,3600 * 24);
		}
		
		$content=$this->renderFile('link',$data);
		return $content;
	}

}
?>