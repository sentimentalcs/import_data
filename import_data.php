<?php

	
	include './MyPDO.php';

	$pdo = MyPDO::getInstance('localhost','root','','cpic','utf8');


	$sql = 'SELECT dept_id,dept_name FROM cpic_dept LIMIT 10';
	$res = $pdo -> query($sql);
	var_dump($res);
	exit;