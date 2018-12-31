<? common::user_access_only(array("admin","doctor"));
    common::load_model("db");
if( common::get_control_value("id")!="" )
{
    $q = new Query();
    $q->delete(TBL_Service_charge)
    ->where_equal_to(array("id"=>common::get_control_value("id")))
    ->run();
    
    common::redirect_to(common::get_component_link(array("clinic","list"),array("dr_id"=>$data["dr_id"])));
}
?>