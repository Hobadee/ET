<?php
/*
 * This is where all global hard config data should be stored
 * Database connection info, password, salt, etc...
 */



$cfg['log']['UACheck'] = TRUE;					// Check for proper UA?  FALSE enables logging all requests.


$cfg['log']['debug'] = "/log/debug.html";		// Location of Debug Log.

// Where are libraries (classes, interfaces, abstracts, traits) stored?
$cfg['lib']['root'] 		= '/lib';					// This is the root of where class libraries are stored
$cfg['lib']['abstract']		= '/';						// This is the subdirectory which has abstract classes
$cfg['lib']['class'] 		= '/';						// This is the subdirectory which has classes
$cfg['lib']['interface'] 	= '/';						// This is the subdirectory which has interfaces
$cfg['lib']['trait']		= '/';						// This is the subdirectory which has traits

// DB config
$cfg['db']['host'] 			= "localhost";				// This is wrong.
$cfg['db']['port'] 			= "3306";
$cfg['db']['user'] 			= "ET";
$cfg['db']['pass'] 			= "";
$cfg['db']['database'] 		= "ET";

// Force $cfg to be a superglobal.
global $cfg;
