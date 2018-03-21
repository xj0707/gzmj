<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 11:55
 */
namespace application\admin\controller;

use think\Db;
use application\admin\model\Users;
class RoomCardController extends CommonController{

    //消费房卡记录
    public function index(){
        $RoomCards=Db::name('roomcardlog')->order('id desc')->paginate(20);
        $page = $RoomCards->render();//分页显示
        $infos=array();
        foreach($RoomCards as $key=>$val){
            $infos[$key]['id']=$val['id'];
            $infos[$key]['time']=$val['time'];
            $infos[$key]['playerid']=$val['playerid'];
            $infos[$key]['playeridname']=Users::get($val['playerid'])->name;
            $infos[$key]['roomuuid']=$val['roomuuid'];
            $infos[$key]['roomid']=$val['roomid'];
            $infos[$key]['roomcardnum']=$val['roomcardnum'];
        }
        $this->assign('GameCards',$infos);
        $this->assign('page',$page);
        return $this->fetch();
    }
    //玩家ID查询
    public function likeplayerid(){
        $id=input('post.playerid');
        $RoomCards=Db::name('roomcardlog')->where('playerid',$id)->order('id desc')->paginate(20);
        $page = $RoomCards->render();//分页显示
        $infos=array();
        foreach($RoomCards as $key=>$val){
            $infos[$key]['id']=$val['id'];
            $infos[$key]['time']=$val['time'];
            $infos[$key]['playerid']=$val['playerid'];
            $infos[$key]['playeridname']=Users::get($val['playerid'])->name;
            $infos[$key]['roomuuid']=$val['roomuuid'];
            $infos[$key]['roomid']=$val['roomid'];
            $infos[$key]['roomcardnum']=$val['roomcardnum'];
        }
        $this->assign('GameCards',$infos);
        $this->assign('page',$page);
        return $this->fetch('index');
    }
    //时间查询
    public function liketime(){
        $time=input('post.create_time');
        //$time1=strtotime($time);
       // echo $time1;exit;
        $RoomCards=Db::name('roomcardlog')->whereTime('time', '>=', $time)->order('id desc')->paginate(20);
        $page = $RoomCards->render();//分页显示
        $infos=array();
        foreach($RoomCards as $key=>$val){
            $infos[$key]['id']=$val['id'];
            $infos[$key]['time']=$val['time'];
            $infos[$key]['playerid']=$val['playerid'];
            $infos[$key]['playeridname']=Users::get($val['playerid'])->name;
            $infos[$key]['roomuuid']=$val['roomuuid'];
            $infos[$key]['roomid']=$val['roomid'];
            $infos[$key]['roomcardnum']=$val['roomcardnum'];
        }
        $this->assign('GameCards',$infos);
        $this->assign('page',$page);
        return $this->fetch('index');
    }

}