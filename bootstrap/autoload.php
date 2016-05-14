<?php

	namespace Lemax;
	use Lemax\Migrate as Migrate;
	use Lemax\medoo as medoo;

	require  './bootstrap/Migrates.php';

	$red = "\033[31m";
	$white = "\033[37m";
	$green = "\033[32m";
	$no_color = "\033[0m";
	$yellow = "\033[33m";

	class Lemax extends Migrate {
		function handle_request($command){
			switch (@$command[1]) {
				case 'run':
					$this->serve_project();
				break;
				case 'make:route':
					$this->new_route($command[2],$command[3]);
				break;
				case 'make:migration':
					$this->make_migration($command[2]);
				break;
				default:
					global $red;
					global $white;
					global $green;
					global $no_colo;
					global $yellow;
					echo $white."\nLemax version 2.0 Beta\n".$no_color
					.$white."\nAvailable commands : \n".$no_color
					.$green."    run 				".$white."run the project \n".$no_color
					.$green."    make:route	      [ NAME ]	        ".$white."make the route".$red." With *Module \n".$no_color
					.$green."    make:route 	      [ NAME ]  -n      ".$white."make the route".$red." WithOut *Module \n"
					.$green."    make:migration    [ NAME ]          ".$white."make the migration\n"
					.$no_color
					.$green."    make:css 	      [ NAME ]          ".$white."make the css file \n".$no_color
					.$green."    make:js 	      [ NAME ]          ".$white."make the js file \n\n".$no_color
					.$green."    publish	             	 ".$white.">> Compress the project << \n"."              			 Ready project for publish \n".$no_color
					."Authors : \n"
					.$yellow."    Alireza Josheghani\n"
					."    Mohammad Hosein Ebadollahi\n\n"
					.$no_color."Credit : \n"
					.$yellow."    Github : https://github.com/josheghani-dev/lemax\n"
					."    Packagist : https://packagist.org/packages/lemax/installer\n"
					."    Webpage : http://lemax.ir\n\n".$no_color;
				break;
			}

		}

		function new_route($route_name,$option){
			global $red;
			global $green;
			global $yellow;
			global $no_color;
			if (isset($option) && @$option == "--no-module") {
				if (!empty(@$route_name)) {
					echo $green.
						"Route Created Successfully !\n".
					$no_color;
				} else {
					echo $red.
						"Enter name of the route\n".
					$no_color;
				}
			} else {
				if (!empty(@$route_name)) {
					echo $green.
						"Route Created Successfully !\n".
					$no_color;
					echo $green.
						"Module Created Successfully !\n".
					$no_color;
				} else {
					echo $red.
						"Enter name of the route\n".
					$no_color;
				}
			}
		}

		function serve_project(){
			global $red;
			global $green;
			global $yellow;
			global $no_color;
			if (file_exists('index.php')) {
				echo "The Project now running on \033[32mhttp://localhost:8585\033[0m\n";
				echo "Press ctrl-c to quit\n";
				echo "Listening on http://localhost:8585 ...\n";
				system('php -S localhost:8585');
			} else {
				global $red;
				global $no_color;
				echo $red."\n    >> The Lemax Project has been crashed <<\n";
				echo "    >> Run This Command : [ php lmax upgrade ] <<\n\n".$no_color;
			}
		}

		function create_css_file($name){
			global $red;
			global $green;
			global $yellow;
			global $no_color;
			echo $green."The $name css file has been created successfully !\n".$no_color;
			echo $yellow."Path : /assets/css/$name.css\n".$no_color;
		}

		function make_migration($name){
			global $red;
			global $green;
			global $yellow;
			global $no_color;
			if (!empty($name)) {
				$migname = time()."create_".$name.".php";
				$route = __DIR__."../../Migrations/".$migname;
				$create_migration = fopen($route, "w");
				$depen = "./core/dependencies/migration.lmax.php";
				$template = file_get_contents($depen);
				$replace = str_replace('{name}', $name, $template);
				fwrite($create_migration, $replace);
				echo $green."The $name migration has been created successfully !\n".$no_color;
				echo $yellow."Path : /Migrations/$migname\n".$no_color;
				fclose($create_migration);
			} else {
				echo $red.">> Enter name of the migration <<\n".$no_color;
			}
		}

		function public_route(){
			require './public/index.php';
		}

	}

?>
