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

class NavWidget extends Widget{
	public function render($data){
		if(S('navdata')){
			$data=S('navdata');
		}else{
			$n=M('List');
			$nav=$n->field('id,name,url,pid,type,link')->where('pid=0 and nav=1')->order('sort asc')->select();
			$data['nav']=$nav;
			
			if($nav){
				$snav=$n->field('id,name,url,pid,type,link')->where('pid != 0 and nav=1')->order('sort asc')->select();
				$data['snav']=$snav;
				//S('navdata',$data,3600 * 24);
			}

			//2015-06-23
			$appnav=$nav;
			foreach ($nav as  $k=>$v) {
				foreach ($snav as $sk=>$sv) {
					if ($v["id"] == $sv["pid"]) {
						$appnav[$k]['two'][]=$sv;
					}
				}
			}
			$data['appnav']=$appnav;
			S('navdata',$data,3600 * 24);
		}
		
		$content=$this->renderFile('nav',$data);
		return $content;
	}


}
?>