<?php

	
	include './MyPDO.php';
	include './function/helper.php';

	// $pdo = MyPDO::getInstance('localhost','root','','cpic','utf8');


	//插入合规人员信息表
	$excel_data = [
		[3000 , 1009],
		[1009 , 20001],
		[4568 , 3009],
	];

	$data = [
		['dept_id'   => 11,'dept_code' => '29999'],
		['dept_id'   => 2,'dept_code' => '1'],
		['dept_id'   => 3,'dept_code' => '3000'],
		['dept_id'   => 4,'dept_code' => '1009'],
		['dept_id'   => 25,'dept_code' => '4568'],
		['dept_id'   => 6,'dept_code' => '7890'],
	];
	
	$data = deptCode_id($data);
	$data = changeDeptCodeToDept_id($excel_data,$data);

	// var_dump(implode(',',$data));
	echo MyPDO::batchInsert('cpic_audit_dept',['dept_id','account_id'],$data);


	//插入评审关系表
	

