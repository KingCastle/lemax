<?php

	$PATH = ['./core/database/'];
	$files = scandir($PATH[0]);
	$i = 0;
	while ($i <= count($files)-1) {
		echo $files[$i];
		if ($files[$i] == "." || $files[$i] == "..") {
			unset($files[$i]);
		} else {
			$path = $PATH[0].$files[$i++];
			include($path);
		}
	}
	class Lemax {
		function handle_request($command){
			switch (@$command[1]) {
				case 'make:route':
					$this->new_route($command[2],$command[3]);
				break;
				default:
					echo $this->Le_color('white').
						"Leymax version 1.1 BETA\n"
					.$this->Le_color('white').
						"\nAvailable commands : \n"
					.$this->Le_color('default').$this->Le_color('green').
						"    run	                   	   	   ".$this->Le_color('white')."run the project \n".$this->Le_color('default').$this->Le_color('white')."create the new project \n".$this->Le_color('default').$this->Le_color('green').
						"    make:route	  [ NAME ]  		   ".$this->Le_color('white')."make the route".$this->Le_color('red')." With *Module \n".$this->Le_color('default').
						$this->Le_color('green').
						"    make:route    [ NAME ]  --no-module    ".$this->Le_color('white')."make the route".
						$this->Le_color('red')." WithOut *Module \n".$this->Le_color('default').$this->Le_color('green').
						"    make:css	  [ NAME ]    		   ".$this->Le_color('white')."make the css file \n".$this->Le_color('default').$this->Le_color('green').
						"    make:js	  [ NAME ]   		   ".$this->Le_color('white')."make the js file \n\n".$this->Le_color('default').
						"Credit : \n"."    Alireza Josheghani\n".$this->Le_color('default').
						"    WebPage : http://lemax.ir\n\n".$this->Le_color('default');
				break;
			}

		}

		function new_route($route_name,$option){
			if (isset($option) && @$option == "--no-module") {
				if (!empty(@$route_name)) {
					echo $this->Le_color('green').
						"Route Created Successfully !\n".
					$this->Le_color('default');
				} else {
					echo $this->Le_color('red').
						"Enter name of the route\n".
					$this->Le_color('default');
				}
			} else {
				if (!empty(@$route_name)) {
					echo $this->Le_color('green').
						"Route Created Successfully !\n".
					$this->Le_color('default');
					echo $this->Le_color('green').
						"Module Created Successfully !\n".
					$this->Le_color('default');
				} else {
					echo $this->Le_color('red').
						"Enter name of the route\n".
					$this->Le_color('default');
				}
			}
		}

		function Le_color($color){
			switch (@$color) {
				case 'white':
					return "\033[37m";
				break;
				case 'red':
					return "\033[31m";
				break;
				case 'green':
					 return "\033[32m";
				break;
				case 'default':
					return "\033[0m";
				break;
			}
		}

	}

?>
