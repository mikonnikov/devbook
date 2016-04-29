-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: devbook
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
REPLACE INTO `answer` VALUES (1,'Make sure','That you use an old Mozilla version: some versions of codeception is incompatible with newest Mozilla version, so,\r\nyou need to downgrade it sometimes + disable auto-update on Mozilla settings. Else Codeception tests will not run !\r\n\r\n+ set testing env to browser in testing settings:\r\nmcedit ./tests/codeception/backend/acceptance.suite.yml\r\n- PhpBrowser => - WebDriver\r\n',1,'2016-04-29 12:30:28','http://codeception.com/',9),(2,'Note,,,','ssh2 is not pre-installed, so you need to install it manually according to instructions above',1,'2016-04-29 12:15:00','',5);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
REPLACE INTO `category` VALUES (1,'Apache',5),(2,'Data bases',NULL),(3,'Server side',NULL),(4,'Client side',NULL),(5,'Web servers',NULL),(6,'NGINX',5),(7,'YII1',3),(8,'PHP',3),(9,'JavaScript',4),(10,'HTML',4),(11,'Postgres',2),(12,'MySQL',2),(13,'YII2',3),(14,'ZEND2',3),(15,'Testing',NULL),(16,'Codeception',15);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
REPLACE INTO `language` VALUES (1,'PHP','5.5','php.net'),(2,'Postgres','','http://www.postgresql.org/'),(3,'MySQL','','http://www.mysql.com/'),(4,'CSS','3','http://www.w3schools.com/css/css3_intro.asp'),(5,'HTML','5','http://www.w3schools.com/html/html5_intro.asp');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `meta`
--

