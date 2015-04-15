<?php
namespace Admin\Controller;

class IndexController extends PublicController {
public function index(){
        $the_ver = I('server.SERVER_SOFTWARE');
        $ver     = explode(' ',$the_ver);
        $apache  = explode('/',$ver[0]);
        $php     = explode('/',$ver[2]);

        
         $data = array(
             'server'     => $apache[0],
             'server_ver' => $apache[1],
             'lang'       => $php[0],
             'lang_ver'   => $php[1],
             'ip'         => I('server.REMOTE_ADDR'),
             'port'       => I('server.REMOTE_PORT'),
             'time'       => I('server.REQUEST_TIME')
            
        );  
        
         $config['ver'] = '12123';
         $config['ter'] = '12123';
         C($config,'team');
         
         $my = C('','name');
         
        
        $this->assign('data',$data);
        $this->display();
    }
    public function time_tray(){

        $the_time = time();
        
        $tray['date'] = array(
            'one' => date("m-d",$the_time-518400),
            'two' => date("m-d",$the_time-432000),
            'three' => date("m-d",$the_time-345600),
            'fore' => date("m-d",$the_time-259200),
            'five' => date("m-d",$the_time-172800),
            'six' => date("m-d",$the_time-86400),
            'seven' => date("m-d",$the_time)
        );

        $this->ajaxReturn($tray);
    }
}