<?php
// +----------------------------------------------------------------------
// | 蓝科企业网站系统PHP版
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://lankecms.com All rights reserved.
// +----------------------------------------------------------------------
// | Sale ( http://lankecms.taobao.com )
// +----------------------------------------------------------------------
// | Author: 钟若天 <lankecms@163.com>
// +----------------------------------------------------------------------

class CommonAction extends Action{
	public function _initialize(){
		header("Content-Type:text/html; charset=utf-8");
	}
	
	//上一个下一个
	protected function prevnext($table,$id,$name,$text){
		if (C('CNEN')=='cn') {
			$noprevmsg='没有上一'.$text;
			$prevmsg='上一'.$text;
			$nonextmsg='没有下一'.$text;
			$nextmsg='下一'.$text;
		} else {
			
			$noprevmsg='No previous';
			$prevmsg='PREVIOUS';
			$nonextmsg='No next';
			$nextmsg='NEXT';
		}
		
		$db=M($table);
		$p=$db->field("id,url,{$name}")->where('id<'.$id)->order('id desc')->limit(1)->find();
		$prev=!$p? $noprevmsg : $prevmsg.'：<a href="'.W('Href',array('url'=>$p['url'],'id'=>$p['id'],'type'=>$table),true).'">'.$p[$name].'</a>';
		
		$n=$db->field("id,url,{$name}")->where('id>'.$id)->order('id asc')->limit(1)->find();
		$next=!$n? $nonextmsg : $nextmsg.'：<a href="'.W('Href',array('url'=>$n['url'],'id'=>$n['id'],'type'=>$table),true).'">'.$n[$name].'</a>';
		
		$prevnext=array('prev'=>$prev,'next'=>$next);
		return $prevnext;
	}
	
	//验证码
	public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}
	
	//标签
	protected function doTags($table){
		//$name=$this->_get('name','trim');
		//$name = urldecode($name);
		$id=$this->_get('id','intval');
		$name=M('Tags')->where(array('id'=>$id))->getField('name');
		if (!$name) {
			$this->error('非法参数');
		}
		$types=strtolower($table);

		$db=M($table);
		$where=" title like '%%%s%%' or description like '%%%s%%' ";

		import('@.Org.Page');
		$count=$db->where($where,array($name,$name))->count();
		$pageurl = (C('URL_MODEL')==2) ? $types.'_tags_'.$id : '' ;
		$page=new Page($count,10,'',$pageurl);
		$prevs= (C('CNEN')=='cn') ? '上一页' : 'Previous' ;
		$nexts= (C('CNEN')=='cn') ? '下一页' : 'Next' ;
		$page->setConfig('prev',$prevs);
		$page->setConfig('next',$nexts);
		$page->setConfig('theme',"%upPage% %linkPage% %downPage%");
		$this->show=$page->show();
		$this->article=$db->field('id,title,url,description')->where($where,array($name,$name))->limit($page->firstRow.','.$page->listRows)->select();

		$this->name=$name;
		$this->type=$table;
		$this->display('Tags:tag');
	}

	//内链
	protected function doInside($array){
	    $indb=M('Inside');
	    $indata=$indb->field('id,keyword,url,number')->select();
	    foreach ($indata as $key => $value) {
	        $array=preg_replace('#'.$value['keyword'].'#i',"<a href=".$value['url']." target='_blank'>".$value['keyword']."</a>",$array,$value['number']);
	   }
	   return $array;
	}

      public function down(){
                if (!is_numeric($_GET['id'])) {
                    exit('非法参数');
                }
                $id=(int)I('get.id');
                if ($id < 1) {
                    exit('非法操作');
                }
                $name=M("Download")->where("id=%d",array($id))->getField('filename');
                if ($name) {
                      $path='./Uploads/download/';
                      if(is_file($path.$name)){
                      header('Content-Disposition: attachment; filename="'.$name.'"');
                      header('Content-Length:'.filesize($path.$name));
                      readfile($path.$name);
                      }else{
                      $this->error('找不到此文件或此文件已被删除',__ROOT__.'/');  
                      }
                } else {
                     $this->error('找不到此文件',__ROOT__.'/');
                     die();
                }
      }

	public function version(){
		echo C('VERSION');
	}

	protected function smtpsendmail($title,$contents){
		import('@.Org.Email');
		$smtpserver = C('EMAIL_HOST');                //SMTP服务器
		$smtpserverport =C('EMAIL_PORT');           //SMTP服务器端口
		$smtpusermail = C('EMAIL_USERNAME');   //用户邮箱
		$smtpemailto = C('EMAIL_TO');                   //发送给谁
		$smtpuser = C('EMAIL_USERNAME');         //帐号
		$smtppass = C('EMAIL_PASSWORD');       //密码
		$mailsubject = $title;                                    //标题
		$mailbody = $contents;
		$mailtype = "HTML";
		$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
		$smtp->debug = FALSE;       //是否显示发送的调试信息
		if ($smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype)) {
			return true;
		}else{
			return false;
		}
	}

	protected function mailfunction($title,$contents){
		$to = C('EMAIL_TO');                                                     //发送给谁 
		$subject = "=?UTF-8?B?".base64_encode($title)."?=";  //标题,防止乱码
		$message = $contents;                                                 //发送给谁
		$headers = 'MIME-Version: 1.0' . "\r\n"; 
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; //Additional headers 
		$headers .= 'Reply-To: '.C('EMAIL_FROMNAME').'<'.C('EMAIL_USERNAME').'>' . "\r\n"; 
		$headers .= 'From: '.C('EMAIL_FROMNAME').'<'.C('EMAIL_USERNAME').'>' . "\r\n"; 
		if (mail($to,$subject,$message,$headers)) {
			 return true;
		} else {
			return false;
		}
	}

	protected function phpmailersend($title,$contents){
		  import('@.Org.Phpmailer');
		  try { 
			  $mail = new PHPMailer(true); 
			  $mail->IsSMTP(); 
			  $mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码 
			  $mail->SMTPAuth = true; //开启认证 
			  $mail->Port = C('EMAIL_PORT'); 
			  $mail->Host = C('EMAIL_HOST'); 
			  $mail->Username = C('EMAIL_USERNAME'); 
			  $mail->Password = C('EMAIL_PASSWORD'); 
			  $mail->AddReplyTo(C('EMAIL_USERNAME'),C('EMAIL_USERNAME'));//回复地址 
			  $mail->From = C('EMAIL_USERNAME'); 
			  $mail->FromName = C('EMAIL_FROMNAME'); 
			  $to = C('EMAIL_TO'); 
			  $mail->AddAddress($to); 
			  $mail->Subject = $title; 
			  $mail->Body = $contents; 
			  $mail->WordWrap = 120; // 设置每行字符串的长度 
			  $mail->IsHTML(true); 
			  $mail->Send(); 
			  return 1;
		  } catch (phpmailerException $e) { 
			  return $e->errorMessage();
		  }
	}

	public function _empty(){
		header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码
		$this->list=recursive(M('List')->field('id,name,url,pid,sort,type,link')->order('sort')->select());
		$this->display("Public:404"); 
	}
	
}
?>