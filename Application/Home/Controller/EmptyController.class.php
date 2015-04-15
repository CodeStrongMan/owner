<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends Controller {
        public function index(){
            $Model_Name = MODULE_NAME;
            $this->error();
        }
        public function error(){
            echo '<!DOCTYPE html>
<html lang="en-US"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>404ERROR</title>
    <link rel="stylesheet" type="text/css" href="/Public/site/css/cmstop-error.css" media="all">
</head>
<body class="body-bg">
<div class="main">
    <p class="title">非常抱歉，您要查看的页面没有办法找到</p>
    <a href="/" class="btn">返回网站首页</a>
</div>
</body></html>';
        }


}