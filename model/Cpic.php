<?php

/**
 * Created by PhpStorm.
 * User: chindor
 * Date: 2017/7/6
 * Time: 10:25
 */
class Cpic
{
    private $pdo ;

    public function __construct(MyPDO $mypdo)
    {
        $this -> pdo = $mypdo;
    }


    /*向 user_line表插入数据
     * @param $data
     * @return bool
     */
    public function insert_user_line($data)
    {
        if( empty($data) || empty($data[0]) ){
            return false;
        }

        $row = $this -> pdo -> batchInsert('cpic_user_line',['user_account_id','line'],$data);
        if(empty($row)){
            return false;
        }

        return true;
    }

    /**向 user_path中插入数据
     * @param $data
     * @return bool
     */
    public function insert_user_path($data)
    {
        if( empty($data) || empty($data[0]) ){
            return false;
        }

        $row = $this -> pdo -> batchInsert('cpic_user_path',['user_account_id','path'],$data);
        if(empty($row)){
            return false;
        }

        return true;
    }

    /**向 user_dept中插入数据
     * @param $data
     * @return bool
     */
    public function insert_user_dept($data)
    {
        if( empty($data) || empty($data[0]) || empty($data[0][1]) ){
            return false;
        }

        $row = $this -> pdo -> batchInsert('cpic_user_dept',['user_account_id','dept_id','job'],$data);
        if(empty($row)){
            return false;
        }

        return true;
    }

    /**向cpic_user_rater表中插入数据
     * @param $data
     * @return bool
     */
    public function insert_cpic_user_rater($data)
    {
        if(empty($data) || empty($data[0][0])){
            return false;
        }

        $row = $this -> pdo -> batchInsert('cpic_user_rater',['user_account_id','rater_account_id'],$data);

        if(empty($row)){
            return false;
        }

        return true;
    }




}