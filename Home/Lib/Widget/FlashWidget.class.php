<?php
class FlashWidget extends Widget{
	public function render($data){
	$type = (isset($data['type'])) ? $data['type'] : '1' ;

	if (isset($data['id']) && $type == '3') {
		$nickname = M('Flash')->where('id='.$data['id'].' and isdel =0')->getField('photo');
		return $nickname;
	} else {
		
		if(S('flashdata'.$type)){
			$data=S('flashdata'.$type);
		}else{
			$data['flash']=$this->flash=M('Flash')->where('type = '.$type.' and isdel =0')->field('id,title,type,sort,link,photo,description')->order('sort')->select();
			S('flashdata'.$type,$data,3600 * 24);
		}

		$template  = ($type=='2') ? 'adv' : 'flash' ;
		$content=$this->renderFile($template,$data);
		return $content;
	}
	


	}

}
?>