<?php

class Autoloader{
	public function __construct(){
		spl_autoload_register(array($this, 'loader'));
	}
	
	
	/**
	 * This function will attempt to autoload a class when not implicitly loaded already.
	 * A class may be placed in a subdirectory if it is called with a "\".
	 */
	private function loader($class){
		$cfg = $GLOBALS['cfg'];
		
		// Root of all Library files
		$root = ROOT.$cfg['lib']['root'];
		
		// Subdirectories which have classes, traits, abstracts, and interfaces.
		$classDir = $root.$cfg['lib']['class'].'';
		$traitDir = $root.$cfg['lib']['trait'].'';
		$abstractDir = $root.$cfg['lib']['abstract'].'';
		$interfaceDir = $root.$cfg['lib']['interface'].'';
		
		// Allow for namspaces = subdirs
		// Split on "\" and re-assemble as directory structure
		$parts = explode("\\", $class);
		$path = "";
		foreach ($parts as $part){
			$path .= "/".$part;
		}
		
		// Build filepath for each type
		$classPath = $classDir.$path.'.class.php';
		$traitPath = $traitDir.$path.'.trait.php';
		$abstractPath = $abstractDir.$path.'.abstract.php';
		$interfacePath = $interfaceDir.$path.'.interface.php';
			
		// Check each type with file_exists()
		$matches = 0;
		if(file_exists($classPath)){$load = $classPath; $matches++;}
		if(file_exists($traitPath)){$load = $traitPath; $matches++;}
		if(file_exists($abstractPath)){$load = $abstractPath; $matches++;}
		if(file_exists($interfacePath)){$load = $interfacePath; $matches++;}
		
		switch($matches){
			case 0:
				// No matches exist - throw exception
				$str = 'Class not found: '.$class.'
						Tried the following files:
						Class: '.$classPath.'
						Trait: '.$traitPath.'
						Abstract: '.$abstractPath.'
						Interface: '.$interfacePath;
				throw new Exception($str);
				break;
			case 1:
				//try {
				require $load;
				//}
				//catch (Exception $e){
				//	throw new Exception("Cannot load required class: ".$class);
				//}
				break;
			default:
				// Multiple matches exist - throw exception
				throw new Exception("Multiple classes matching: ".$class);
			break;
		}
	}
	

	/*
	 * Original Implementation inside global.php
	 spl_autoload_register(function ($class) {
	 $cfg = $GLOBALS['cfg'];
	
	 $path = ROOT.$cfg['lib']['class'];
	
	 // Allow for namspaces = subdirs
	 // Split on "\" and re-assemble as directory structure
	 $parts = explode("\\", $class);
	 foreach ($parts as $part){
	 $path .= "/".$part;
	 }
	 $path .= '.class.php';
	
	 require $path;		// TODO: Check for existence - throw error if not exist.
	 });
	 */
	
}