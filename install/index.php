<?php
$installFile='../Home/install.lock';
$sqlFile='./lankecms.php';
$configFile='../mysql.php';
$_config=include'../config.php';

if (file_exists($installFile)) {
    echo '
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        </head>
        <body>
        您已经安装过本系统，如果需重新安装，请先删除站点Home目录下的 install.lock 文件，再进行安装。
        </body>
        </html>';
        exit();
}

@set_time_limit(1000);
if (phpversion() <= '5.3.0')
    set_magic_quotes_runtime(0);
if ('5.2.0' > phpversion())
    exit('您的php版本过低，不能安装本软件，请升级到5.2.0或更高版本再安装，谢谢！');

date_default_timezone_set('PRC');
error_reporting(E_ALL & ~E_NOTICE);
header('Content-Type: text/html; charset=UTF-8');

if (!file_exists($sqlFile) || !file_exists($configFile)) {
    exit('缺少安装文件或配置文件');
}

$Title = "蓝科企业网站系统";
$Powered = "Powered by lankecms.com";

$step = (isset($_GET['step'])) ? $_GET['step'] : 1 ;

switch ($step) {
    case '1':
        include_once('s1.php');
        exit();
        break;
    
    case '2':
        $phpv = @ phpversion();
        $os = PHP_OS;

        $err = 0;
        if (function_exists('mysql_connect')) {
            $mysql = '<span class="correct_span">&radic;</span> 已安装';
        } else {
            $mysql = '<span class="correct_span error_span">&radic;</span> 出现错误';
            $err++;
        }
        if (ini_get('file_uploads')) {
            $uploadSize = '<span class="correct_span">&radic;</span> ' . ini_get('upload_max_filesize');
        } else {
            $uploadSize = '<span class="correct_span error_span">&radic;</span>禁止上传';
        }
        if (function_exists('session_start')) {
            $session = '<span class="correct_span">&radic;</span> 支持';
        } else {
            $session = '<span class="correct_span error_span">&radic;</span> 不支持';
            $err++;
        }
        $folder = array(
            '../Home/',
            '../mysql.php',
            '../config.php',
            '../static.php',
            '../install/',
            '../install/lankecms.php',
            '../Uploads/',
        );
        include_once ("s2.php");
        exit();
        break;

    case '3':
        include_once ("s3.php");
        exit();
        break;

    case '4':
        $_POST['DB_HOST']=trim($_POST['DB_HOST']);
        $_POST['DB_USER']=trim($_POST['DB_USER']);
        $_POST['DB_PWD']=trim($_POST['DB_PWD']);
        $_POST['DB_NAME']=trim($_POST['DB_NAME']);
        $conn = @ mysql_connect($_POST['DB_HOST'],$_POST['DB_USER'],$_POST['DB_PWD']);
        if (!$conn) {
           $msgs='提示：数据库连接失败！请检查数据库信息是否正确！';
           include_once ("s3.php");
           exit;
        }
        if (!@mysql_select_db($_POST['DB_NAME'])) {
           $msgs='提示：找不到指定的数据库，请检查“数据库名”是否正确，或请先创建数据库！';
           include_once ("s3.php");
           exit;
        }
        mysql_query('SET NAMES UTF8');

        if (setconfig($_POST,$configFile)) {
            $msgs.='<li><span class="correct_span">&radic;</span>成功写入数据库配置文件</li> ';
        }else{
            $msgs='提示：配置文件写入失败！';
            include_once ("s3.php");
        }

        include_once ("lankecms.php");
        $errs=0;
        foreach ($sqls as $val) {
            $querysql=re_prefix($val);
            if (mysql_query($querysql)) {
              $msgs.='<li><span class="correct_span">&radic;</span>创建数据表' . create_name($querysql). '，完成</li> ';
            } else {
              $msgs.='<li><span class="correct_span error_span">&radic;</span>创建数据表' . create_name($querysql). '，失败</li> ';
              $errs++;
            }
        }

        foreach ($intosqls as $val) {
            $querysql=re_prefix($val);
            if (mysql_query($querysql)) {
              $msgs.='<li><span class="correct_span">&radic;</span>已成功向' . into_name($querysql). ' 表插入数据完成</li> ';
            } else {
              $msgs.='<li><span class="correct_span error_span">&radic;</span>向' . into_name($querysql). ' 表插入数据失败</li> ';
              $errs++;
            }
        }

        include_once ("s4.php");
        exit();
        break;

    case '5':
        include_once ("s5.php");
        @file_put_contents($installFile, "LankeCMS INATALL OK ...");
        exit();
        break;

    default:
        # code...
        break;
}


function setconfig($array,$file){
  $config=array_merge(include $file , array_change_key_case($array,CASE_UPPER));
  $str = "<?php\r\nreturn " . var_export($config, true) . ";\r\n?>";
    if(file_put_contents($file,$str)){
      return true;
    }else{
      return false;
    }
}

function re_prefix($str){
  $strs=str_replace("lanke_", trim($_POST['DB_PREFIX']), $str);
  return $strs;
}

function create_name($str){
  preg_match('/CREATE TABLE IF NOT EXISTS `([^ ]*)`/', $str,$matches);
  return $matches[1];
}

function into_name($str){
  preg_match('/INSERT INTO `([^ ]*)`/', $str,$matches);
  return $matches[1];
}

function getip(){
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else 
        $ip = "Unknow";
    return $ip;
}

?>;