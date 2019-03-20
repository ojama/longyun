<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $Title; ?> - <?php echo $Powered; ?></title>
<link rel="stylesheet" href="./css/install.css" />
</head>
<body>
<div class="wrap">
  <?php require 'header.php';?>
  <div class="section">
    <div class="step">
      <ul>
        <li class="on"><em>1</em>检测环境</li>
        <li class="on"><em>2</em>创建数据</li>
        <li class="current"><em>3</em>完成安装</li>
      </ul>
    </div>
    <div class="install" id="log">
      <ul id="loginner">
        <?php 
          echo $msgs;
          if ($errs>0) {
            echo "<li style='color:#F00;font-size:13px;'>提示：有数据尚未创建成功，您可以尝试清空数据库，再重试安装！<a href='index.php'> 返回重新安装</a></li>";
          } else {
            echo "<li style='color:#F00;font-size:13px;'>网站安装成功！<span style='color:#F00;font-size:13px;' id='tiao'>3</span><a href='javascript:countDown'></a>秒后会您跳转……</li><meta http-equiv=refresh content=3;url='index.php?step=5'>";
          }
        ?>
        <script language="javascript" type="">
        function countDown(secs){
          tiao.innerText=secs;
          if(--secs>0)
           setTimeout("countDown("+secs+")",1000);
          }
          countDown(3);
        </script>
      </ul>
    </div>
    <div class="bottom tac"> <a href="javascript:;" class="btn_old"><img src="./images/install/loading.gif" align="absmiddle" />&nbsp;正在安装...</a> </div>
  </div>

</div>
<?php require 'footer.php';?>
</body>
</html>