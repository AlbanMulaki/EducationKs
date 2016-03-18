<?php
	/*
		Local use
		_________
		dev.autopub -> .dev.env
		prod.autopub -> .production.env

		IP
		______
		ipremote/dev -> .dev.env
		ipremote/prod -> .production.env

		Remote
		________
		dev.auto.pub -> .public.env
	*/

	$request = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	list($domain, $area) = explode('/', $request);

	$environmentLevel = array('pub'=>"public",
		'dev'=>"development",
		"prod"=>"production");


	// Detect Environment
	switch ($domain) {
		case 'dev.auto.pub':
			$env = $environmentLevel['pub'];
			break;
		case 'prod.autopub':
			$env = $environmentLevel['prod'];
			break;
		case 'dev.autopub':
			$env = $environmentLevel['dev'];
			break;
		default:
			if($area == 'dev'){
				$env = $environmentLevel['dev'];
			}else if($area == 'prod'){
				$env = $environmentLevel['prod']; 
			}else{
				$env = $environmentLevel['pub'];
			}
			break;
	}
	/*
	 * Fill environment value
	*/
	function detectEnv($env){
			$envFile = file("../.".$env.".env");
			foreach($envFile as $key => $value){
				if(strlen($value) > 2){
					putenv($value);
					echo "<br>".$value;
				}
			}
	}
	detectEnv($env);



?>