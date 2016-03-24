<?php

/**
 * 
 * Client requests file from this server.
 * Server logs data, including a few extra GET/POST fields
 * Server responds with .sh shell file.
 * Client executes .sh file  (Default is just `/dev/null`)
 * 
 */

// Start an output buffer.  We don't want a client to download errors or headers and try to execute them.

require_once 'lib/global.php';


// Variables we should be getting from the request header.
$ip;			// Public IP address of the machine phoning home.
$fqdn;			// 
$hostname;		// 
$user_agent;	// Should be a pre-defined value from the client.  If it doesn't match it can be ignored.  (We are being hit by a web browser or something else; no the ET script.)
$serial;		// Serial number of the machine phoning home
$status;		// The return value or brief text of the previous run.
$payload;		// A file of something else which was requested or generated from the previous script.  Sent as POST data.

$command;


if($cfg['log']['UACheck'] && $user-agent != USER_AGENT){
	// User-agent isn't valid.  Probably a web browser hitting us.  Exit.
	exit(0);
}


$db = new Database();

$ip = $db->sanitize($ip);
$fqdn = $db->sanitize($fqdn);
$hostname = $db->sanitize($hostname);
$user_agent = $db->sanitize($user-agent);
$serial = $db->sanitize($serial);
$status = $db->sanitize($status);
// Proper way to sanitize a BLOB???
//$payload = $db->sanitize($payload);

$sql = 'INSERT INTO';

$result = $db->query($sql);
if(!$result){
	// Check if there was an error inserting...?
}


$sql = 'SELECT *
		FROM `etCommand` AS e
		WHERE `e.serial` == "'.$serial.'"
		;';

$result = $db->query($sql);
// Parse result and return to client

// Check if result exists.  If not return a /dev/null command.


// Clear the output buffer.  (Disable if debug)  Start actual output.
// Send nessesary headers to make it look like a file?

if($result){
	//Parse result and return code to client
}
else{
	/*
#!/bin/sh
sh /dev/null
	*/
}










		