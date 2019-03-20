<?php
class HrefWidget extends Widget{
	public function render($data){
		$types=strtolower($data['type']);
		switch ($types) {
			case 'new':
				$seourl=C('NEW_URL');
				break;
			case 'download':
				$seourl=C('DOWN_URL');
				break;
			case 'product':
				$seourl=C('PRO_URL');
				break;
			case 'photo':
				$seourl=C('PHO_URL');
				break;
			default:
				break;
		}
		if (C('URL_MODEL')==2) {
			return U('/'.$seourl.'/'.$data['url']);
		}else{
			return U($types.'/index',array('id'=>$data['id']));
		}
		
	}

}
?> 