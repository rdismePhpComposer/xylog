<?php

namespace Rdisme\Xylog;

use Rhttp\Get;
use Rdisme\Tools\Ip;


class Log
{

    private $params;
    private $url;


    /**
     * @param $params array(api_url, app_id)
     * api_url request url
     * app_id  调用方app_id
     */
    public function __construct($params)
    {
        $this->params = $params;
        $this->url = $this->_getArg('api_url');
        $this->url .= '?_AID=' . $this->_getArg('app_id');
    }


    /**
     * 设置用户身份标识
     */
    public function set_uid($val)
    {
        $this->url .= '&_UID=' . urlencode($val);
        return $this;
    }


    /**
     * 设置用户身份标识类型
     */
    public function set_uid_t($val)
    {
        $this->url .= '&_UIDT=' . $val;
        return $this;
    }


    /**
     * 设置活动ID
     */
    public function set_lid($val)
    {
        $this->url .= '&_LID=' . $val;
        return $this;
    }


    /**
     * 设置微信菜单栏用户输入
     */
    public function set_v($val)
    {
        $this->url .= '&_KW=' . urlencode($val);
        return $this;
    }


    public function log()
    {
        $this->url .= '&_T=' . time();
        $this->url .= '&_IP=' . Ip::get();
        return Get::send($this->url);
    }


    private function _getArg($key)
    {
        return isset($this->params[$key]) ?  $this->params[$key] : '';
    }
}
