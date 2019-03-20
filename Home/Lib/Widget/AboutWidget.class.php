<?php
class AboutWidget extends Widget{
	public function render($data){
		$aboutdata=M('List')->field('id,url,contents')->where("id = ".$data['id']." and type='page'")->find();
		$len=$data['len'];
		$about=strip_tags($aboutdata['contents']);
		$about=strlen($about)<=$len ? $about : (mb_substr($about,0,$len,'utf-8')."...");
		$data['contents']=$about;
		$data['url']=$aboutdata['url'];
		$content=$this->renderFile('about',$data);
		return $content;
	}	
}
?>