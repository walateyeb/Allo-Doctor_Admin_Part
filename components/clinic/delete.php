<? common::user_access_only(array("admin","doctor"));
    common::load_model("db");
if( common::get_control_value("id")!="" )
{
    $q = new Query();
    $q->delete(TBL_Clinic)
    ->where_equal_to(array("cl_id"=>common::get_control_value("id")))
    ->run();
    
    common::redirect_to(common::get_component_link(array("doctor","list")));
}
?>