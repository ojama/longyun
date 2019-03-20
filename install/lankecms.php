<?php
//创建产品表
$sqls[]="CREATE TABLE IF NOT EXISTS `lanke_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `title` varchar(200) NOT NULL DEFAULT '',
  `url` varchar(300) NOT NULL DEFAULT '',
  `keywords` varchar(300) NOT NULL DEFAULT '',
  `description` varchar(400) NOT NULL DEFAULT '',
  `contents` text NOT NULL,
  `pid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `photo` varchar(400) NOT NULL DEFAULT '',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `property1` varchar(200) NOT NULL DEFAULT '',
  `property2` varchar(200) NOT NULL DEFAULT '',
  `property3` varchar(200) NOT NULL DEFAULT '',
  `property4` varchar(200) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;";

//创建相册表
$sqls[]="CREATE TABLE IF NOT EXISTS `lanke_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `title` varchar(200) NOT NULL DEFAULT '',
  `url` varchar(300) NOT NULL DEFAULT '',
  `keywords` varchar(300) NOT NULL DEFAULT '',
  `description` varchar(400) NOT NULL DEFAULT '',
  `contents` text NOT NULL,
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `photo` varchar(400) NOT NULL DEFAULT '',
  `pid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;";

//创建新闻表
$sqls[]="CREATE TABLE IF NOT EXISTS `lanke_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '',
  `url` varchar(300) NOT NULL DEFAULT '',
  `keywords` varchar(300) NOT NULL DEFAULT '',
  `description` varchar(400) NOT NULL DEFAULT '',
  `contents` text NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `bid` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_2` (`url`),
  KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;";

//创建下载表
$sqls[]="CREATE TABLE IF NOT EXISTS `lanke_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `title` varchar(200) NOT NULL DEFAULT '',
  `url` varchar(300) NOT NULL DEFAULT '',
  `keywords` varchar(300) NOT NULL DEFAULT '',
  `description` varchar(400) NOT NULL DEFAULT '',
  `contents` text NOT NULL,
  `filename` varchar(400) NOT NULL DEFAULT '',
  `pid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;";

//创建留言表
$sqls[]="CREATE TABLE IF NOT EXISTS `lanke_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `tel` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `add` varchar(200) NOT NULL DEFAULT '',
  `contents` varchar(500) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;";

//创建广告表
$sqls[]="CREATE TABLE IF NOT EXISTS `lanke_flash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `link` varchar(300) NOT NULL DEFAULT '',
  `photo` varchar(100) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT '0',
  `isdel` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(400) DEFAULT '',
  `type` varchar(30) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;";

//创建订单表
$sqls[]="CREATE TABLE IF NOT EXISTS `lanke_inquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(100) NOT NULL DEFAULT '',
  `num` varchar(50) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL DEFAULT '',
  `company` varchar(50) NOT NULL DEFAULT '',
  `add` varchar(200) NOT NULL DEFAULT '',
  `tel` varchar(50) NOT NULL DEFAULT '',
  `fax` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `contents` varchar(500) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;";

//创建内链表
$sqls[]="CREATE TABLE IF NOT EXISTS `lanke_inside` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(300) NOT NULL DEFAULT '',
  `number` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;";

//创建友情链接表
$sqls[]="CREATE TABLE IF NOT EXISTS `lanke_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(500) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;";

//创建栏目表
$sqls[]="CREATE TABLE IF NOT EXISTS `lanke_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `pid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL DEFAULT '',
  `url` varchar(300) NOT NULL DEFAULT '',
  `keywords` varchar(200) NOT NULL DEFAULT '',
  `description` varchar(400) NOT NULL DEFAULT '',
  `sort` tinyint(1) NOT NULL DEFAULT '1',
  `nav` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(30) NOT NULL DEFAULT '',
  `link` varchar(200) NOT NULL DEFAULT '',
  `contents` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;";

//创建标签表
$sqls[]="CREATE TABLE IF NOT EXISTS `lanke_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(10) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;";

