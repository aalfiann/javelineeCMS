
I'm so sorry there is no installer to install Javelinee,
So here is how to install javelinee manually.

1. Upload all files and folder inside folder Fresh Install in your server.
2. Create database MySQL.
3. Execute file javelineemaster.sql into Your database
4. Edit file /acp/config.php and change only two this variables :

	$site['url_site'] = "localhost"; // Your url domain, Example http://javelinee.com
	$site['dir'] = ""; // Leave blank if you doesn't put the script in any folder root

5. Don't forget to save it
6. Then edit file /acp/model/database.php and change only four this variables :

	$ServerDatabase = "localhost"; // Your url domain or ip database. Example: http://javelinee.com or localhost or 127.0.0.1:3306
	$NameDatabase = "javelinee"; // Your Database Name.
	$UserDatabase = "root"; // Your Database User.
	$PasswordDatabase = "root"; // Your Password database.

7. Don't forget to save it
8. Go to url http://yourdomain.com/?p=register to create the admin user.
9. Go to url http://yourdomain.com/?p=login to login into backend
10. Go to url http://yourdomain.com/?p=admin to visit your dashboard backend
11. Done