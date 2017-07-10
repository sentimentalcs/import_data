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

	//读取字符串的ASCII码  
	function getascii($ch) 
	{  
		if( strlen( $ch) == 1)  
		return ord($ch)-65;  
		return ord($ch[1])-38;  
	} 

	function get_data_from_sheet($allRow,$allColumn='K',$offsetRow='3')
	{
		 global $currentSheet;
		 for ($currentRow = $offsetRow; $currentRow <= $allRow; $currentRow++) {  
		        $flag = 0;  
		        $col = array();  
		        for ($currentColumn = 'A'; getascii($currentColumn) <= getascii($allColumn); $currentColumn++) {  
		  
		            $address = $currentColumn . $currentRow;  
		  
		            $string = $currentSheet->getCell($address)->getValue();  
		  
		            $col[$flag] = $string;  
		  
		            $flag++;  
		        }  
		        $all[] = $col;  
		  } 

		  return $all;
	}

    /**对 sheet2中解析出来的数据进行解析
     * @param $sheet2Data
     * @param $dept_data
     * @return array
     */
	function filter_sheet_2($sheet2Data,$dept_data)
    {
        $line =  [1 => '个险', 2 => '健养', 3 => '营运', 4 => '后援'];
        $line = array_flip($line);

        $sheet2Data = array_filter($sheet2Data,function($value){
            return !empty($value[0])&&!empty($value[7]);
        });

        if(empty($sheet2Data) || empty($sheet2Data[0])){
            return false;
        }

        array_walk($sheet2Data,function(&$data,$key,$dept_data) use($line){
            $GLOBALS['user_path_data'][]= [(string) $data[0],$data[4]];
            $GLOBALS['user_line_data'][]= [(string) $data[0],(int) filter_empty_data($line[$data[6]])];
            $GLOBALS['user_dept_data'][]= [(string) $data[0],$dept_data[$data[7]],$data[5]];
            $GLOBALS['user_rater_data'][]= [(string) $data[0],$data[8]] ;
        },$dept_data);

        //对数据进行去重处理
        $GLOBALS['user_path_data'] = unqiue_data($GLOBALS['user_path_data']);
        $GLOBALS['user_line_data'] = unqiue_data($GLOBALS['user_line_data']);
        $GLOBALS['user_dept_data'] = unqiue_data($GLOBALS['user_dept_data']);
        $GLOBALS['user_rater_data'] = array_filter(unqiue_data($GLOBALS['user_rater_data']),function($value){
            return !empty($value[1]);
        });

        return $sheet2Data;
    }

    /**对二维数组进行去重
     * @param $arr
     * @return array\
     */
    function unqiue_data($arr)
    {
        $arr = array_map(function($value){
            return json_encode($value);
        },$arr);

        $arr= array_unique($arr);

        return array_map(function($value){
            return json_decode($value,true);
        },$arr);
    }

    function filter_empty_data($arr){
	    return empty($arr)?'':$arr;
    }

	function filter_empty($arr)
	{
		return array_filter($arr,function($value){
			return !empty($value[0]) && !empty($value[1]);
		});
	} 