LOCK TABLES `meta` WRITE;
/*!40000 ALTER TABLE `meta` DISABLE KEYS */;
REPLACE INTO `meta` VALUES (1,'db'),(2,'sql');
/*!40000 ALTER TABLE `meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
REPLACE INTO `migration` VALUES ('m000000_000000_base',1461230200),('m130524_201442_init',1461230204),('m160422_081912_category',1461859208),('m160422_085812_language',1461859789),('m160422_100111_meta',1461859789),('m160422_150311_question',1461859789),('m160422_152811_project',1461859789),('m160428_153211_answer',1461859789);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
REPLACE INTO `project` VALUES (1,'EKH / CMS 2.0','CMS for Megafon calls tracks management.','http://cms.loc/','http://bss-ekx.megalabs.ru/','http://cms.predproduction.vasmedia.ru:9801'),(2,'HEXML','* for codeception testings: http://hexml.test/','http://hexml.loc/','','http://10.236.35.13:80/'),(3,'Multifon / B2B','Trunks management\r\n\r\nDatabases:\r\n- @local: multiphone\r\n- @local for testing: multiphone_test','http://b2b/','http://10.77.31.213/','http://10.236.35.13:8081/'),(4,'RBT','Written on python','http://rbt/','https://rbt-stat.megalabs.ru/','http://10.236.65.16:8000/'),(5,'DevBook','These project )','http://devbook/','','http://devbook.nujensait.ru/'),(6,'TestKiller','Creating/solving tests','http://testkiller/','','http://testkiller.nujensait.ru/');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
REPLACE INTO `question` VALUES (1,'Kartik widget error','Error on usage with ActiveQuery func:\r\n    /**\r\n     * @return \\yii\\db\\ActiveQuery\r\n     */\r\n    public function getCategories()\r\n    {\r\n        return $this->hasMany(Category::className(), [\'parent_id\' => \'id\']);\r\n    }\r\n',1,3,1,1,'2016-04-27 18:50:53','2016-04-25 13:23:43','Use array for data, not ActiveQuey:\r\n/**\r\n * @return array\r\n */\r\npublic function getCategoriesList()\r\n{\r\n    return \\yii\\helpers\\ArrayHelper::map(\\common\\models\\Category::find()->all(), \'id\', \'name\');\r\n}\r\n','htmlspecialchars() expects parameter 1 to be string, object given','http://www.yiiframework.com/forum/index.php/topic/70289-kartik-select-expected-string-object-given/',0,NULL),(5,'SSh2 connect error','ssh2 connection failed in coide like:\r\n$res = ssh2_connect(...);\r\n\r\n- question appears during solving problem of remote connection to MySQL server',5,8,1,1,'2016-04-26 09:09:49','2016-04-26 09:09:49','# install ssh2: http://php.net/manual/ru/ssh2.installation.php\r\nsudo pecl channel-update pecl.php.net\r\nsudo apt-get install libssh2-1-dev\r\nsudo pecl install -a ssh2-0.12\r\necho \'extension=ssh2.so\' | sudo tee /etc/php5/mods-available/ssh2.ini > /dev/null\r\nsudo php5enmod ssh2\r\n','Fatal error:  Call to undefined function ssh2_connect() in /home/mike/dev/exp/db/remote_mysql_conn.php on line 57','http://stackoverflow.com/questions/464317/connect-to-a-mysql-server-over-ssh-in-php',0,NULL),(7,'Yii GridView shortcodes','Which shortcodes can I use in GridView for table output on index page?',5,13,1,1,'2016-04-26 13:03:06','2016-04-26 13:03:06','<?= GridView::widget([\r\n \'dataProvider\' => $dataProvider,\r\n\'columns\' => [\r\n \'Title\', // same as \'Title:text\'\r\n \'Snippet:html\', // will be HTML purified\r\n \'Description:ntext\', // plaintext but new lines as <br>\r\n \'Email:email\', // will be shown as mailto: link\r\n \'WebSite:url\', // will be shown as hyperlink\r\n \'Picture:image\', // <img src=\"value of Picture column\" />\r\n \'Maried:boolean\', // true or false\r\n \'Birthdate:date\',\r\n \'Birthdate:time\',\r\n \'Birthdate:datetime\',\r\n \'Birthdate:timestamp\',\r\n \'Size:integer\',\r\n \'Cost:spellout\', // number as text\r\n \'DiskSize:size\', // as bytes, for example `12 kilobytes`\r\n \'Size:decimal\',\r\n \'Ratio:percent\',\r\n ]\r\n);\r\n?>','','https://silverdecisions.wordpress.com/2015/03/27/simple-colum-formatting-in-yii-2-gridview/',0,NULL),(8,'XHprof default dir missing','',1,13,1,1,'2016-04-26 15:08:01','2016-04-26 15:08:01','Trying /tmp as default. You can either pass the directory location as an argument to the constructor for XHProfRuns_Default() or set\r\nxhprof.output_dir ini param\r\n\r\nmkdir -p /tmp/xhprof\r\nchmod -R 0777 /tmp/xhprof \r\n','15333#0: *421 FastCGI sent in stderr: \"PHP message: Warning: Must specify directory location for XHProf runs.','',0,NULL),(9,'Codeception running error','Error during running:\r\ncodecept run acceptance',2,7,1,1,'2016-04-26 15:14:12','2016-04-26 15:14:12','The reason for the Unable to connect error is that the version of Selenium does not know how to work with the version of Firefox. \r\nYou need to download a newer version of the Selenium Server that supports the newer version of Firefox.','ERROR: Unable to connect to host 127.0.0.1 on port 7055 after 45000 ms. Firefox console output ...','http://stackoverflow.com/questions/12588082/webdriver-unable-to-connect-to-host-127-0-0-1-on-port-7055-after-45000-ms',0,NULL),(10,'Postgres connection password','Unable to connect to remote database, password required',2,11,2,1,'2016-04-27 09:41:40','2016-04-27 09:41:40','Allow remote connections in DB config:\r\n\r\nsudo mcedit /etc/postgresql/9.3/main/pg_hba.conf\r\n\r\n	local   all             postgres                                peer\r\n	local   all             all                                     peer\r\n	host    all             all             127.0.0.1/32            md5\r\n	host    all             all             ::1/128                 md5\r\nchange to =>\r\n	local   all             postgres                                md5\r\n	local   all             all                                     md5\r\n	host    all             all             127.0.0.1/32            trust\r\n	host    all             all             ::1/128                 trust\r\n','[PDOException] SQLSTATE[08006] [7] fe_sendauth: no password supplied','http://stackoverflow.com/questions/13690162/rails-postgres-fe-sendauth-no-password-supplied',0,NULL),(11,'Browser tests are not running in CodeCeption','Error on runnong:\r\ncodecept run acceptance NodesCept --debug',2,16,NULL,1,'2016-04-27 09:45:28','2016-04-27 09:45:28','update server to selenium-server-standalone-2.48.2.jar:\r\n\r\nwget http://selenium-release.storage.googleapis.com/2.48/selenium-server-standalone-2.48.2.jar\r\nmv selenium-server-standalone-2.48.2.jar /home/mike/bin/selenium/server.jar\r\n\r\n+ IMPORTANT: Open browser in full-screen mode! If some interface element will not be visible (need to use scrolling, etc), testing will be failed.','','',0,NULL),(12,'User password error in Yii','Error on user create/update',2,13,1,1,'2016-04-27 09:56:19','2016-04-27 09:56:19','Add to User model:\r\n\r\npublic $password = \"\";\r\n\r\npublic function beforeSave($insert) {\r\n     if ($this->password) {\r\n          $this->setPassword($this->password);\r\n     }\r\n     return parent::beforeSave($insert);\r\n}\r\n','Getting write-only property: common\\models\\User::password','http://yiiframework.ru/forum/viewtopic.php?t=29105',0,NULL),(13,'Error in yii2 view','Error occurs while trying to use closure (\'value\' => function) in view.php',5,13,1,1,'2016-04-29 09:46:21','2016-04-29 10:34:49','DetailView image type attribute error  www.yiiframework.com/forum/index.php/topic/59934-detailview-image-type-attribute-error/\r\nin DetailView you cannot use function as return value.\r\ninstead of\r\n\'value\' => function($data) { return  $data->vehicles_logo; }\r\ndo this:\r\n\'value\' => $data->vehicles_logo,\r\n','Object of class Closure could not be converted to string','http://www.yiiframework.com/forum/index.php/topic/59934-detailview-image-type-attribute-error/',1,'jira.megalabs.ru');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` VALUES (1,'mishaikon','Sh__Mzfw-zf3CbxaRRnWwc4Liwsi5Cph','$2y$13$XxjkqigcqTcgbZ13tz3Wc.35sdAaSOZGJvIlWDGcDgxwKAmlScnci',NULL,'mishaikon@gmail.com',10,1461242604,1461664996),(2,'test','kY0a0NQ7rkMqa8fm5hDUX8kqFlCs3uqE','$2y$13$BEtbhpiuykOJ4NIZrqMqhuYQAxdW1tm8g4Tm4oAjP3O.ausXaaX/S',NULL,'test@test.ru',10,1461676741,1461834214);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-29 18:16:43
