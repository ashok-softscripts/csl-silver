<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	"type" => 'MySQLDatabase',
	"server" => 'localhost',
	"username" => 'root',
	"password" => 'root',
	"database" => 'SS_mysite',
	"path" => '',
);

// Set the site locale
i18n::set_locale('en_US');

// Set theme
SSViewer::set_theme('csl');

// default login
Security::setDefaultAdmin("admin","password");

// dev mode
Director::set_environment_type("dev");

