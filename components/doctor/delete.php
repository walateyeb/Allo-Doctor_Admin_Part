<? common::user_access_only("admin");
if( common::get_control_value("id")!="" )
{
    $q = new Query();
    $q->delete(TBL_Doctor)
    ->where_equal_to(array("dr_id"=>common::get_control_value("id")))
    ->run();
    
    common::redirect_to(common::get_component_link(array("doctor","list")));
}
?>