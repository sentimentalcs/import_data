<?php 

	/**将数据库中的数据转为 dept_code=>dept_id的数据
	 * [deptCode_id description]
	 * @return [type] [description]
	 */
	function deptCode_id($data)
	{	
		$arr = [];
		foreach($data as $k => $v){
			$arr[$v['dept_code']] = $v['dept_id'] ;
		}

		return $arr;
	}

     // insert into table ('account_id','dept_id') values ('acount_Id','dept_id'),(''),
	/**
	 * 将excel中的dpet_code 转为 dept_id;
	 * @return [type] [description]  excelzhong 的数据
	 * @return [type] [description]	 assoc中的数组 已经通过deptCode_id函数转换过的函数
	 */
	function changeDeptCodeToDept_id($data,$assoc=[])
	{
		array_walk($data,function(&$item,$key,$assoc){
			$item[0] = $assoc[$item[0]];
		},$assoc);

		return $data;
	}