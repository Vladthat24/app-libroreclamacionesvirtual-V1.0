<?php

class Conexion
{

	static public function conectar()
	{

		/* CONEXION CON EL HOSTING DIRIS LIMA SUR - MYSQL */

/*  		$link = new PDO(
			"mysql:host=localhost;dbname=dirislim_monitoreocovid19",
			"dirislim_7rhm9W9W",
			"VEDADWddlTECaEXj"
		);
		$link->exec("set names utf8");  */


/* CONEXION CON LA BASE DE DATOS LOCAL - MYSQL */

		$link = new PDO(
			"mysql:host=localhost;dbname=dirislim_libroreclamaciones",
			"root",
			"");
		$link->exec("set names utf8");
		return $link;

/* CONEXION CON LA BASE DE DATOS LOCAL OFICINA - SQL SERVER*/

/* 		$link = new PDO('sqlsrv:Server=ETF_DESARROLLO;Database=dirislim_visita', 'sa', '1597531994');
		$link->exec("set names utf8");

		return $link; */


/* CONEXION CON LA BASE DE DATOS LOCAL CASA - SQL SERVER*/
/* 		$link = new PDO('sqlsrv:Server=DESKTOP-PNO0NV8\SQLEXPRESS;Database=dirislim_visita', 'sa', '1597531994Vlad');
		$link->exec("set names utf8");

		return $link; */
	}
}
