<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/25 0025
 * Time: 14:56
 */

namespace app\home\controller;


use think\Db;

class Active extends Home
{
    //展示页面
 public function index(){
     $rows = \app\admin\model\Seller::paginate(5);
    $this->assign('rows',$rows);
    return $this->fetch();
 }
 public function look($id){
    $row =  Db::name('seller')->find(['id'=>$id]);
    $this->assign('row',$row);
    return $this->fetch('lists');
 }
}