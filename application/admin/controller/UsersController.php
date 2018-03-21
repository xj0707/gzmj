<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/21
 * Time: 10:28
 */
namespace application\admin\controller;
use application\admin\model\Users;
use think\Db;

class UsersController extends CommonController{
    //所有玩家
    public function index(){
        $res=Users::where("userid>1")->paginate(20);
        $this->assign('UserInfo',$res);
        return $this->fetch();
    }
    //userid查询玩家
    public function likeuserid(){
        $userid=input('post.userid/d');
        $res=Users::where("userid",'like',"%$userid%")->paginate(20);
        $this->assign('UserInfo',$res);
        return $this->fetch('index');
    }
    //账号查询玩家
//    public function likeaccount(){
//        $account=input('post.account/s');
//        $res=Users::where("account",'like',"%$account%")->paginate(20);
//        $this->assign('UserInfo',$res);
//        return $this->fetch('index');
//    }
    //昵称查询玩家
    public function likename(){
        $name=base64_encode(input('post.name/s'));
        $res=Users::where("name",'like',"%$name%")->paginate(20);
        $this->assign('UserInfo',$res);
        return $this->fetch('index');
    }
    //添加金币或者钻石
    public function addcoins()
    {
        $userid = input('get.userid');
        $form_data = input('post.form_data');
        // parse_str($form_data, $data);
        //coins=23&userid=53&gems=34
        preg_match('/gems=(\d+)/', $form_data, $data);
        if ($data[1] >= 0) {
            $user = Users::get($userid);
            $user->gems += $data[1];
            if ($user->save()) {
                //记录购买日志
                $time = time();
                $log = array(
                    'admin_id' => session('user_id'),
                    'user_id' => $userid,
                    'user_name' => $user->name,
                    'gem_number' => $data[1],
                    'create_time' => $time
                );
                Db::name('BuyLog')->insert($log);
                echo $code = 1;
            }else{
                echo $code=0;
            }
        }else{
            echo $code=0;
        }
    }
    //查看玩家游戏详情
    public function gameinfo(){
        $userid=input('get.userid');
        //这是原来用户表里面的历史记录 现在进行修改
//        $info=Db::name('users')->where('userid',$userid)->find();
//       // var_dump($info['history']);exit;
//        if($info['history']){
//            $data=json_decode($info['history']);
//            //var_dump($data);
//            $arr=array();
//            foreach($data as $k=>$v){
//                $arr[$k]['uuid']=$v->uuid;
//                $arr[$k]['id']=$v->id;
//                $arr[$k]['time']=$v->time;
//                $arr1=array();
//                foreach($v->seats as $k1=>$v1){
//                    $arr1[$k1]['userid']=$v1->userid;
//                    $arr1[$k1]['name']=base64_decode($v1->name);
//                    $arr1[$k1]['score']=$v1->score;
//                }
//                $arr[$k]['seats']=$arr1;
//            }
//            $this->assign('GameInfo',$arr);
//            return $this->fetch();
//        }else{
//            echo "<script>alert('还没有参加任何游戏');window.history.back(-1); </script>";
//        }
        //现在新加了battlelog表，，新的逻辑代码 2017.3.9
        $userinfo=Db::name('roombattlelog')->where('player1id',$userid)->whereOr('player2id',$userid)->whereOr('player3id',$userid)->whereOr('player4id',$userid)->paginate(20);
        $page=$userinfo->render();
        $infos=array();
        if(!$userinfo[0]){
            echo "<script>alert('还没有参加任何游戏');window.history.back(-1); </script>";
        }else{
            foreach($userinfo as $key=>$val){
                $infos[$key]['roomuuid']=$val['roomuuid'];
                $infos[$key]['masterplayerid']=Users::get($val['masterplayerid'])->name;
                $infos[$key]['roomid']=$val['roomid'];
                $infos[$key]['player1id']=Users::get($val['player1id'])->name;
                $infos[$key]['player1score']=$val['player1score'];
                $infos[$key]['player2id']=Users::get($val['player2id'])->name;
                $infos[$key]['player2score']=$val['player2score'];
                $infos[$key]['player3id']=Users::get($val['player3id'])->name;
                $infos[$key]['player3score']=$val['player3score'];
                $infos[$key]['player4id']=Users::get($val['player4id'])->name;
                $infos[$key]['player4score']=$val['player4score'];
            }
            //var_dump($infos);exit;
            $this->assign('GameInfo',$infos);
            $this->assign('page',$page);
            return $this->fetch();
        }


    }

}