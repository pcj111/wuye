<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/24 0024
 * Time: 11:33
 */

namespace app\home\controller;


use app\admin\model\Notice;

class Inform extends Home
{
    //展示页面
   public function index(){

        $rows = Notice::paginate('5');
        $this->assign('rows',$rows);
       return $this->fetch('index');
   }
   public function lists($id){
       $model = new Notice();
       $row = $model->find(['id'=>$id]);
       //var_dump($row);
       $row->rate+=1;
       $row->save();
       $this->assign('row',$row);
       return $this->fetch('inform');
   }
}