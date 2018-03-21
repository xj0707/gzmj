<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/22
 * Time: 14:29
 */
namespace application\admin\controller;

use think\Db;

class BuyLogController extends CommonController{
    //显示所有购买日志
    public function index(){
        if(session('user_id')===1){//超级管理员
            $info=Db::name('BuyLog')->alias('b')->join('t_admin a','b.admin_id=a.id')->order('b.id desc')->paginate(20);
        }else{
            $info=Db::name('BuyLog')->alias('b')->join('t_admin a','b.admin_id=a.id')->where('b.admin_id',session('user_id'))->order('b.id desc')->paginate(20);
        }
        $this->assign('BuyGems',$info);
        return $this->fetch();
    }
    //时间查询
    public function liketime(){
        $s_time=strtotime(input('post.create_time'));
        $e_time=input('post.e_time');
        $where="create_time > $s_time";
        if($e_time){
                $where="create_time> $s_time and create_time < $e_time ";
        }
        if(session('user_id')===1){//超级管理员
            $info=Db::name('BuyLog')->alias('b')->join('t_admin a','b.admin_id=a.id')->where($where)->order('b.id desc')->paginate(20);
        }else{
            $info=Db::name('BuyLog')->alias('b')->join('t_admin a','b.admin_id=a.id')->where('b.admin_id',session('user_id'))->where($where)->order('b.id desc')->paginate(20);
        }
        $this->assign('BuyGems',$info);
        return $this->fetch('index');
    }
    //管理员账号查询
    public function search(){
        $account=input('post.account');
        if(session('user_id')===1){//超级管理员
            $info=Db::name('BuyLog')->alias('b')->join('t_admin a','b.admin_id=a.id')->where('a.username',$account)->order('b.id desc')->paginate(20);
            $this->assign('BuyGems',$info);
            return $this->fetch('index');
        }else{
            echo "<script>alert('你没有权限查看其它管理员');window.history.back(-1); </script>";
        }
    }
}