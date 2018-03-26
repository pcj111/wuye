<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/24 0024
 * Time: 9:47
 */

namespace app\admin\validate;


use think\Validate;

class Notice extends Validate
{
    protected $rule = [
        'title' => 'require|max:200',
        'author' => 'require|max:10',
        'img'=>'require',
    ];

    protected $message = [
        'title.require' => '标题不能为空',
        'title.max'=>'最多不能超过200个字符',
        'author.require'=>'保修内容不能为空',
        'author.max'=>'最多不能超过10个字符',
    ];
}