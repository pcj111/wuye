<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/26 0026
 * Time: 15:29
 */

namespace app\admin\controller;


use think\Db;

class Rental extends Admin
{
   //小区租售展示列表
    public function index(){
        $rows = \app\admin\model\Rental::paginate('5');
        $this->assign('rows',$rows);
        return $this->fetch();
    }
    //添加
    public function add(){
        $model = new \app\admin\model\Rental();
        $request = $this->request;
        if ($request->isPost()){
            $post = $_POST;
            $file = $request->file('picture');
            $img=$file->move('static/uploads/picture');
            $post['picture']='/static/uploads/picture/'.$img->getSaveName();
            $model->save($post);
            $this->success('添加成功','rental/index');
        }
        return $this->fetch();
    }
    //修改
    public function edit($id){
        $model = new \app\admin\model\Rental();
        $row = $model->find(['id'=>$id]);
        //var_dump($row['statr']);die;
        $request = $this->request;
        if ($request->isPost()){
            $post = $_POST;
            $img = $request->file('picture');
            if ($img){
                $info=$img->move('static/uploads/picture');
                $post['picture']='/static/uploads/picture/'.$info->getSaveName();
            }else{
                $post['picture'] = Db::name('rental')->find(['id'=>$id])['picture'];
            }
            $model->save($post,['id'=>$id]);
            $this->success('修改成功','rental/index');
        }
        $this->assign('row',$row);
        return $this->fetch('edit');
    }
    //删除
    public function out($id){
        $retive = new \app\admin\model\Rental();
        $row = $retive->find(['id'=>$id]);
        $row->delete();
        $this->success('删除成功','rental/index');
    }
    //查看内容
    public function look($id){
        $model = new \app\admin\model\Rental();
        $row = $model->find(['id'=>$id]);
        $this->assign('row',$row);
        return $this->fetch('lists');
    }

}