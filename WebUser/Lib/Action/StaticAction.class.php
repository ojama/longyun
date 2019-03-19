<?php
class StaticAction extends Action{
	public function index(){
		echo 111;
	}

	public function verify(){
		import('@.Org.Image');
		ob_end_clean();
		Image::buildImageVerify();
	}



}
?>