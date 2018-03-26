<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/24 0024
 * Time: 16:18
 */

namespace app\Home\controller;


use app\home\controller\Home;
use app\home\model\Sign;
use think\Db;

class Retive extends Home
{
    //展示页面
   public function index(){
     $rows = Db::name('retive')->select();
     $this->assign('rows',$rows);
     return $this->fetch('index');
   }
    //查看活动
    public function look($id){
        $row = Db::name('retive')->find(['id'=>$id]);
        $this->assign('row',$row);
        return $this->fetch('lists');
    }
    //报名
    public function sign($id){
        $model = new Sign();
        $r = $model->where(['user_id'=>session('user_auth')['uid']])->where(['re_id'=>$id])->find();
        if ($r){
            $this->error('你已经报名过了','retive/index');
        }else{
            $model->re_id = $id;
            $model->user_id = session('user_auth')['uid'];
            $model->save();
            $this->success('报名成功','retive/index');
        }

    }
    //小区租售

}