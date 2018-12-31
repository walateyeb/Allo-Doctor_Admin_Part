<?php 
$q = new Query();
$q->update(TBL_Appointment,array("visited"=>common::get_control_value("value")))
->where_equal_to(array("id"=>common::get_control_value("appid")))
->run();


?>