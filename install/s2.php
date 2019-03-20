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
    <div class="step">
      <ul>
        <li class="current"><em>1</em>检测环境</li>
        <li><em>2</em>创建数据</li>
        <li><em>3</em>完成安装</li>
      </ul>
    </div>
    <div class="server">
      <table width="100%">
        <tr>
          <td class="td1">环境检测</td>
          <td class="td1" width="25%">推荐配置</td>
          <td class="td1" width="25%">当前状态</td>
          <td class="td1" width="25%">最低要求</td>
        </tr>
        <tr>
          <td>操作系统</td>
          <td>Linux</td>
          <td><span class="correct_span">&radic;</span> <?php echo $os; ?></td>
          <td>不限制</td>
        </tr>
        <tr>
          <td>PHP版本</td>
          <td>>5.3.x</td>
          <td><span class="correct_span">&radic;</span> <?php echo $phpv; ?></td>
          <td>5.2.0</td>
        </tr>
        <tr>
          <td>Mysql版本（client）</td>
          <td>>5.x.x</td>
          <td><?php echo $mysql; ?></td>
          <td>4.2</td>
        </tr>
        <tr>
          <td>附件上传</td>
          <td>>2M</td>
          <td><?php echo $uploadSize; ?></td>
          <td>不限制</td>
        </tr>
        <tr>
          <td>session</td>
          <td>开启</td>
          <td><?php echo $session; ?></td>
          <td>开启</td>
        </tr>
      </table>
      <table width="100%">
        <tr>
          <td class="td1">目录、文件权限检查</td>
          <td class="td1" width="25%">写入</td>
          <td class="td1" width="25%">读取</td>
        </tr>
      <?php
      $direrr=0;
      foreach($folder as $dir){
        if (is_writable($dir)) {
          $w = '<span class="correct_span">&radic;</span>可写 ';
        } else {
          $w = '<span class="correct_span error_span">&radic;</span>不可写 ';
          $direrr++;
        }
        if (is_readable($dir)) {
          $r = '<span class="correct_span">&radic;</span>可读' ;
        } else {
          $r = '<span class="correct_span error_span">&radic;</span>不可读';
          $direrr++;
        }
      ?>
        <tr>
          <td><?php echo $dir; ?></td>
          <td><?php echo $w; ?></td>
          <td><?php echo $r; ?></td>
        </tr>
      <?php
      }
      ?>   
      </table>
    </div>
    <?php if ($direrr) {
      echo '<div class="bottom tac" style="color:red;font-size:13px;">以上文件或目录没有写入权限，请设置好权限才可继续安装！</div>';
    }?>
    <div class="bottom tac"> <a href="./index.php?step=2" class="btn">重新检测</a>
      <?php if (!$direrr) {
       echo '<a href="./index.php?step=3" class="btn">下一步</a>';
      }?>
    </div>
  </div>
</div>
<?php require './footer.php';?>
</body>
</html>