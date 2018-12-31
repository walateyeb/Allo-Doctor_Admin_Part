<?php common::doctor_accress_only();
$date = date(MYSQL_DATE_FORMAT);
$q = new Query();
$q->select()
->from(TBL_Appointment)
->where_equal_to(array("app_date"=>$date,"dr_id"=>common::get_session(DR_LOGIN_USER_ID)))
->run();
$appointments = $q->get_selected();
?> 