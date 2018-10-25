<?php

namespace app\admin\model;

use think\Model;
use think\Db;

class Procurement extends Model
{
    // 表名
    protected $name = 'procurement';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    
    // 追加属性
    protected $append = [

    ];
    public function getList($where,$sort,$order,$offset, $limit)
    {
        return Db::table('fa_procurement')->alias('fpo')
            ->join(["fa_admin" => "admin"], "fpo.author_id=admin.id")
            ->field("fpo.*,admin.nickname")
            ->where($where)
            ->order($sort, $order)
            ->limit($offset, $limit)
            ->select();

    }
    public function getListNumber($where,$sort,$order)
    {
        return Db::table('fa_procurement')->alias('fpo')
            ->join(["fa_admin" => "admin"], "fpo.author_id=admin.id")
            ->field("fpo.*,admin.nickname")
            ->where($where)
            ->order($sort, $order)
            ->count();

    }

    public function getListLevel($uid)
    {
        $data= Db::table('fa_auth_group_access')->alias('access')
            ->join(["fa_auth_group" => "my_group"], "access.group_id=my_group.id")
            ->field("my_group.id")
            ->where(array('access.uid'=>$uid))
            ->find();
        return ($data['id']==7)?'show_part':'show_all';
    }

    







}
