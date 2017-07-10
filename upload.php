<?php 

	if(empty($_FILES)){
		echo  json_encode(['code'=>400,'msg'=>'没有文件上传']);
		exit;
	}

	if(!empty($_FILES['excel']['name'])){
		$base_path = __DIR__;
		$new_file_path = $base_path.DIRECTORY_SEPARATOR.'uploaded.xlsx';
		move_uploaded_file($_FILES['excel']['tmp_name'], $new_file_path);
		echo json_encode(['code'=>200,'msg'=>'文件上传成功']);
		exit;
	}else{
		echo json_encode(['code'=>400,'msg'=>'没有文件上传']);
		exit;
	}