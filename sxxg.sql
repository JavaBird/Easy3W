/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : sxxg

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-06-17 19:11:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_s_article
-- ----------------------------
DROP TABLE IF EXISTS `t_s_article`;
CREATE TABLE `t_s_article` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Article_Title` varchar(255) DEFAULT NULL,
  `Article_Sub_Title` varchar(255) DEFAULT NULL,
  `Article_Author` varchar(255) DEFAULT NULL,
  `Article_Create_Time` datetime DEFAULT NULL,
  `Article_Content` text,
  `Article_Summary` varchar(255) DEFAULT NULL,
  `Article_Is_Top` int(11) DEFAULT '0',
  `Article_Is_Publish` int(11) DEFAULT '0',
  `Channel_Identify` varchar(255) DEFAULT NULL,
  `Channel_Parent_Identify` varchar(255) DEFAULT NULL,
  `Logo_Image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_s_article
-- ----------------------------
INSERT INTO `t_s_article` VALUES ('27', '谈支付宝红包如何打破微信QQ封锁', null, '短短的', '2015-06-12 15:06:59', '<p><a href=\"http://localhost/news/2469.html\">今年，支付宝红包高调上线，对外宣称过年发10亿红包，搞的腾讯\r\n也跟着发30亿，但实际会发多少，大家都不得而知，但大家都知道如今主流社交软件除了QQ就是微信，支付宝如何打破这道坚固的封锁墙呢？ \r\n支付宝在刚开始的时候可以分享链接到QQ或者微信，但不到10小时就遭到封杀，当然这个结果肯定在支付宝预料之内，所以支付宝又出了一个红包口令。链接可\r\n以封杀，图片口令应该封杀不了了吧。看来支付宝是下了功夫了。 除此之外，支付宝还了有个人红包、群红包 ...</a></p>', '今年，支付宝红包高调上线，对外宣称过年发10亿红包，搞的腾讯\r\n也跟着发30亿，但实际会发多少，大家都不得而知，但大家都知道如今主流社交软件', '0', '1', 'hyxw', 'xwzx', null);
INSERT INTO `t_s_article` VALUES ('28', '春节搜索引擎蜘蛛不放假，作为一个敬业的网站更新者应坚守岗位', null, 'dddddddd', '2015-06-12 15:10:00', '<p><a href=\"http://localhost/news/2477.html\">春节搜索引擎蜘蛛不放假，作为一个敬业的网站更新者应坚守岗位</a><a href=\"http://localhost/news/2477.html\">春节搜索引擎蜘蛛不放假，作为一个敬业的网站更新者应坚守岗位</a><a href=\"http://localhost/news/2477.html\">春节搜索引擎蜘蛛不放假，作为一个敬业的网站更新者应坚守岗位</a><a href=\"http://localhost/news/2477.html\">春节搜索引擎蜘蛛不放假，作为一个敬业的网站更新者应坚守岗位</a><a href=\"http://localhost/news/2477.html\">春节搜索引擎蜘蛛不放假，作为一个敬业的网站更新者应坚守岗位</a><a href=\"http://localhost/news/2477.html\">春节搜索引擎蜘蛛不放假，作为一个敬业的网站更新者应坚守岗位</a><a href=\"http://localhost/news/2477.html\">春节搜索引擎蜘蛛不放假，作为一个敬业的网站更新者应坚守岗位</a><a href=\"http://localhost/news/2477.html\">春节搜索引擎蜘蛛不放假，作为一个敬业的网站更新者应坚守岗位</a><a href=\"http://localhost/news/2477.html\">春节搜索引擎蜘蛛不放假，作为一个敬业的网站更新者应坚守岗位</a><a href=\"http://localhost/news/2477.html\">春节搜索引擎蜘蛛不放假，作为一个敬业的网站更新者应坚守岗位</a></p>', '春节搜索引擎蜘蛛不放假，作为一个敬业的网站更新者应坚守岗位春节搜索引擎蜘蛛不放假，作为一个敬业的网站更新者应坚守岗位春节搜索引擎蜘蛛不放假，', '0', '1', 'wzyh', 'xwzx', null);
INSERT INTO `t_s_article` VALUES ('29', '2015年会活动', null, 'dddddddd', '2015-06-12 15:10:44', '<p><a href=\"http://localhost/news/2471.html\">2014已经挥手告别，2015你乐意也要无奈也罢，他都悄悄的\r\n来到了你的身边，无情中已经度过月余，望大家在新的一年都能更上一层楼。方维网络特此在农历新春来临之际（2015.2.7号）方维网络组织年会活动，大\r\n家珍惜这份友情和同事亲近，在忙忙的人海中大家相识并作为同事一场是很大的缘分，故大家激情踊跃参加并奉献自己的才艺。 \r\n预祝所有同事和客户和各界朋友在新的一年里身体健康、财源广进。 什么也别说了上图 准备活动 才女表演 英姿飒爽的主持人 ...</a><a href=\"http://localhost/news/2471.html\">2014已经挥手告别，2015你乐意也要无奈也罢，他都悄悄的\r\n来到了你的身边，无情中已经度过月余，望大家在新的一年都能更上一层楼。方维网络特此在农历新春来临之际（2015.2.7号）方维网络组织年会活动，大\r\n家珍惜这份友情和同事亲近，在忙忙的人海中大家相识并作为同事一场是很大的缘分，故大家激情踊跃参加并奉献自己的才艺。 \r\n预祝所有同事和客户和各界朋友在新的一年里身体健康、财源广进。 什么也别说了上图 准备活动 才女表演 英姿飒爽的主持人 ...</a></p>', '2014已经挥手告别，2015你乐意也要无奈也罢，他都悄悄的\r\n来到了你的身边，无情中已经度过月余，望大家在新的一年都能更上一层楼。方维网络', '0', '1', 'ygtd', 'xwzx', null);
INSERT INTO `t_s_article` VALUES ('35', ' 【再签】中国建设银行-深圳分行 ', null, 'admin', '2015-06-16 04:35:31', '<p><a target=\"_blank\">热烈祝贺方维网络和建行银行深圳分行再度合作，经过一年多的合作双方配合默契，双方已经进行了多次的合作，前期项目经过深圳分行的 ...</a></p>', '热烈祝贺方维网络和建行银行深圳分行再度合作，经过一年多的合作双方配合默契，双方已经进行了多次的合作，前期项目经过深圳分行的 ...', '0', '1', 'xwzx', 'mxxg', null);
INSERT INTO `t_s_article` VALUES ('36', ' 【再签】中国建设银行-深圳分行 ', null, 'admin', '2015-06-16 04:37:53', '<p><span class=\"title_en\"></span>\r\n &nbsp; &nbsp; &nbsp; \r\n &nbsp; &nbsp; &nbsp;\r\n &nbsp; &nbsp;</p><ul class=\" list-paddingleft-2\"><li><p><a target=\"_blank\">【再签】中国建设银行-深圳分行</a></p></li><li><p><a target=\"_blank\"> 热烈祝贺方维网络和建行银行深圳分行再度合作，经过一年多的合作双方配合默契，双方已经进行了多次的合作，前期项目经过深圳分行的 ...</a></p></li></ul><p><br/></p>', '\r\n &nbsp; &nbsp; &nbsp; \r\n &nbsp; &nbsp; &nbsp;\r\n &nbsp; &nbsp;【再签】中国建', '0', '1', 'gsxw', 'xwzx', null);
INSERT INTO `t_s_article` VALUES ('37', '【签约】浙江鹏孚隆科技有限公司 ', null, 'admin', '2015-06-16 05:36:11', '<p><a>浙江鹏孚隆是多年经营，致力于不粘涂层解决方案及相关产品生产的负责任的公司，公司专注于炊具及电器用高性能涂层研究已有二十余年，持续为全球不粘产品的制造及销售企 ...</a></p><p><br/></p>', '浙江鹏孚隆是多年经营，致力于不粘涂层解决方案及相关产品生产的负责任的公司，公司专注于炊具及电器用高性能涂层研究已有二十余年，持续为全球不粘产', '0', '1', 'gsxw', 'xwzx', null);
INSERT INTO `t_s_article` VALUES ('38', '【签约】深圳智子工场官网建设 ', null, 'admin', '2015-06-16 05:36:57', '<p style=\"text-align: justify;\"><a>智子工厂是一个能够培养和锻炼孩子良好品质的平台，提高孩子动手能力。本次网站主要要求有： 网站栏目：网站首页、关于我们、作品展示、智子课程、智子社区、联系我们 ...</a></p><p>						</p>', '智子工厂是一个能够培养和锻炼孩子良好品质的平台，提高孩子动手能力。本次网站主要要求有： 网站栏目：网站首页、关于我们、作品展示、智子课程、智', '0', '1', 'gsxw', 'xwzx', null);
INSERT INTO `t_s_article` VALUES ('39', '香港升学中心', null, 'admin', '2015-06-16 07:57:32', '<p><a target=\"_blank\" href=\"http://localhost/cases/110.html\">香港升学咨询中心为一所代办到港升学、移民香港，提供一条龙服务的专业升学咨询顾问公司，办公室设于 ...</a></p>', '香港升学咨询中心为一所代办到港升学、移民香港，提供一条龙服务的专业升学咨询顾问公司，办公室设于 ...', '0', '1', 'qywz', 'cgal', 'upload/1387940358.jpg');
INSERT INTO `t_s_article` VALUES ('40', '华侨城酒店', null, 'admin', '2015-06-16 07:57:57', '<p><a target=\"_blank\" href=\"http://localhost/cases/108.html\">华侨城酒店网站主打网上预订功能，华侨城旗下有众多酒店品牌，制作一个网站平台有利于统一管理，更方便 ...</a></p>', '华侨城酒店网站主打网上预订功能，华侨城旗下有众多酒店品牌，制作一个网站平台有利于统一管理，更方便 ...', '0', '1', 'qywz', 'cgal', 'upload/1387874360.jpg');
INSERT INTO `t_s_article` VALUES ('41', '深圳市意帆游艇服务有限公司', null, 'admin', '2015-06-16 07:58:16', '<p><img alt=\"1397468539.jpg\" src=\"/sxxg/assets/upload/image/20150616/1434446932488711.jpg\" title=\"1434446932488711.jpg\"/></p><p>深圳市意帆游艇服务有限公司，是一家以游艇销售、租赁、托管、二手船艇交易为一体的专业游艇服务企业，公司总部位于享有东方夏威夷之称的深圳大鹏半岛国际\r\n旅游区，公司下设四大中心：游艇租赁中心、游艇销售中心、游艇托管中心和二手船艇交易中心。其中租赁中心遍布全国多个城市，在香港、三亚、厦门以及大连等\r\n地均有租赁服务网点；销售中心代理销售多款著名品牌游艇，比如美国顶级游艇品牌Hatteras系列豪华动力游艇及钓鱼艇、美国著名的Premier浮筒\r\n船、知名的Selene（经典老爷船）以及Artemis台湾品牌游艇等；托管中心\r\n &nbsp; &nbsp; &nbsp;</p>', '深圳市意帆游艇服务有限公司', '0', '1', 'qywz', 'cgal', 'upload/1397468527.jpg');
INSERT INTO `t_s_article` VALUES ('42', '华隆集团', null, 'admin', '2015-06-16 07:58:47', '<p><a target=\"_blank\" href=\"http://localhost/cases/138.html\">圳市华隆投资集团有限公司是经深圳市工商行政管理局批准的多元化投资控股集团，注册资本为人民币3. ...</a><br/></p>', '圳市华隆投资集团有限公司是经深圳市工商行政管理局批准的多元化投资控股集团，注册资本为人民币3. ...', '0', '1', 'qywz', 'cgal', 'upload/1397468527.jpg');
INSERT INTO `t_s_article` VALUES ('43', '基本生活-官方网店', null, 'admin', '2015-06-16 07:59:32', '<p><a target=\"_blank\" href=\"http://localhost/cases/33.html\">emoi基本生活 始于一个简单的想法：为人们带来美好愉悦的生活感受... 美好的生活是无国界的。各地 ...</a></p>', 'emoi基本生活 始于一个简单的想法：为人们带来美好愉悦的生活感受... 美好的生活是无国界的。各地 ...', '0', '1', 'dzsw', 'cgal', 'upload/1386930727.jpg');
INSERT INTO `t_s_article` VALUES ('44', '深圳市摩尼大通投资管理有限公司-钱贷网', null, 'admin', '2015-06-16 07:59:55', '<p><a target=\"_blank\" href=\"http://localhost/cases/128.html\">深圳市摩尼大通投资管理有限公司-钱贷网</a></p>', '深圳市摩尼大通投资管理有限公司-钱贷网', '0', '1', 'dzsw', 'cgal', 'upload/1401159442.jpg');
INSERT INTO `t_s_article` VALUES ('45', '澳邦乳业-澳德华园', null, 'admin', '2015-06-16 08:00:16', '<p><a target=\"_blank\" href=\"http://localhost/cases/129.html\">澳德华园是一家专业从事澳洲、新西兰原装进口奶粉、各类婴幼儿用品以及绿色健康保健品的外商独资 ...</a></p>', '澳德华园是一家专业从事澳洲、新西兰原装进口奶粉、各类婴幼儿用品以及绿色健康保健品的外商独资 ...', '0', '1', 'dzsw', 'cgal', 'upload/1401440199.jpg');
INSERT INTO `t_s_article` VALUES ('46', '【签约】深圳智子工场官网建设', null, 'admin', '2015-06-16 10:01:04', '<p>【签约】深圳智子工场官网建设【签约】深圳智子工场官网建设【签约】深圳智子工场官网建设【签约】深圳智子工场官网建设【签约】深圳智子工场官网建设【签约】深圳智子工场官网建设【签约】深圳智子工场官网建设【签约】深圳智子工场官网建设【签约】深圳智子工场官网建设【签约】深圳智子工场官网建设</p><p>						</p>', '的顶顶顶顶顶顶顶顶顶顶的', '0', '1', 'gsxw', 'xwzx', null);
INSERT INTO `t_s_article` VALUES ('47', '企业网站解决方案', null, 'admin', '2015-06-16 14:23:27', '<p>企业网站作为一个公司的网络名片，最主要的作用是展示公司形象和宣传公司的服务或产品，所以做一个企业网站，关键在于如何更好地展示公司形象和宣传公司服\r\n务或产品，做好这点，需要做好网站的页面设计、方便的内容后台管理系统、对搜索引擎友好、一个好记的域名和一个稳定的空间\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '企业网站作为一个公司的网络名片，最主要的作用是展示公司形象和宣传公司的服务或产品，所以做一个企业网站，关键在于如何更好地展示公司形象和宣传公', '0', '1', 'jjfa', 'mxxg', 'upload/1386928591.gif');
INSERT INTO `t_s_article` VALUES ('48', '旅游网站建设解决方案', null, 'admin', '2015-06-16 14:23:59', '<p>随着互联网的迅速，越多越多人，尤其是上班白领，都喜欢在网上查看旅游相关信息，然后再网上直接预定购买旅游行程。随之而来的是，旅游网站市场竞争越来越激烈，已经从线下市场逐渐蔓延到线上</p>', '随着互联网的迅速，越多越多人，尤其是上班白领，都喜欢在网上查看旅游相关信息，然后再网上直接预定购买旅游行程。随之而来的是，旅游网站市场竞争越', '0', '1', 'jjfa', 'mxxg', 'upload/1386928605.gif');
INSERT INTO `t_s_article` VALUES ('49', '手机网站建设 ', null, 'admin', '2015-06-16 14:24:28', '<p>随着智能手机的迅速发展，移动互联网时代已经到来，这带给我们是一个机遇还是危机？全取决于你能否迅速抢占先机，优先占领市场。\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '随着智能手机的迅速发展，移动互联网时代已经到来，这带给我们是一个机遇还是危机？全取决于你能否迅速抢占先机，优先占领市场。\r\n &nbsp; ', '0', '1', 'jjfa', 'mxxg', 'upload/1386928624.gif');
INSERT INTO `t_s_article` VALUES ('50', '外贸网站解决方案', null, 'admin', '2015-06-16 14:25:05', '<p>外贸网站的面向用户主要为国外客户，所以除了文字采用英文外，风格设计、页面编码、操作习惯都要适应国外客户需求。网站的风格采用欧美风格，根据网站的特点个性化设</p><p>&nbsp; &nbsp; &nbsp; &nbsp;</p><p><br/></p>', '外贸网站的面向用户主要为国外客户，所以除了文字采用英文外，风格设计、页面编码、操作习惯都要适应国外客户需求。网站的风格采用欧美风格，根据网站', '0', '1', 'jjfa', 'mxxg', 'upload/1386928642.gif');
INSERT INTO `t_s_article` VALUES ('51', '商城网站解决方案', null, 'admin', '2015-06-16 14:25:43', '<p>商城网站需要强大的后台管理系统、良好的用户购物体验、安全稳定的服务器空间，商城网站需要强大的后台管理系统、良好的用户购物体验、安全稳定的服务器空间</p>', '商城网站需要强大的后台管理系统、良好的用户购物体验、安全稳定的服务器空间，商城网站需要强大的后台管理系统、良好的用户购物体验、安全稳定的服务', '0', '1', 'jjfa', 'mxxg', 'upload/1386928669.gif');
INSERT INTO `t_s_article` VALUES ('52', '服装网站解决方案', null, 'admin', '2015-06-16 14:26:14', '<p>风格上清新明快，符合最新审美观，制作精细，有积极开放的感觉；使用流行的大区块划分概念，配合使用大广告条，突出宣传频道的特色和新功能新举措，将显著\r\n位置留给重点宣传栏目或更新最多的栏目，结合网站栏目设计在首页导航上突出层次感，使客户渐进接受</p><p><br/></p>', '风格上清新明快，符合最新审美观，制作精细，有积极开放的感觉；使用流行的大区块划分概念，配合使用大广告条，突出宣传频道的特色和新功能新举措，将', '0', '1', 'jjfa', 'mxxg', 'upload/1386928686.gif');
INSERT INTO `t_s_article` VALUES ('53', '集团上市公司解决方案 ', null, 'admin', '2015-06-16 14:26:42', '<p>随着集团上市公司的不断壮大，集团企业、上市公司的信息需要采用各种途径公众于媒体、上级领导、内部员工、投资合作者、应聘者、消费者和供应商等目标人群并与他们进行沟通,如何满足这些人群的需求，这是集团企业需要解决的问题。</p>', '随着集团上市公司的不断壮大，集团企业、上市公司的信息需要采用各种途径公众于媒体、上级领导、内部员工、投资合作者、应聘者、消费者和供应商等目标', '0', '1', 'jjfa', 'mxxg', 'upload/1386928703.gif');
INSERT INTO `t_s_article` VALUES ('54', '酒店网站解决方案', null, 'admin', '2015-06-16 14:27:17', '<p>在建设酒店网站时我们要充分考虑“酒店”的经营服务特色，因此我们在制作方案时会注重系统的实用性、可靠性、先进性和经济性原则，另外还会注意系统的扩展\r\n性为以后有可能升级打好基础，由于酒店对服务意识的高要求性，也为其服务节省时间以轻松的操作，在线、实时的进行系统管理工作。也可提高酒店现代化服务质\r\n量<br/></p>', '在建设酒店网站时我们要充分考虑“酒店”的经营服务特色，因此我们在制作方案时会注重系统的实用性、可靠性、先进性和经济性原则，另外还会注意系统的', '0', '1', 'jjfa', 'mxxg', 'upload/1386928718.gif');

-- ----------------------------
-- Table structure for t_s_attachment
-- ----------------------------
DROP TABLE IF EXISTS `t_s_attachment`;
CREATE TABLE `t_s_attachment` (
  `Attachment_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Attachment_Old_Name` varchar(255) DEFAULT NULL,
  `Attachment_New_Name` varchar(255) DEFAULT NULL,
  `Attachment_File_Type` varchar(255) DEFAULT NULL COMMENT '图片、文档(image,doc)',
  `Attachment_Path` varchar(255) DEFAULT NULL,
  `Attachment_Using` int(11) DEFAULT NULL COMMENT '附件是否被使用',
  `Attachment_Belong_Channel` varchar(255) DEFAULT NULL COMMENT '附件所属栏目标识',
  `Attachment_Author` varchar(255) DEFAULT NULL COMMENT '上传者',
  `Attachment_Upload_Time` datetime DEFAULT NULL COMMENT '上传时间',
  PRIMARY KEY (`Attachment_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_s_attachment
-- ----------------------------
INSERT INTO `t_s_attachment` VALUES ('8', 'face.css', '20150602020529.css', 'text/css', 'E:\\www\\sxxg\\protected\\assets/upload', null, 'xwzx', 'admin', '2015-06-02 14:05:29');

-- ----------------------------
-- Table structure for t_s_channel
-- ----------------------------
DROP TABLE IF EXISTS `t_s_channel`;
CREATE TABLE `t_s_channel` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Channel_Name` varchar(255) DEFAULT NULL,
  `Channel_Pid` int(11) DEFAULT NULL,
  `Channel_Is_Title` tinyint(1) DEFAULT NULL,
  `Channel_Is_Parent` varchar(255) DEFAULT NULL,
  `Channel_Is_Open` varchar(255) DEFAULT NULL,
  `Channel_Identify` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_s_channel
-- ----------------------------
INSERT INTO `t_s_channel` VALUES ('1', '山西煤销信工', '0', '0', 'true', 'true', 'mxxg');
INSERT INTO `t_s_channel` VALUES ('2', '新闻资讯', '1', '0', 'true', 'true', 'xwzx');
INSERT INTO `t_s_channel` VALUES ('3', '成功案例', '1', '0', 'true', 'true', 'cgal');
INSERT INTO `t_s_channel` VALUES ('4', '解决方案', '1', '0', 'true', 'true', 'jjfa');
INSERT INTO `t_s_channel` VALUES ('5', '关于我们', '1', '0', 'true', 'true', 'gywm');
INSERT INTO `t_s_channel` VALUES ('6', '联系我们', '1', '0', 'true', 'true', 'lxwm');
INSERT INTO `t_s_channel` VALUES ('7', '公司新闻', '2', '0', 'true', 'true', 'gsxw');
INSERT INTO `t_s_channel` VALUES ('8', '行业新闻', '2', '0', 'true', 'true', 'hyxw');
INSERT INTO `t_s_channel` VALUES ('9', '网站优化', '2', '0', 'true', 'true', 'wzyh');
INSERT INTO `t_s_channel` VALUES ('10', '员工天地', '2', '0', 'true', 'true', 'ygtd');
INSERT INTO `t_s_channel` VALUES ('11', '企业网站', '3', '0', 'true', 'true', 'qywz');
INSERT INTO `t_s_channel` VALUES ('12', '办公OA', '3', '0', 'true', 'true', 'bgoa');
INSERT INTO `t_s_channel` VALUES ('13', '集成软件', '3', '0', 'true', 'true', 'jcrj');
INSERT INTO `t_s_channel` VALUES ('14', '电子商务', '3', '0', 'true', 'true', 'dzsw');

-- ----------------------------
-- Table structure for t_s_channel_title
-- ----------------------------
DROP TABLE IF EXISTS `t_s_channel_title`;
CREATE TABLE `t_s_channel_title` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Channel_Id` int(11) DEFAULT NULL,
  `Channel_Pid` int(11) DEFAULT NULL,
  `Article_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_s_channel_title
-- ----------------------------

-- ----------------------------
-- Table structure for t_s_user
-- ----------------------------
DROP TABLE IF EXISTS `t_s_user`;
CREATE TABLE `t_s_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Create_Time` date DEFAULT NULL,
  `Login_Time` date DEFAULT NULL,
  `Enable` int(11) DEFAULT '0' COMMENT '默认不启用',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_s_user
-- ----------------------------
INSERT INTO `t_s_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-05-31', null, '1');
