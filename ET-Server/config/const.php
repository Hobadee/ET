<?php

define("USER_AGENT", "ET_V.1.0");		// User-Agent string.  MUST match the UA-string on the client side.

define("DEBUG", TRUE);  // Set to FALSE for production servers

// API Error code definitions
define('ERR_NO_RESULT', '10');
define('ERR_REQUEST_LIMIT', '11');

// Generic unknown error code
define('ERR_UNKNOWN', '-1');
define('ERR_GENERIC', '-2');

define('BRANCH', 'master');
define('VERSION', '');