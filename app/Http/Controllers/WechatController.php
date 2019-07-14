<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WechatController extends Controller
{
    //处理微信的请求消息
    public function serve()
    {
//        log::info('request arrived.');

        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function ($message){
            return "欢迎关注 Spring";
        });

//        log::info('return response.');

        return $wechat->server->serve();
    }
    
}
