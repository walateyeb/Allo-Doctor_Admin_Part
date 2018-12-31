<?php


$q = new Query();
    $check = common::get_control_value("my-checkbox");
   echo $check;
    if($check==1){
				$appid= common::get_control_value("id");
                $q->update(TBL_Appointment,array("visited"=>$check))
                ->where_equal_to(array("id"=>$appid))
                ->run();}
            
          common::redirect_to(common::get_component_link(array("appointment","pending")));
?>