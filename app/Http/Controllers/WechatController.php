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
        $userApi = $wechat->user;
        $wechat->server->setMessageHandler(function ($message) use ($userApi){
            switch ($message->MsgType){
                case 'event':
                    # 事件消息.....
                    break;
                case 'text':
                    # 文字消息····
                    return '你好 ！' . $userApi->get($message->FromUserName)->nickname;
                    break;
                case 'image':
                    # 图片消息····
                    break;
                case 'voice':
                    # 语言消息·····
                    break;
                    //其他消息····
                default:
                    #Code
                    break;

            }
        });

//        log::info('return response.');

        return $wechat->server->serve();
    }
    
}
