<?php
/*
 * This is where all globa hard config data should be stored
 * Database connection info, password, salt, etc...
 */


$cfg['log']['debug'] = "/log/debug.html";		// Location of Debug Log.


// Where are libraries (classes, interfaces, abstracts, traits) stored?
$cfg['lib']['root'] 		= '/lib';					// This is the root of where class libraries are stored
$cfg['lib']['abstract']		= '/';						// This is the sibdirectory which has abstract classes
$cfg['lib']['class'] 		= '/';						// This is the sibdirectory which has classes
$cfg['lib']['interface'] 	= '/';						// This is the sibdirectory which has interfaces
$cfg['lib']['trait']		= '/';						// This is the sibdirectory which has traits

// DB config
$cfg['db']['host'] 			= "localhost";				// This is wrong.
$cfg['db']['port'] 			= "3306";
$cfg['db']['user'] 			= "impactET";
$cfg['db']['pass'] 			= "";
$cfg['db']['database'] 		= "et";

// Force $cfg to be a superglobal.
global $cfg;
