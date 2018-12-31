<?php
    
if($_REQUEST["submit"]){    
    
    form_validation::add_validation('message', 'required', 'Message');
    if(form_validation::validate_fields())
    {
    
    $gcm = new GCM();
    $registatoin_ids = array();
    $message = array("message" => common::get_control_value("message"));
    $q = new Query();
    //$res = mysql_query("select gcm_code from ".TBL_REGISTERS." where gcm_code!=''");
    //$registers = mysql_fetch_array($res,2);
    $q->select("gcm_code")
    ->from(TBL_REGISTERS)
    ->where_not_equal_to(array("gcm_code"=>""))
    ->run();
    $registers = $q->get_selected();
    foreach($registers as $regs){
        if($regs["gcm_code"]!="")
            $registatoin_ids[] = $regs["gcm_code"];
        $result = $gcm->send_notification($regs["gcm_code"], $message);
    }
    
    
    }
}
    //$gcm->send_notification($registatoin_ids, $message);
    //print_r($registatoin_ids);
//    foreach($registers as $reg){
//        if($reg["gcm_code"]!="")
//            $result = $gcm->send_notification($registatoin_ids, $message);
//    } 
?>