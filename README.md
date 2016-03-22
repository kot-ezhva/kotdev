# kotdev
Engine for LandingPage's

Install:
-------------------------------------------
**1.** Clone repo. Use command: ```git clone https://github.com/kot-ezhva/kotdev```

**2.** Create db-config to your base in ```/protected/config/database.php```

**3.** /protected/config/database.php:
```
return [
	'connectionString' => 'mysql:host=localhost;dbname=YOUR_BASE_NAME',
	'emulatePrepare' => true,
	'username' => 'YOUR_BASE_USERNAME',
	'password' => 'YOUR_BASE_PASSWORD',
	'charset' => 'utf8',
];
```

**4.** Run console command in webroot: ```php kotdev/yiic migrate```

**5.** login in: ```http://example.com/kotdev``` Use default login: ```admin``` and password ```admin```
