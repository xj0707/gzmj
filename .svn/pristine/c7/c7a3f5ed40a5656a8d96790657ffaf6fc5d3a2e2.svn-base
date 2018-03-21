<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/21
 * Time: 14:29
 */
namespace application\admin\controller;
use application\admin\model\Rooms;
use application\admin\model\Users;
use think\Db;

class GameRoomController extends CommonController{
    //第三版改动
    public function gameRoom(){
        $Rooms=Db::name('roomcardlog')->paginate(20);
        $page=$Rooms->render();
        $infos=array();
        foreach($Rooms as $key=>$val){
            $infos[$key]['id']=$val['id'];
            $infos[$key]['time']=$val['time'];
            $infos[$key]['roomuuid']=$val['roomuuid'];
            $infos[$key]['roomid']=$val['roomid'];
            $infos[$key]['playerid']=$val['playerid'];
            $infos[$key]['playername']=Users::get($val['playerid'])->name;
            $infos[$key]['roomcardnum']=$val['roomcardnum'];
            //$infos[$key]['result']=$val['result'];
        }
        $this->assign('GameInfo',$infos);
        $this->assign('page',$page);
        return $this->fetch();
    }
    //游戏详情
    public function gameInfo(){
        $id=input('get.roomuuid');
        $Rooms=Db::name('roombattlelog')->where('roomuuid',$id)->paginate(20);
        //var_dump($Rooms);exit;
        $page = $Rooms->render();//分页显示
        $infos=array();
        foreach($Rooms as $key=>$val){
            static $i=0;
            $i++;
            $infos[$key]['id']=$i;
            $infos[$key]['roomuuid']=$val['roomuuid'];
            $infos[$key]['masterplayerid']=$val['masterplayerid'];
            $infos[$key]['masterplayername']=Users::get($val['masterplayerid'])->name;
            $infos[$key]['roomid']=$val['roomid'];
            $infos[$key]['player1id']=$val['player1id'];
            $infos[$key]['player1name']=Users::get($val['player1id'])->name;
            $infos[$key]['player1score']=$val['player1score'];
            $infos[$key]['player2id']=$val['player2id'];
            $infos[$key]['player2name']=Users::get($val['player2id'])->name;
            $infos[$key]['player2score']=$val['player2score'];
            $infos[$key]['player3id']=$val['player3id'];
            $infos[$key]['player3name']=Users::get($val['player3id'])->name;
            $infos[$key]['player3score']=$val['player3score'];
            $infos[$key]['player4id']=$val['player4id'];
            $infos[$key]['player4name']=Users::get($val['player4id'])->name;
            $infos[$key]['player4score']=$val['player4score'];
        }
        $this->assign('GameInfo',$infos);
        $this->assign('page',$page);
        return $this->fetch('newroom');
    }
    //房主ID查询
    public function likemasterid(){
        $id=input('post.masterid');
        $Rooms=Db::name('roomcardlog')->where('playerid',$id)->paginate(20);
        $page=$Rooms->render();
        $infos=array();
        foreach($Rooms as $key=>$val){
            $infos[$key]['id']=$val['id'];
            $infos[$key]['time']=$val['time'];
            $infos[$key]['roomuuid']=$val['roomuuid'];
            $infos[$key]['roomid']=$val['roomid'];
            $infos[$key]['playerid']=$val['playerid'];
            $infos[$key]['playername']=Users::get($val['playerid'])->name;
            $infos[$key]['roomcardnum']=$val['roomcardnum'];
            //$infos[$key]['result']=$val['result'];
        }
        $this->assign('GameInfo',$infos);
        $this->assign('page',$page);
        return $this->fetch('gameRoom');
    }
    //房间号查询
    public function likeroomid(){
        $id=input('post.roomid');
        $Rooms=Db::name('roomcardlog')->where('roomid',$id)->paginate(20);
        $page=$Rooms->render();
        $infos=array();
        foreach($Rooms as $key=>$val){
            $infos[$key]['id']=$val['id'];
            $infos[$key]['time']=$val['time'];
            $infos[$key]['roomuuid']=$val['roomuuid'];
            $infos[$key]['roomid']=$val['roomid'];
            $infos[$key]['playerid']=$val['playerid'];
            $infos[$key]['playername']=Users::get($val['playerid'])->name;
            $infos[$key]['roomcardnum']=$val['roomcardnum'];
            //$infos[$key]['result']=$val['result'];
        }
        $this->assign('GameInfo',$infos);
        $this->assign('page',$page);
        return $this->fetch('gameRoom');
    }
    //时间查询
    public function liketime(){
        $s_time=input('post.create_time');
        $e_time=input('post.e_time');
        if($e_time){
            $Rooms=Db::name('roomcardlog')->where('time','between time',[$s_time,$e_time])->paginate(20);
        }else{
            $Rooms=Db::name('roomcardlog')->where('time','>= time',$s_time)->paginate(20);
        }
        $page=$Rooms->render();
        $infos=array();
        foreach($Rooms as $key=>$val){
            $infos[$key]['id']=$val['id'];
            $infos[$key]['time']=$val['time'];
            $infos[$key]['roomuuid']=$val['roomuuid'];
            $infos[$key]['roomid']=$val['roomid'];
            $infos[$key]['playerid']=$val['playerid'];
            $infos[$key]['playername']=Users::get($val['playerid'])->name;
            $infos[$key]['roomcardnum']=$val['roomcardnum'];
            //$infos[$key]['result']=$val['result'];
        }
        $this->assign('GameInfo',$infos);
        $this->assign('page',$page);
        return $this->fetch('gameRoom');
    }

//    //新的表
//    public function newroom(){
//        $Rooms=Db::name('roombattlelog')->paginate(20);
//        $page = $Rooms->render();//分页显示
//        $infos=array();
//        foreach($Rooms as $key=>$val){
//            $infos[$key]['roomuuid']=$val['roomuuid'];
//            $infos[$key]['masterplayerid']=$val['masterplayerid'];
//            $infos[$key]['masterplayername']=Users::get($val['masterplayerid'])->name;
//            $infos[$key]['roomid']=$val['roomid'];
//            $infos[$key]['player1id']=$val['player1id'];
//            $infos[$key]['player1name']=Users::get($val['player1id'])->name;
//            $infos[$key]['player1score']=$val['player1score'];
//            $infos[$key]['player2id']=$val['player2id'];
//            $infos[$key]['player2name']=Users::get($val['player2id'])->name;
//            $infos[$key]['player2score']=$val['player2score'];
//            $infos[$key]['player3id']=$val['player3id'];
//            $infos[$key]['player3name']=Users::get($val['player3id'])->name;
//            $infos[$key]['player3score']=$val['player3score'];
//            $infos[$key]['player4id']=$val['player4id'];
//            $infos[$key]['player4name']=Users::get($val['player4id'])->name;
//            $infos[$key]['player4score']=$val['player4score'];
//        }
//        $this->assign('GameInfo',$infos);
//        $this->assign('page',$page);
//        return $this->fetch();
//    }
//    //房主id查询
//    public function likemasterid(){
//        $id=input('post.masterid');
//        $Rooms=Db::name('roombattlelog')->where('masterplayerid',$id)->paginate(20);
//        $page = $Rooms->render();//分页显示
//        $infos=array();
//        foreach($Rooms as $key=>$val){
//            $infos[$key]['roomuuid']=$val['roomuuid'];
//            $infos[$key]['masterplayerid']=$val['masterplayerid'];
//            $infos[$key]['masterplayername']=Users::get($val['masterplayerid'])->name;
//            $infos[$key]['roomid']=$val['roomid'];
//            $infos[$key]['player1id']=$val['player1id'];
//            $infos[$key]['player1name']=Users::get($val['player1id'])->name;
//            $infos[$key]['player1score']=$val['player1score'];
//            $infos[$key]['player2id']=$val['player2id'];
//            $infos[$key]['player2name']=Users::get($val['player2id'])->name;
//            $infos[$key]['player2score']=$val['player2score'];
//            $infos[$key]['player3id']=$val['player3id'];
//            $infos[$key]['player3name']=Users::get($val['player3id'])->name;
//            $infos[$key]['player3score']=$val['player3score'];
//            $infos[$key]['player4id']=$val['player4id'];
//            $infos[$key]['player4name']=Users::get($val['player4id'])->name;
//            $infos[$key]['player4score']=$val['player4score'];
//        }
//        $this->assign('GameInfo',$infos);
//        $this->assign('page',$page);
//        return $this->fetch('newroom');
//    }
//    //玩家id查询
//    public function likeplayerid(){
//        $id=input('post.playerid');
//        $Rooms=Db::name('roombattlelog')->where('player1id',$id)->whereOr('player2id',$id)->whereOr('player3id',$id)->whereOr('player4id',$id)->paginate(20);
//        $page = $Rooms->render();//分页显示
//        $infos=array();
//        foreach($Rooms as $key=>$val){
//            $infos[$key]['roomuuid']=$val['roomuuid'];
//            $infos[$key]['masterplayerid']=$val['masterplayerid'];
//            $infos[$key]['masterplayername']=Users::get($val['masterplayerid'])->name;
//            $infos[$key]['roomid']=$val['roomid'];
//            $infos[$key]['player1id']=$val['player1id'];
//            $infos[$key]['player1name']=Users::get($val['player1id'])->name;
//            $infos[$key]['player1score']=$val['player1score'];
//            $infos[$key]['player2id']=$val['player2id'];
//            $infos[$key]['player2name']=Users::get($val['player2id'])->name;
//            $infos[$key]['player2score']=$val['player2score'];
//            $infos[$key]['player3id']=$val['player3id'];
//            $infos[$key]['player3name']=Users::get($val['player3id'])->name;
//            $infos[$key]['player3score']=$val['player3score'];
//            $infos[$key]['player4id']=$val['player4id'];
//            $infos[$key]['player4name']=Users::get($val['player4id'])->name;
//            $infos[$key]['player4score']=$val['player4score'];
//        }
//        $this->assign('GameInfo',$infos);
//        $this->assign('page',$page);
//        return $this->fetch('newroom');
//    }
//
//    //房间号查询
//    public function likeroomid(){
//        $id=input('post.roomid');
//        $Rooms=Db::name('roombattlelog')->where('roomid',$id)->paginate(20);
//        $page = $Rooms->render();//分页显示
//        $infos=array();
//        foreach($Rooms as $key=>$val){
//            $infos[$key]['roomuuid']=$val['roomuuid'];
//            $infos[$key]['masterplayerid']=$val['masterplayerid'];
//            $infos[$key]['masterplayername']=Users::get($val['masterplayerid'])->name;
//            $infos[$key]['roomid']=$val['roomid'];
//            $infos[$key]['player1id']=$val['player1id'];
//            $infos[$key]['player1name']=Users::get($val['player1id'])->name;
//            $infos[$key]['player1score']=$val['player1score'];
//            $infos[$key]['player2id']=$val['player2id'];
//            $infos[$key]['player2name']=Users::get($val['player2id'])->name;
//            $infos[$key]['player2score']=$val['player2score'];
//            $infos[$key]['player3id']=$val['player3id'];
//            $infos[$key]['player3name']=Users::get($val['player3id'])->name;
//            $infos[$key]['player3score']=$val['player3score'];
//            $infos[$key]['player4id']=$val['player4id'];
//            $infos[$key]['player4name']=Users::get($val['player4id'])->name;
//            $infos[$key]['player4score']=$val['player4score'];
//        }
//        $this->assign('GameInfo',$infos);
//        $this->assign('page',$page);
//        return $this->fetch('newroom');
//    }

//    //所有游戏房间
//    public function index(){
//        $Rooms=Rooms::where("uuid>1")->paginate(20);
//        $page = $Rooms->render();//分页显示
//        $arr=array();
//        foreach ($Rooms as $k=>$room) {
//            $arr[$k]['uuid']=$room->uuid;
//            $arr[$k]['id']=$room->id;
//            $arr[$k]['num_of_turns']=$room->num_of_turns;
//            $arr[$k]['create_time']=$room->create_time;
//            $obj=json_decode($room->base_info);
//            $arr[$k]['creator']=Users::get($obj->creator)->name;//创建者名称
//        }
//        $this->assign('Rooms',$arr);
//        $this->assign('page',$page);
//        return $this->fetch();
//    }
//    //id 查询房间
//    public function likeroomuuid(){
//        $uuid=input('post.uuid/d');
//        $res=Rooms::where("uuid",'like',"%$uuid%")->paginate(20);
//        $page = $res->render();//分页显示
//        $arr=array();
//        foreach ($res as $k=>$room) {
//            $arr[$k]['uuid']=$room->uuid;
//            $arr[$k]['id']=$room->id;
//            $arr[$k]['num_of_turns']=$room->num_of_turns;
//            $arr[$k]['create_time']=$room->create_time;
//            $obj=json_decode($room->base_info);
//            $arr[$k]['creator']=Users::get($obj->creator)->name;//创建者名称
//        }
//        $this->assign('Rooms',$arr);
//        $this->assign('page',$page);
//        return $this->fetch('index');
//    }
//    //用户名查询房间
//    public function likename(){
//        $name=input('post.name');
//        $name=base64_encode($name);
//        $res=Rooms::where("id",'like',"%$name%")->paginate(20);
//        $page = $res->render();//分页显示
//        $arr=array();
//        foreach ($res as $k=>$room) {
//            $arr[$k]['uuid']=$room->uuid;
//            $arr[$k]['id']=$room->id;
//            $arr[$k]['num_of_turns']=$room->num_of_turns;
//            $arr[$k]['create_time']=$room->create_time;
//            $obj=json_decode($room->base_info);
//            $arr[$k]['creator']=Users::get($obj->creator)->name;//创建者名称
//        }
//        $this->assign('Rooms',$arr);
//        $this->assign('page',$page);
//        return $this->fetch('index');
//    }
//    //房间密码 查询房间
//    public function likeroomid(){
//        $id=input('post.id/d');
//        $res=Rooms::where("id",'like',"%$id%")->paginate(20);
//        $page = $res->render();//分页显示
//        $arr=array();
//        foreach ($res as $k=>$room) {
//            $arr[$k]['uuid']=$room->uuid;
//            $arr[$k]['id']=$room->id;
//            $arr[$k]['num_of_turns']=$room->num_of_turns;
//            $arr[$k]['create_time']=$room->create_time;
//            $obj=json_decode($room->base_info);
//            $arr[$k]['creator']=Users::get($obj->creator)->name;//创建者名称
//        }
//        $this->assign('Rooms',$arr);
//        $this->assign('page',$page);
//        return $this->fetch('index');
//    }
//    //时间 查询房间
//    public function liketime(){
//        $time=input('post.create_time');
//        $fom_time=strtotime($time);
//        $res=Rooms::where("create_time",'>',$fom_time)->paginate(20);
//        $page = $res->render();//分页显示
//        $arr=array();
//        foreach ($res as $k=>$room) {
//            $arr[$k]['uuid']=$room->uuid;
//            $arr[$k]['id']=$room->id;
//            $arr[$k]['num_of_turns']=$room->num_of_turns;
//            $arr[$k]['create_time']=$room->create_time;
//            $obj=json_decode($room->base_info);
//            $arr[$k]['creator']=Users::get($obj->creator)->name;//创建者名称
//        }
//        $this->assign('Rooms',$arr);
//        $this->assign('page',$page);
//        return $this->fetch('index');
//    }
}