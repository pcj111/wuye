<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/23 0023
 * Time: 17:23
 */

namespace app\admin\controller;




use think\Db;
use think\Loader;

class Notice extends Admin
{
    //小区通知后台列表
   public function index(){
       $rows = \app\admin\model\Notice::paginate(5);
       $this->assign('rows',$rows);
       return $this->fetch();
   }
   //小区添加
    public function add()
    {
        $notice = new \app\admin\model\Notice();
        $request = $this->request;
        if ($request->isPost()){
            $img = $request->file('img');
           $post = $_POST;
            $info=$img->move('static/uploads/picture');
            $post['img']='/static/uploads/picture/'.$info->getSaveName();
            $check = Loader::validate('notice');
            $a = $check->check($post);
            if (!$a){
                $this->error('添加失败'.$check->getError());
            }else{
                $post['create_time']=time();
                $notice->save($post);
                $this->success('添加成功','notice/index');
            }
        }
        return $this->fetch();
    }
    //通知删除
    public function out($id){
        $notice = new \app\admin\model\Notice();
        $row = $notice->find(['id'=>$id]);
        $row->delete();
        $this->success('删除成功','notice/index');
    }
    //修改回显
    public function edit($id){
        $notice = new \app\admin\model\Notice();
        $row = $notice->find(['id'=>$id]);
        $request = $this->request;
        if ($request->isPost()){
            $img = $request->file('img');
            $post = $_POST;
            $info=$img->move('static/uploads/picture');
            $post['img']='/static/uploads/picture/'.$info->getSaveName();
            $check = Loader::validate('notice');
            $a = $check->check($post);
            if (!$a){
                $this->error('修改失败'.$check->getError());
            }else{
                $post['update_time']=time();
                $notice->save($post,['id'=>$id]);
                $this->success('修改成功','notice/index');
            }
        }
        $this->assign('row',$row);
        return $this->fetch();
    }
    //查看详情

}