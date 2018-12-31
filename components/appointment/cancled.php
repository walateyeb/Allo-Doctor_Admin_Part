<?php
$q = new Query();

$q->select()
->from(TBL_Appointment."_draft")
->where_equal_to(array("dr_id"=>common::get_session(DR_LOGIN_USER_ID)))
->order_by("app_date DESC")
->run();

$appointments = $q->get_selected();
?>