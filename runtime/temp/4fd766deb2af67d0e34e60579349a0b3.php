<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"F:\twothink\TwoThink\public/../application/admin/view/default/property\edit.html";i:1521718379;}*/ ?>
<div class="container-fluid">
    <form method="post">
        <input type="hidden" class="form-control" name="id" value="<?=$row[id]?>"/>
        <div class="form-group">
            <label>您的姓名:</label>
            <input type="text" class="form-control" name="name" value="<?=$row[name]?>"/>
        </div>
        <div class="form-group">
            <label>你的房号:</label>
            <input type="text" class="form-control" name="sn" value="<?=$row[sn]?>"/>
        </div>
        <div class="form-group">
            <label>联系电话:</label>
            <input type="text" class="form-control" name="tel" value="<?=$row[tel]?>"/>
        </div>
        <div class="form-group">
            <label>保修内容:</label>
            <input type="text" class="form-control" name="intro" value="<?=$row[intro]?>"/>
        </div>
        <div class="form-group">
            <button class="btn btn-primary onlineBtn">确认提交</button>
        </div>
    </form>
</div>