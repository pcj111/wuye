<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/26 0026
 * Time: 15:29
 */

namespace app\home\controller;


use app\home\controller\Home;
use think\Db;

class Rental extends Home
{
   //小区租售展示列表
    public function index(){
        $rows = Db::name('rental')->where(['statr'=>1])->select();
        $rs = Db::name('rental')->where(['statr'=>0])->select();
        $this->assign(['rows'=>$rows,'rs'=>$rs]);
        return $this->fetch();
    }
    //查看内容
    public function look($id){
        $model = new \app\admin\model\Rental();
        $row = $model->find(['id'=>$id]);
        $this->assign('row',$row);
        return $this->fetch('lists');
    }

}