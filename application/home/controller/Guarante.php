<?php
namespace app\home\Controller;

use think\Controller;
use think\Db;
use think\Loader;

class Guarante extends Home{
    //显示首页
    public function index(){
        return $this->fetch();
    }
   //添加列表
    public function add(){
        $request = $this->request;
        if ($request->isPost()){
            $post = $_POST;
            $vaildate = Loader::validate('guarante');
            $a = $vaildate->check($post);
            if (!$a){
                $this->error('添加失败'.$vaildate->getError());
            }
            $post['time'] = time();
            $post['status'] = 0;
            //var_dump($post);
            $rs = Db::table('twothink_property')->insert($post);
            //var_dump($rs);die;
            if ($rs){
                $this->redirect('home/guarante/property');
            }
        }
        return $this->fetch('add');

    }
    //显示物业列表
   public function property(){
       $user = session('user_auth');
       $name = $user['username'];
       $rows = Db::table('twothink_property')->where(['name'=>$name])->select();
       $this->assign('rows',$rows);
       return $this->fetch('list');
   }
    //显示活动
    public function notice(){

        return $this->fetch('notice');
    }
}