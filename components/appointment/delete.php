<?php
$appid= common::get_control_value("id");
if($appid!=""){
    echo "insert into ".TBL_Appointment."_draft (select * from ".TBL_Appointment." where id='$appid')";
    mysql_query("insert into ".TBL_Appointment."_draft (select * from ".TBL_Appointment." where id='$appid')");
    
    $q = new Query();
    $q->delete("appointment")
    ->where_equal_to(array("id"=>$appid))
    ->run();
    $action = (common::get_control_value("ref")!="")?common::get_control_value("ref"):"list";
    common::redirect_to(common::get_component_link(array("appointment",$action)));
}
?>