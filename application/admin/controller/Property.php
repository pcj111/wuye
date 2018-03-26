<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/22 0022
 * Time: 13:44
 */

namespace app\admin\controller;


use think\Db;
use think\Loader;

class Property extends Admin
{

    //显示页面
    public function index()
    {
        $rows = \app\admin\model\Property::paginate(5);
        $this->assign('rows',$rows);
        return $this->fetch();
    }
    //添加
    public function add(){
       $request = $this->request;
        if ($request->isPost()){
            $post = $_POST;
            $vaildate = Loader::validate('property');
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
                $this->redirect('home/guarante/index');
            }
        }
        return $this->fetch();
    }
    //删除
    public function out($id){
       Db::name('property')->delete(['id'=>$id]);
       $this->redirect('property/index');
    }
    //回显
    public function edit($id){
        $row = Db::name('property')->find(['id'=>$id]);
        $request = $this->request;
        if ($request->isPost()){
            $post = $_POST;
            $post['time'] = time();
            Db::table('twothink_property')->update($post);
            $this->redirect('property/index');
        }
        $this->assign('row',$row);
        return $this->fetch();
    }
    //更新状态
    public function change($id){
        $row = Db::name('property')->find(['id'=>$id]);
        //var_dump($row);die;
        $row['status'] = 1;
        Db::name('property')->update($row);
        $this->redirect('property/index');
    }

}