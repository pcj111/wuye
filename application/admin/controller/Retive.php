<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/24 0024
 * Time: 16:18
 */

namespace app\admin\controller;


use think\Db;

class Retive extends Admin
{
    //展示页面
   public function index(){
     $rows = \app\admin\model\Retive::paginate(5);
     $this->assign('rows',$rows);
     return $this->fetch('index');
   }
   //添加活动
    public function add(){
       $seller = new \app\admin\model\Retive();
       $request = $this->request;
       if ($request->isPost()){
            $post = $_POST;
           $img = $request->file('img');
           $info=$img->move('static/uploads/picture');
           $post['img']='/static/uploads/picture/'.$info->getSaveName();
          if (time()>strtotime($post['end_time'])){
              $seller->status = 0;
           }else{
              $seller->status = 1;
          }
           $seller->save($post);
           $this->success('添加成功','retive/index');
       }
     return $this->fetch('add');
    }
    //修改
    public function edit($id){
       $seller = new \app\admin\model\Retive();
        $row = $seller->find(['id'=>$id]);
        $request = $this->request;

        if ($request->isPost()){
            $post = $_POST;
            $img = $request->file('img');
            if ($img){
                $info=$img->move('static/uploads/picture');
                $post['img']='/static/uploads/picture/'.$info->getSaveName();
            }else{
                $post['img'] = Db::name('retive')->find(['id'=>$id])['img'];
            }
            if (time()>strtotime($post['end_time'])){
                $post['status']=0;
                //$seller->status = 0;
            }else{
                $post['status']=1;
                //$seller->status = 1;
            }

            $seller->save($post,['id'=>$id]);

            $this->success('修改成功','retive/index');
        }

        $this->assign('row',$row);
        return $this->fetch('edit');
    }
    //删除
    public function out($id){
        $retive = new \app\admin\model\Retive();
        $row = $retive->find(['id'=>$id]);
        $row->delete();
        $this->success('删除成功','retive/index');
    }
    //查看活动
    public function look($id){
        $model = new \app\admin\model\Retive();
        $row = $model->find(['id'=>$id]);
        $this->assign('row',$row);
        return $this->fetch('lists');
    }
    //发布
    public function sale($id){
        $row = Db::name('retive')->find(['id'=>$id]);
        if ($row['sale']==0){
            $row['sale']=1;
        }else{
            $row['sale']=0;
        }
        Db::name('retive')->update($row,['id'=>$id]);
        $this->redirect('admin/retive/index');
    }
}