//创建用户表
$sqls[]="CREATE TABLE IF NOT EXISTS `lanke_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;";

//插入用户信息
$intosqls[]="INSERT INTO `lanke_user` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');";

//插入栏目信息
$intosqls[]="INSERT INTO `lanke_list` (`id`, `name`, `pid`, `bid`, `title`, `url`, `keywords`, `description`, `sort`, `nav`, `type`, `link`, `contents`) VALUES
(1, '产品中心', 0, 1, '产品中心-SEO标题优化', 'product', '产品中心', '产品中心产品中心', 2, 1, 'product', '', ''),
(2, '新闻中心', 0, 2, '新闻优化标题', 'new', '新闻关键字优化', '新闻描述优化', 3, 1, 'new', '', ''),
(3, '下载中心', 0, 3, '下载中心', 'download', '', '', 5, 1, 'download', '', ''),
(4, '联系我们', 0, 4, '联系我们', 'Contact-us', '联系我们', '联系我们 联系我们', 9, 1, 'page', '', '<p>\r\n 联系我们联系我们联系我们\r\n</p>\r\n<p>\r\n 联系我们联系我们联系我们\r\n</p>\r\n'),
(5, '产品大类1', 1, 1, '产品大类1产品大类1', '1', '产品大类1产品大类1', '产品大类1产品大类1', 1, 1, 'product', '', ''),
(6, '产品大类2', 1, 1, '产品大类2-SEO标题优化', '2', '产品大类2', '产品大类2', 2, 1, 'product', '', ''),
(7, '产品大类3', 1, 1, '产品大类3-SEO标题优化', '3', '产品大类3', '产品大类3', 3, 1, 'product', '', ''),
(8, '产品小类1_1', 5, 1, '', '4', '', '', 1, 1, 'product', '', ''),
(9, '产品小类1_2', 5, 1, '', '5', '', '', 2, 1, 'product', '', ''),
(10, '产品小类2_1', 6, 1, '', '7', '', '', 1, 1, 'product', '', ''),
(11, '产品小类2_2', 6, 1, '', '8', '', '', 2, 1, 'product', '', ''),
(12, '公司新闻', 2, 2, '公司新闻', '9', '公司新闻', '公司新闻公司新闻', 1, 1, 'new', '', ''),
(13, '行业新闻', 2, 2, '行业新闻', '10', '行业新闻', '行业新闻行业新闻', 2, 1, 'new', '', ''),
(14, '产品小类1_3', 5, 1, '333', '6', '33', '3333', 3, 1, 'product', '', ''),
(15, '客户案例', 0, 15, '客户案例', 'photo', '客户案例', '客户案例，客户案例', 4, 1, 'photo', '', ''),
(25, '公司简介', 0, 25, '蓝科企业网站系统LankeCMS', 'About-us', '蓝科,LankeCMS', '蓝科企业网站系统LankeCMS是采用PHP+MYSQL技术和MVC模式进行开发的，架构清晰，代码易于维护。支持伪静态功能，可生成google和百度地图，支持自定义url、关键字和描述，符合SEO标准。', 1, 1, 'page', '', '<p>\r\n  蓝科企业网站系统LankeCMS是采用PHP+MYSQL技术和MVC模式进行开发的，架构清晰，代码易于维护。支持伪静态功能，可生成google和百度地图，支持自定义url、关键字和描述，符合SEO标准。拥有企业网站常用的模块功能(企业简介模块、新闻模块、产品模块、下载模块、图片模块、在线留言、在线订单、友情链接、网站地图等)，强大灵活的后台管理功能，可为企业打造出专业且具有营销力的标准网站。\r\n</p>\r\n网站系统功能介绍：<br />\r\n1. 单页模块：可发布企业的各类信息，如企业简介、组织机构、企业荣誉、联系方式等，并可随意增删。 <br />\r\n2. 新闻模块：可发布企业新闻和行业新闻等，支持二级栏目，栏目个数无限制。<br />\r\n3. 产品模块：产品支持二级分类，并可对产品直接下订单询价，且支持邮件通知，更符合企业营销。 <br />\r\n4. 图片模块：以图片相册的方式，可发布成功案例或公司相册等栏目，更直观的展示企业的优越性。<br />\r\n5. 下载模块：用户可在后台上传文档资料，方便网站客户下载使用。<br />\r\n6. 在线留言：让客户的建议留言能及时反馈给企业，且支持邮件通知，让沟通变得更加方便。<br />\r\n7. 产品搜索：可对客户输入的关键字进行产品搜索，增加了网站的灵活性。<br />\r\n8. 产品复制：可对已添加的产品进行复制，从而提高了添加产品的效率。<br />\r\n9. 图片水印：可在后台设置公司的水印图片，以防止企业产品图片被盗用。<br />\r\n10. 邮件通知：在客户下订单或留言的同时，会发邮件到您指定的邮箱，让工作更有效率的。<br />\r\n<p>\r\n  11.搜索优化：全站支持伪静态，可自定义keywords、description、url，生成sitemap功能，添加内链和标签等功能。\r\n</p>\r\n<p>\r\n <br />\r\n</p>'),
(26, '最新案例', 15, 15, '最新案例-SEO标题', '14', '最新案例', '最新案例最新案例最新案例最新案例', 1, 1, 'photo', '', ''),
(27, '经典案例', 15, 15, '经典案例-SEO标题', '15', '经典案例', '经典案例经典案例', 2, 1, 'photo', '', ''),
(28, '帮助文档', 3, 3, '帮助文档帮助文档帮助文档', '16', 'SEO关键字SEO关键字', 'SEO描述SEO描述SEO描述', 1, 1, 'download', '', ''),
(29, '档案下载', 3, 3, '档案下载档案下载档案下载档案下载', '17', 'SEO关键字SEO关键字', 'SEO描述SEO描述SEO描述', 2, 1, 'download', '', ''),
(30, '在线留言', 0, 30, '', 'Feedback', '', '', 7, 1, 'link', '/Feedback/', ''),
(31, '在线订购', 0, 31, '', 'Inquiry', '', '', 8, 0, 'link', '/Inquiry/', ''),
(39, '科技创新', 2, 2, '科技创新', '11', '科技创新', '科技创新', 3, 1, 'new', '', ''),
(40, '部门新闻', 12, 2, '部门新闻', '12', '部门新闻部门新闻', '部门新闻部门新闻部门新闻', 1, 1, 'new', '', '');";

