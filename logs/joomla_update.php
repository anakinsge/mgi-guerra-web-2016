#
#<?php die('Forbidden.'); ?>
#Date: 2015-11-19 17:10:49 UTC
#Software: Joomla Platform 13.1.0 Stable [ Curiosity ] 24-Apr-2013 00:00 GMT

#Fields: datetime	priority clientip	category	message
2015-11-19T17:10:49+00:00	INFO 192.168.0.46	update	Update started by user Super User (390). Old version is 3.4.4.
2015-11-19T17:10:51+00:00	INFO 192.168.0.46	update	Downloading update file from https://github.com/joomla/joomla-cms/releases/download/3.4.5/Joomla_3.4.4_to_3.4.5-Stable-Patch_Package.zip.
2015-11-19T17:10:53+00:00	INFO 192.168.0.46	update	File Joomla_3.4.4_to_3.4.5-Stable-Patch_Package.zip successfully downloaded.
2015-11-19T17:10:54+00:00	INFO 192.168.0.46	update	Starting installation of new version.
2015-11-19T17:12:08+00:00	INFO 192.168.0.46	update	Update started by user Super User (390). Old version is 3.4.4.
2015-11-19T17:12:09+00:00	INFO 192.168.0.46	update	File Joomla_3.4.4_to_3.4.5-Stable-Patch_Package.zip successfully downloaded.
2015-11-19T17:12:09+00:00	INFO 192.168.0.46	update	Starting installation of new version.
2015-11-19T17:12:10+00:00	INFO 192.168.0.46	update	Finalising installation.
2015-11-19T17:12:10+00:00	INFO 192.168.0.46	update	Deleting removed files and folders.
2015-11-19T17:12:14+00:00	INFO 192.168.0.46	update	Cleaning up after installation.
2015-11-19T17:12:14+00:00	INFO 192.168.0.46	update	Update to version 3.4.5 is complete.
2016-03-22T16:33:45+00:00	INFO 192.168.0.27	update	Update started by user Santiago Guerra (390). Old version is 3.4.4.
2016-03-22T16:33:50+00:00	INFO 192.168.0.27	update	Downloading update file from https://github.com/joomla/joomla-cms/releases/download/3.5.0/Joomla_3.5.0-Stable-Update_Package.zip.
2016-03-22T16:34:21+00:00	INFO 192.168.0.27	update	File Joomla_3.5.0-Stable-Update_Package.zip successfully downloaded.
2016-03-22T16:34:21+00:00	INFO 192.168.0.27	update	Starting installation of new version.
2016-03-22T16:34:24+00:00	INFO 192.168.0.27	update	Finalising installation.
2016-03-22T16:34:24+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2015-07-01. Query text: ALTER TABLE `#__session` MODIFY `session_id` varchar(191) NOT NULL DEFAULT '';.
2016-03-22T16:34:25+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2015-07-01. Query text: ALTER TABLE `#__user_keys` MODIFY `series` varchar(191) NOT NULL;.
2016-03-22T16:34:25+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2015-10-13. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2016-03-22T16:34:25+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2015-10-26. Query text: ALTER TABLE `#__contentitem_tag_map` DROP INDEX `idx_tag`;.
2016-03-22T16:34:25+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2015-10-26. Query text: ALTER TABLE `#__contentitem_tag_map` DROP INDEX `idx_type`;.
2016-03-22T16:34:25+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2015-10-30. Query text: UPDATE `#__menu` SET `title` = 'com_contact_contacts' WHERE `id` = 8;.
2016-03-22T16:34:25+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2015-11-04. Query text: DELETE FROM `#__menu` WHERE `title` = 'com_messages_read' AND `client_id` = 1;.
2016-03-22T16:34:25+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2015-11-04. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2016-03-22T16:34:25+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2015-11-05. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2016-03-22T16:34:25+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2015-11-05. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2016-03-22T16:34:25+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2016-02-26. Query text: CREATE TABLE IF NOT EXISTS `#__utf8_conversion` (   `converted` tinyint(4) NOT N.
2016-03-22T16:34:25+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2016-02-26. Query text: INSERT INTO `#__utf8_conversion` (`converted`) VALUES (0);.
2016-03-22T16:34:25+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` DROP INDEX `idx_link_old`;.
2016-03-22T16:34:25+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` MODIFY `old_url` VARCHAR(2048) NOT NULL;.
2016-03-22T16:34:26+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` MODIFY `new_url` VARCHAR(2048) NOT NULL;.
2016-03-22T16:34:26+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` MODIFY `referer` VARCHAR(2048) NOT NULL;.
2016-03-22T16:34:26+00:00	INFO 192.168.0.27	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` ADD INDEX `idx_old_url` (`old_url`(100));.
2016-03-22T16:34:26+00:00	INFO 192.168.0.27	update	Deleting removed files and folders.
2016-03-22T16:35:54+00:00	INFO 192.168.0.27	update	Cleaning up after installation.
2016-03-22T16:35:54+00:00	INFO 192.168.0.27	update	Update to version 3.5.0 is complete.
