<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Db\Driver\Mysql;

class IndexController extends Controller {
    public function index(){
        $data = array();
        $data['time'] = date("Y-m-d H:i:s");//时间
        $data['num']  = 1;//管理员个数
        $data['coding'] = 'UTF-8';//程序编码
        $arr = getbrowser();
        $data['browser']     = $arr['browser'] ;//获取当前浏览器
        $data['software'] = $_SERVER ['SERVER_SOFTWARE'];//服务器端信息
       /* $data['support'] = function_exists (mysql_close)?"是":"否";//Mysql支持*/
        $data['maxupload'] = get_cfg_var("upload_max_filesize")?get_cfg_var("upload_max_filesize"):"不允许上传文件";//最大上传限制
        $data['memory'] = get_cfg_var("memory_limit")?get_cfg_var("memory_limit"):"无";//脚本运行占用最大内存
        $mysqlversion = mysql_get_server_info();
        $data['mysqlversion'] = $mysqlversion; //当前连接MySQL数据库的版本
        $data['phpversion'] = PHP_VERSION;//PHP版本
        $data['operationmode'] = php_sapi_name();//PHP运行方式
        $ip = get_client_ip();

        $data['ip'] = $ip;//获取登录者ip地址

        $this->assign("list",$data);
        //获取友链总数
        $this->assign("link",D('friendlylink')->count());
        //获取文章总数
        $this->assign("article",D('article')->count());
        $this->display();
    }
    public function _empty(){
        exit("no this action");
        /*$this->display("Public/View/404.html");*/
    }
}