//插入产品信息
$intosqls[]="INSERT INTO `lanke_product` (`id`, `name`, `title`, `url`, `keywords`, `description`, `contents`, `pid`, `bid`, `photo`, `thumb`, `property1`, `property2`, `property3`, `property4`, `sort`, `featured`) VALUES
(1, '行车记录仪 白色真爱版WDR宽动态', '行车记录仪白色真爱版WDR宽动态1080P高清夜视广角', '1', '行车记录仪', 'PAPAGO P1pro 行车记录仪 白色真爱版 WDR宽动态 1080P高清夜视广角GoSafe600白色真爱版,WDR宽动态,夜视最清晰,拍摄角度最广', '<p>\r\n	PAPAGO P1pro 行车记录仪 白色真爱版 WDR宽动态 1080P高清夜视广角GoSafe600白色真爱版,WDR宽动态,夜视最清晰,拍摄角度最广\r\n</p>\r\n<p>\r\n	<img  src=http://img30.360buyimg.com/popWaterMark/g15/M07/19/04/rBEhWVKYcNsIAAAAAANSesDYTngAAGHrQIy6IEAA1KS820.jpg /> \r\n</p>', 8, 1, '530860294daf2.jpg,530860295a23a.jpg,530860295aac2.jpg,530860295b15f.jpg,530860295b7ac.jpg,530860295beb7.jpg,530860295c676.jpg,530860295cd67.jpg', '5300c196f0537.png', '商品编号：1060991967', '拍摄角度：130度', '视频像素：1920*1080', '上架时间：2013-12-20 13:09:30', 1, 1)";		

