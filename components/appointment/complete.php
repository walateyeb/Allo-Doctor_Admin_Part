<?php
$q = new Query();
if($_REQUEST["submit"]){
    $filter = common::get_control_value("filter");
    if($filter!=""){
        if($filter=="commingdated"){
                $date = date(MYSQL_DATE_FORMAT);
                $q->select()
                ->from(TBL_Appointment)
                ->where_equal_to(array("dr_id"=>common::get_session(DR_LOGIN_USER_ID),"visited"=>"1"))
                ->where_greater_than_or_equal_to(array("app_date"=>$date))
                ->order_by("app_date DESC")
                ->run();

        }else if($filter=="pastdated"){
                $date = date(MYSQL_DATE_FORMAT);
                $q->select()
                ->from(TBL_Appointment)
                ->where_equal_to(array("dr_id"=>common::get_session(DR_LOGIN_USER_ID),"visited"=>"1"))
                ->where_less_than(array("app_date"=>$date))
                ->order_by("app_date DESC")
                ->run();
        
        }else if($filter=="mobileverified"){
            $date = date(MYSQL_DATE_FORMAT);
                $q->select()
                ->from(TBL_Appointment)
                ->where_equal_to(array("dr_id"=>common::get_session(DR_LOGIN_USER_ID),"visited"=>"1","confirm"=>1))
                ->order_by("app_date DESC")
                ->run();
        }
    }
        
}else{
$q->select()
->from(TBL_Appointment)
->where_equal_to(array("dr_id"=>common::get_session(DR_LOGIN_USER_ID),"visited"=>"1"))
->order_by("app_date DESC")
->run();
}
$appointments = $q->get_selected();
?>