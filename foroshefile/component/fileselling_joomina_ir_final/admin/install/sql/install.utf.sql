CREATE TABLE IF NOT EXISTS `#__joominafs` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `catid` int(11) unsigned NOT NULL COMMENT 'Category ID',
  `checked_out` int(11) unsigned NOT NULL,
  `filename` text NOT NULL,
  `name` text NOT NULL,
  `price` varchar(50) NOT NULL,
  `hit` varchar(50) NOT NULL,
  `type` varchar(5) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM ;

CREATE TABLE IF NOT EXISTS  `#__joominafs_seting` (
  `id` int(11) NOT NULL,
  `yourname` varchar(255) NOT NULL,
  `cellphone` varchar(255) NOT NULL,
  `merchantid` text NOT NULL,
  `usercell` varchar(255) NOT NULL,
  `passcell` varchar(255) NOT NULL,
  `peacfull` varchar(10) NOT NULL,
  `peaclink` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=InnoDB;
INSERT INTO `#__joominafs_seting` (
`id` ,
`yourname` ,
`cellphone` ,
`merchantid` ,
`usercell` ,
`passcell` ,
`peacfull` ,
`peaclink`
)
VALUES (
'0', 'گروه طراحان وب جومینا', '0912...', 'کد 36 رقمی قابل دریافت از زرین پل', 'ir-payamak.com', 'password', 'joomina', 'joomina.ir'
);