//插入新闻信息
$intosqls[]="INSERT INTO `lanke_new` (`id`, `title`, `url`, `keywords`, `description`, `contents`, `pid`, `bid`, `sort`, `time`) VALUES
(1, '油价上涨激发勘探业石油钻探设备出', '2', '油价上涨', '油价上涨激发勘探业石油钻探设备出', '<span style=color:#505050;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:22px;>一系列产业政策的贯彻实施，得到广大防水企业的积极响应，对我国防水行业调整产业结构、实施宏观调控、推广新型防水材料、打击假冒伪劣产品、规范防水市场和推动行业技术进步，引导行业健康发展起到了有力的促进作用。（1）行业的工艺装备水平普遍提高。年产500万平方米能力改性沥青防水卷材生产线不断增多，性能更好的三元乙丙防水卷材加长硫化罐已投入运行。（2）推广应用产品明显增长，生产技术明显提高，产品结构明显改善。SBS/APP改性沥青防水卷材、高分子防水卷材、中高档防水涂料均持续增长，中高档建筑密封材料大幅度增长。（3）落实限制使用产品和技术政策有突破性进展。规范聚乙烯丙纶防水卷材生产和应用，适时开发和推广环保型防水材料等显见成效。（4）禁止使用产品和技术的政策在不同范围和程度上得到落实。淘汰年产100万卷能力石油沥青纸胎油毡生产线、煤焦油基防水涂料和密封材料等的规定都得到较好的贯彻，二次成型聚乙烯丙纶卷材已基本退出市场。（5）新产品、新技术的研究开发和引进取得多方面的成果。高分子防水卷材胶粘剂、胶粘带的开发，玻纤沥青瓦、自粘防水卷材的生产和应用技术的开发，金属卷材、金属胎卷材的研发成果，为防水工程提供了更多的选择。</span>', 2, 2, 1, 1452319039);";

//插入相册信息
$intosqls[]="INSERT INTO `lanke_photo` (`id`, `name`, `title`, `url`, `keywords`, `description`, `contents`, `thumb`, `photo`, `pid`, `bid`, `sort`) VALUES
(1, '高新技术企业', '高新技术企业', 'case-1', '高新技术企业', '高新技术企业', '本案坐落于繁华市区的江景房，业主为年轻的海归人士，在尊重建筑结构的基础上，巧妙运用西方的理性结构与现代文化元素，成就出符合人性使用的机能空间。本案坐落于繁华市区的江景房，业主为年轻的海归人士，在尊重建筑结构的基础上，巧妙运用西方的理性结构与现代文化元素，成就出符合人性使用的机能空间。', '5836b17bb1809.jpg', '530869feb247b.jpg,530869feb30f3.jpg,530869feb4c45.jpg,530869feb5357.jpg,530869feb5a6d.jpg,530869feb6146.jpg,530869feb6920.jpg,53086a8ade88c.jpg', 15, 15, 1);";

//插入广告信息
$intosqls[]="INSERT INTO `lanke_flash` (`id`, `title`, `link`, `photo`, `sort`, `isdel`, `description`, `type`) VALUES
(1, '广告一', 'http://www.lankecms.com/', '53007d7931975.jpg', 1, 0, '第一个幻灯广告', '1'),
(2, '广告二', 'http://www.lankecms.com/', '5300811240d99.jpg', 2, 0, '', '1'),
(8, '列表页背景图', '#', '5780c309432c5.jpg', 3, 0, '背景图无需填链接', '3'),
(12, '首页新闻背景图片', '无需填写', '5784bac44a3e7.jpg', 2, 0, '无需填写', '3'),
(14, '首页-关于我们背景图', '无需填写', '58046b8dc84d4.jpg', 1, 0, '无需填写', '3');";
?>