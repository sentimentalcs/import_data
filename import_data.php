<?php

	
	include './MyPDO.php';
	include './function/helper.php';
	require_once __DIR__.'/vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php';
    include './model/Cpic.php';

	$pdo = MyPDO::getInstance('localhost','root','','cpic','utf8');

	$sheet = empty($_GET['sheet'])?0:$_GET['sheet'];

	if (!file_exists("uploaded.xlsx")) {
		exit("要解析的test.xlsx文件不存在" );
	}

    $objPHPExcel = PHPExcel_IOFactory::load("uploaded.xlsx");
//
    $sql = "SELECT dept_id,dept_code FROM cpic_dept";
    $data = $pdo -> query($sql);
    $data = deptCode_id($data);
	if($sheet == 1){
			
	}else if($sheet == 2){

	    //评审关系excel信息导入
        try{
            $currentSheet = $objPHPExcel -> getsheet($sheet-1);
            $allcoumn = $currentSheet -> getHighestColumn();
            $allRow   = $currentSheet -> getHighestRow();

            if(empty($data)){
                throw new \Exception('cpic_dept表中的数据为空!');
            }

            $excel_data = filter_sheet_2(get_data_from_sheet($allRow,$allcoumn='k',$offsetRow='4'),$data);

            $pdo -> beginTransaction();
            $cpic = (new Cpic($pdo));

            if( !$cpic -> insert_user_line($GLOBALS['user_line_data'])){

                //插入user_line表数据
                throw new Exception('插入user_line表失败');
            }

            if(!$cpic -> insert_user_path($GLOBALS['user_path_data'])){

                //插入user_path表数据
                throw new Exception('插入user_path表失败');
            }

            if(!$cpic -> insert_user_dept($GLOBALS['user_dept_data'])){

                //插入user_dept表数据
                throw new Exception('插入user_dept表失败');
            }

            if(!$cpic -> insert_cpic_user_rater($GLOBALS['user_rater_data'])){

                //插入user_dept表数据
                throw new Exception('插入user_rater_data表失败');
            }

            $pdo -> commit();
            echo '导入数据2成功';
        }catch(\Exception $e){
            $pdo -> rollback();
            echo $e -> getMessage();
        }

	}else if($sheet == 3){

		//合规专员信息插入
		try{
              $currentSheet = $objPHPExcel -> getsheet($sheet-1);
              $currentSheet = $objPHPExcel -> getsheet($sheet-1);
			  $allcoumn = $currentSheet -> getHighestColumn();  
			  $allRow   = $currentSheet -> getHighestRow();  
			  
			  $excel_data = get_data_from_sheet($allRow,$allcoumn='B',$offsetRow='3');
			  if(empty($excel_data) || empty($excel_data[0]) || empty($excel_data[0][0])){
			  	 throw new Exception('从excel sheet3解析的数据为空!');
			  }
			  $sql = "SELECT dept_id,dept_code FROM cpic_dept";
			  $data = $pdo -> query($sql);
			  if(empty($data)){
			  	 throw new \Exception('cpic_dept表中的数据为空!');
			  }
			  $data = deptCode_id($data);
			  $data = changeDeptCodeToDept_id(filter_empty($excel_data),$data);

			  //批量插入cpic_dept数据
			  if(!empty($data)){
			  	 if($pdo -> batchInsert('cpic_dept_auditors',['dept_id','auditor_account_id'],$data)){
			  	 	return '插入cpic_dept_auditors表成功';
			  	 }else{
			  	 	throw new Exception('插入插入cpic_dept_auditors表失败');
			  	 }
			  }
			  echo '导入数据3成功';
		}catch(\Exception $e){
			echo $e->getMessage();
		}  
	}
	
	

