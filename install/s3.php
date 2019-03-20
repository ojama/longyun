<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $Title; ?> - <?php echo $Powered; ?></title>
<link rel="stylesheet" href="./css/install.css" />
<SCRIPT language=javaScript>
function CheckJob()
{
	if (document.myform.DB_HOST.value.length==""){
		alert ("服务器地址不能为空！");
		document.myform.DB_HOST.focus();
		return false;
	}
	if (document.myform.DB_PORT.value.length==""){
		alert ("服务器端口不能为空！");
		document.myform.DB_PORT.focus();
		return false;
	}
	if (document.myform.DB_USER.value.length==""){
		alert ("数据库用户名不能为空！");
		document.myform.DB_USER.focus();
		return false;
	}
	if (document.myform.DB_PWD.value.length==""){
		alert ("数据库密码不能为空！");
		document.myform.DB_PWD.focus();
		return false;
	}
	if (document.myform.DB_NAME.value.length==""){
		alert ("数据库名不能为空！");
		document.myform.DB_NAME.focus();
		return false;
	}
	if (document.myform.DB_PREFIX.value.length==""){
		alert ("数据库表前缀不能为空！");
		document.myform.DB_PREFIX.focus();
		return false;
	}
 }
</SCRIPT>
</head>
<body>
<div class="wrap">
  <?php require './header.php';?>
  <div class="section">
    <div class="step">
      <ul>
        <li class="on"><em>1</em>检测环境</li>
        <li class="current"><em>2</em>创建数据</li>
        <li><em>3</em>完成安装</li>
      </ul>
    </div>
    <form action="index.php?step=4" method="post" name="myform" id="myform" onSubmit="return CheckJob()">
      <div class="server">
        <table width="100%">
          <tr>
            <td class="td1" width="100">数据库信息</td>
            <td class="td1" width="200">&nbsp;</td>
            <td class="td1">&nbsp;</td>
          </tr>
		  <tr>
            <td class="tar">数据库服务器：</td>
            <td><input type="text" name="DB_HOST" id="DB_HOST" value="localhost" class="input"></td>
            <td><div id="J_install_tip_dbhost"><span class="gray">数据库服务器地址，本地为localhost</span></div></td>
          </tr>
		  <tr>
            <td class="tar">数据库端口：</td>
            <td><input type="text" name="DB_PORT" id="DB_PORT" value="3306" class="input"></td>
            <td><div id="J_install_tip_dbport"><span class="gray">数据库服务器端口，一般为3306</span></div></td>
          </tr>
          <tr>
            <td class="tar">数据库用户名：</td>
            <td><input type="text" name="DB_USER" id="DB_USER" value="root" class="input"></td>
            <td><div id="J_install_tip_dbuser"></div></td>
          </tr>
          <tr>
            <td class="tar">数据库密码：</td>
            <td><input type="text" name="DB_PWD" id="DB_PWD" value="" class="input" autoComplete="off" onblur="TestDbPwd()"></td>
            <td><div id="J_install_tip_dbpw"></div></td>
          </tr>
          <tr>
            <td class="tar">数据库名：</td>
            <td><input type="text" name="DB_NAME" id="DB_NAME" class="input"></td>
            <td><div id="J_install_tip_dbname"></div></td>
          </tr>
          <tr>
            <td class="tar">数据库表前缀：</td>
            <td><input type="text" name="DB_PREFIX" id="DB_PREFIX" value="lanke_" class="input"></td>
            <td><div id="J_install_tip_dbprefix"><span class="gray">建议使用默认，同一数据库安装多个时需修改</span></div></td>
          </tr>
        </table>
        <div style="color:red;font-size:13px;"><?php echo $msgs?></div>
        <div id="J_response_tips" style="display:none;"></div>
      </div>
      <div class="bottom tac"> <a href="./index.php?step=2" class="btn">上一步</a>
        <button type="submit" class="btn btn_submit J_install_btn">创建数据</button>
      </div>
    </form>
  </div>
  <div  style="width:0;height:0;overflow:hidden;"> <img src="./images/install/pop_loading.gif"> </div>
</div>
<?php require './footer.php';?>
</body>
</html>