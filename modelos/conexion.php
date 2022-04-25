<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=us-cdbr-east-05.cleardb.net;dbname=heroku_c5917fffcc84237",
			            "b7761fe99ff4f5",
			            "aaee8237");

		$link->exec("set names utf8");

		return $link;

	}

}
