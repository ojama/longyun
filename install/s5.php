<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $Title; ?> - <?php echo $Powered; ?></title>
<link rel="stylesheet" href="./css/install.css" />
</head>
<body>
<div class="wrap">
  <?php require './header.php';?>
  <div class="section">
    <div class="">
      <div class="success_tip cc"><a href="../MyAccount/" target="_blank" class="f16 b">安装完成，进入后台管理</a>
        <p>默认LankeCMS管理员：<span style="color:#F00">admin</span> &nbsp;&nbsp;管理员密码：<span style="color:#F00">admin</span></p>
		    <p>为了您站点的安全，安装完成后请将网站根目录下的 <span style="color:#F00">“Install”</span> 文件夹删除。如首页无法访问，请先登录后台“清除缓存”。<a href="../" target="_blank" class="f14">【访问首页】</a><p>
        <p>官方网站：<a href="http://www.lankecms.com/" target="_blank">www.lankecms.com</a></p>
      </div>
      <div class=""> </div>
    </div>
  </div>
</div>
<?php require './footer.php';?>
</body>
</html>