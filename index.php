<?php 
/**
 * Javelinee - Minimalist CMS Framework for Agency, Marketing, Personal and Corporate.
 * 
 * @version: 2.4
 * @author: M ABD AZIZ ALFIAN <aalfiann@gmail.com>
 * @copyright 2014 - 2016 Javelinee
 * @license: You have lifetime license of this source code if you buy from javelinee.com
 * 
 */

	// INCLUDES
	include 'acp/model/dev.mode.php';
	include 'acp/config.php';
	include 'acp/config.seo.php';
	include 'acp/config.s.seo.php';
	include 'acp/model/database.php';
	include 'acp/model/page.php';
	include 'acp/model/safe.php';
	include 'acp/model/rss.php';
	include 'acp/model/sitemap.php';

	// GET PAGE
	page::route();
?>