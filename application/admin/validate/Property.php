<?php
namespace app\admin\validate;

use think\Validate;

class Property extends Validate
{
    protected $rule = [
        'tel' => 'number',
        'intro' => 'require|max:200',
        'sn'=>'require|max:100',
    ];

    protected $message = [
        'tel.number' => '电话必须是数字',
        'intro.require'=>'保修内容不能为空',
        'intro.max'=>'最多不能超过200个字符',
        'sn.require'=>'房号不能为空',
        'sn.max'=>'最多不能超过100个字符',
    ];
}
