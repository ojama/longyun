<?php
class TaghrefWidget extends Widget{
	public function render($data){
		$types=strtolower($data['type']);
		if (C('URL_MODEL')==2) {
			return U('/'.$types.'_tags_'.$data['id']);
		}else{
			return U($types.'/tags',array('id'=>$data['id']));
		}	
	}
	

}
?> 