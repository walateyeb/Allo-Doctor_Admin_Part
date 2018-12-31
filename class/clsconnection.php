<?php
	class connection {
		
		public static function open_connection() {
			mysql_connect("localhost","root","") or die(mysql_error());
			mysql_select_db("doctors") or die(mysql_error());
		}
		
		public static function close_connection() {
			mysql_close();
		}
		
	}
?>