<?php
/*
 * 
 * Global library for all everythings!!!!
 * For the wins!!!!!!!
 * 
 */
define("ROOT", getcwd());			// This is the root of the PHP file structure - used for includes and whatnot...

// Load all config info.  We don't really need it here, but someone else most likely does.
require_once ROOT.'/config/config.php';
require_once ROOT.'/config/const.php';

if(DEBUG){
	// If DEBUG is set, display all errors.
	ini_set('display_errors',1);
	error_reporting(E_ALL);
}
else{
	// DEBUG is not set - explicitly disable error display!
	ini_set('display_errors',0);
}


/*
 * Setup the class Autoloader
 */
require_once ROOT.'/lib/Autoloader.class.php';
$autoloader = new Autoloader();


/**
 * This function will check if a GET variable is set.  If set, it will return the value and if unset it
 * will return an empty string.
 *
 * This function is useful for setting local $_GET variables
 *
 * Usage:
 * $var = get("var");
 *
 * @param string $var GET variable to check.
 * @return string Value of GET variable if set, empty string if unset
 */
function get($var){
	if(isset($_GET[$var])){
		return $_GET[$var];
	}
	else{
		return "";
	}
}


/**
 * This function will check if a POST variable is set.  If set, it will return the value and if unset it
 * will return an empty string.
 *
 * This function is useful for setting local $_POST variables
 *
 * Usage:
 * $var = post("var");
 *
 * @param string $var POST variable to check.
 * @return string Value of POST variable if set, empty string if unset
 */
function post($var){
	if(isset($_POST[$var])){
		return $_POST[$var];
	}
	else{
		return "";
	}
}


/**
 * This function will check if a variable is set.  If set, it will return the value and if unset it
 * will return an empty string.
 *
 * This function is useful for testing $_REQUEST[] variables
 *
 * Usage:
 * $var = request($_REQUEST['var']);
 *
 * @param string $var Reference to variable.
 * @return string Value of REQUEST if set, empty string if unset
 */
function request($var){
	if(isset($_REQUEST[$var])){
		return $_REQUEST[$var];
	}
	else{
		return "";
	}
}


/**
 * This function will check if a variable is set.  If set, it will return the value and if unset it
 * will return an empty string.
 * 
 * This function is useful for testing $_REQUEST[] variables
 * 
 * Usage:
 * $var = request($_REQUEST['var']);
 * 
 * @param reference $request Reference to variable.
 * @return string $request if set, empty string if unset
 */
function requestRef(&$request){
	if(isset($request)){
		return $request;
	}
	else{
		return "";
	}
}


/**
 * Generic debug() function.
 * Currently will simply print $var to stdout if DEBUG is set.
 * Will intelligently handle arrays and objects and print_r() them.
 * @param mixed $var Variable to print
 * @param bool $disabled If TRUE, don't print any debug messages
 */
function debug($var, $disabled=FALSE){
	
	// Only run if DEBUG constant is enabled.
	if(DEBUG && !$disabled){
		$error = "";
		$error .= "<div>";
		
		// Throw an Exception so we can get a backtrace and print where we are called from;
		try{
			throw new Exception("Debug");
		}
		catch(Exception $e){
			$trace = $e->getTrace();
			$trace = $trace[0];
			//var_dump($trace);
			$error .= "Debug:".$trace["file"].":L".$trace['line'];
			$error .= "<br />";
		}
		finally {
			$type = gettype($var);
			switch($type){
				case "boolean":
					if($var){
						$error .= "TRUE";
					}
					else{
						$error .= "FALSE";
					}
					break;
				case "integer":
				case "double":
				case "string":
					$error .= $var."<br />";
					break;
				case "array":
				case "object":
					$error .= "<pre>";
					$error .= print_r($var,TRUE);
					$error .= "</pre>";
					break;
				case "resource":
					$error .= "Debug variable is resource!<br />";
					break;
				case "NULL":
					$error .= "Debug variable is NULL!<br />";
					break;
				default:
					$error .= "Debug variable is unknown type!<br />";
					break;
			}
		}
		$error .= "<br /></div>";
		
		echo $error;
		//enable logging in future:
		//file_put_contents($GLOBALS['cfg']['log']['debug'],$error,FILE_APPEND);
	}
}


