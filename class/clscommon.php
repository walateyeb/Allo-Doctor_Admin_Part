
<?php
		class common {
				public static function set_value ( $strvalue="" ) {

					$strreturn = "";

					$strreturn = addslashes ( trim( $strvalue ) );

					return $strreturn;

				}

				public static function get_unique_code($prefix,$length = 5)
        		{
        		
        		  $password = str_replace(' ', '', $prefix);
        		  $possible = '0123456789bcdfghjkmnpqrstvwxyz'; 
        			
        		  $i = 0; 
        		  while ($i < $length)
        			{ 
        			$password .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
        			$i++;
        			}
        		
        		  return $password;
        		
        		}

				public static function get_value ( $strvalue = "" ) {

					$strreturn = "";

					if ( ! ( is_array($strvalue) && count($strvalue) ) ) {

						$strreturn = stripcslashes( trim ( $strvalue ) ); 

					}

					else {

						$strreturn = $strvalue;	

					}

					return $strreturn;

				}
                public static function get_back_value($field)
                {
                    return ($_REQUEST[$field])?  self::get_control_value($field) : "" ; 
                }
			

				public static function read_file ( $file, $array_form = false ) {

					if ( file_exists($file) && is_file($file) && is_readable($file) ) {

						$strreturn = '';

						$arreturn = array();

						$file_handle = @fopen($file, 'r');

						if ($file_handle) {

							while (!feof($file_handle)) {

								if ( $array_form == false ) {

									$strreturn  .= fgets($file_handle, 4096);

								}

								else {

									$arreturn[] = fgets($file_handle, 4096);

								}

							}

							fclose($file_handle);

						}				

						if ( $array_form == false ) {

							return $strreturn;

						}

						else {

							return $arreturn;

						}

					}

					return false;

				}

				

				

				public static function set_message ( $message_no, $error_string = '' ) {

					self::set_session(MESSAGE_SESSION, array($message_no, $error_string));

				}

				

				public static function do_show_message ( ) {

					return self::check_session(MESSAGE_SESSION);

				}

				

				public static function show_message ( $entity = '' ) {

					$strmessage_title = '';

					$strmessage_sentence = '';

					$error = false;

					$message_input = self::get_session(MESSAGE_SESSION);

					

					switch ( intval($message_input[0])  ) {

						case 1:

							$strmessage_title = $entity . ' Statut Actif / Inactif';

							$strmessage_sentence = $entity . ' Statut Actif / Inactif a &eacute;t&eacute; d&eacute;fini avec succ&eacute;s.';	

							$error = false;

							break;

						case 101:

							$strmessage_title = $entity . ' Statut';

							$strmessage_sentence = $entity . ' le statut a &eacute;t&eacute; d&eacute;fini avec succ&eacute;s.';	

							$error = false;

							break;	

						case 2:

							$strmessage_title = 'Supprimer ' . $entity;

							$strmessage_sentence = strtolower($entity) . '(s) s&eacute;lectionn&eacute;e  a &eacute;t&eacute; suprimer avec succ&eacute;s.';	

							$error = false;

							break;

						case 3:

							$strmessage_title = 'Nouvelle' . $entity;

							$strmessage_sentence = $entity . ' d&eacute;tails a &eacute;t&eacute; ajout&eacute; avec succ&eacute;s.';	

							$error = false;

							break;

						case 4:

							$strmessage_title = 'Modifier ' . $entity;

							$strmessage_sentence = $entity . ' d&eacute;tails a &eacute;t&eacute; enregistr&eacute; avec succ&eacute;s.';	

							$error = false;

							break;

						case 5:

							$strmessage_title = 'Connexion';

							$strmessage_sentence = 'Sil vous plait entrez le nom dutilisateur ou mot de passe valide.';	

							$error = true;

							break;

						case 6:

							$strmessage_title = 'Deconnexion';

							$strmessage_sentence = 'Vous avez d&eacute;connec&eacute; avec succ&eacute;s.';	

							$error = false;

							break;

						case 7:

							$strmessage_title = 'Connexion';

							$strmessage_sentence = 'Sil vous plait vous connecter pour acc&eacute;der &agrave; la paie.';	

							$error = true;

							break;

						case 8:

							$strmessage_title = 'Changer Mot de passe';

							$strmessage_sentence = 'Mot de passe na pas &eacute;t&eacute; trouv&eacute;. Veuillez r&eacute;essayer.';	

							$error = true;

							break;

						case 9:

							$strmessage_title = 'Changer Mot de passe';

							$strmessage_sentence = 'Mot de passe a &eacute;t&eacute; chang&eacute; avec succ&eacute;s.';	

							$error = false;

							break;

						case 11:

							$strmessage_title = 'Supprimer ' . $entity;

							$strmessage_sentence = 'Sil vous plait s&eacute;lectionner au moins un enregistrement que vous souhaitez supprimer.';	

							$error = true;

							break;
                        case 12:

							$strmessage_title = 'Inscription ';

							$strmessage_sentence = ' Inscription avec succ&eacute;s. maintenant vous pouvez vous connecter';	

							$error = false;

							break;
    

						case 19:

							$strmessage_title = 'sauvegarde';

							$strmessage_sentence = 'sauvegarde de base de donn&eacute;es a &eacute;t&eacute; effectu&eacute;e avec succ&eacute;s.';	

							$error = false;

							break;

						case 20:

							$strmessage_title = 'Restaurer';

							$strmessage_sentence = 'base de donn&eacute;es a &eacute;t&eacute; restaur&eacute;e avec succ&eacute;s.';	

							$error = false;

							break;

						case 21:

							$strmessage_title = 'Droits de lutilisateur';

							$strmessage_sentence = 'Les droits des utilisateurs a &eacute;t&eacute; d&eacute;fini avec succ&eacute;s.';	

							$error = false;

							break;

						case 100:

							$strmessage_title = '';

							$strmessage_sentence = 'Erreur &agrave; la page rediriger.';	

							$error = false;

							break;

						case 201:

							$strmessage_title = $entity;

							$strmessage_sentence = 'Votre ajout aura une incidence sur la <strong>' . $_GET["total_affected"] . '</strong> pistes. Voulez-vous continuer?';

							$error = true;

							break;

						case 202:

							$strmessage_title = $entity;

							$strmessage_sentence = 'Votre ajout affectera &agrave; 0 prospects.';

							$error = false;

							break;

						case 203:

							$strmessage_title = $entity;

							$strmessage_sentence = 'statut de piste a &eacute;t&eacute; d&eacute;fini avec succ&eacute;s.';	

							$error = false;

							break;
                         case 204:

							$strmessage_title = $entity;

							$strmessage_sentence = 'Ordre envoy&eacute; avec succ&eacute;s.';	

							$error = false;

							break;
                            case 205:

							$strmessage_title = $entity;

							$strmessage_sentence = 'Erreur dans lordre denvoi. Veuillez r&eacute;essayer';	

							$error = true;

							break;
                            case 206:

							$strmessage_title = $entity;

							$strmessage_sentence = 'Cet e-mail est d&eacute;j&agrave; enregistr&eacute;';	

							$error = true;

							break;	
                            
                            case 207:

							$strmessage_title = $entity;

							$strmessage_sentence = 'Abonnez avec succ&eacute;s';	

							$error = false;

							break;				

					}

					

					if ( intval($message_input[0]) > 0 ) {

						$template_file = ADMIN_THEME . 'templates/message-template.html';

						if ( ! ( file_exists($template_file) && is_file($template_file) ) ) {

							$template_file = ADMIN_PATH . ADMIN_THEME . 'templates/message-template.html';

						}

						if ( $error ) {

							$template_file = ADMIN_THEME . 'templates/error-template.html';
                        }
							if ( ! ( file_exists($template_file) && is_file($template_file) ) ) {

								$template_file = ADMIN_PATH . ADMIN_THEME . 'templates/error-template.html';	

							}

							$strtemplate = self::read_file($template_file);


						$strtemplate = str_replace('##current_template##', ADMIN_THEME, $strtemplate);

						$strtemplate = str_replace('##message_title##',$strmessage_title,$strtemplate);

						$strtemplate = str_replace('##message_sentence##',$strmessage_sentence,$strtemplate);

					}

					

					if ( trim($message_input[1]) != '' ) {

						$template_file = ADMIN_THEME . 'templates/validation-template.html';

						if ( ! ( file_exists($template_file) && is_file($template_file) ) ) {

							$template_file = ADMIN_PATH . ADMIN_THEME . 'templates/validation-template.html';	

						}

						$strtemplate = self::read_file($template_file);

						$strtemplate = str_replace('##current_template##', ADMIN_THEME, $strtemplate);

						$strtemplate = str_replace('##error_sentence##',trim($message_input[1]), $strtemplate);

					}

				

					self::remove_message();

					return $strtemplate;

				}

								

				public static function remove_message ( ) {

					self::remove_session(MESSAGE_SESSION);

				}

				

				public static function redirect_to ( $page ) {

					if ( ! headers_sent() ) {

						header('Location: ' . $page);

						exit();

					}

					else {

						echo '<script type="text/javascript" language="javascript">window.location.href=\'' . $page . '\'</script>';	

					}

				}

				

				public static function get_session_key ( $key ) {

					return SESSION_PREFIX . $key;

				}

				

				public static function set_session ( $key, $value ) {

					$key = self::get_session_key($key);

					$_SESSION[$key] = $value;

				}

				

				public static function remove_session ( $key ) {

					$key = self::get_session_key($key);

					if ( isset($_SESSION[$key]) ) {

						unset($_SESSION[$key]);

					}

				}

				

				public static function check_session ( $key ) {

					$key = self::get_session_key($key);

					if ( isset($_SESSION[$key]) ) {

						return true;

					}

					return false;

				}

				

				public static function get_session ( $key ) {

					$key = self::get_session_key($key);

					if ( isset($_SESSION[$key]) ) {

						return self::get_value($_SESSION[$key]);

					}

				}

				

				public static function get_current_page ( ) {

					return basename($_SERVER['REQUEST_URI']);

				}

				

			public static function get_css($array)
                {
                    $css="";
                    if(is_array($array))
                    {
                        foreach($array as $val)
                            $css.="<link href='".DEFAULT_THEME."css/".$val.".css' rel='stylesheet' type='text/css' >\n";
                    }else
                    {
                            $css="<link href='".DEFAULT_THEME."css/".$array.".css' rel='stylesheet' type='text/css' >\n";
                    }
                    return $css;
                }
                 	
			    public static function get_script($array)
                {
                    $css="";
                    if(is_array($array))
                    {
                        foreach($array as $val)
                            $css.="<script type='text/javascript' src='".DEFAULT_THEME."js/".$val.".js'></script>\n";
                    }else
                    {
                            $css.="<script type='text/javascript' src='".DEFAULT_THEME."js/".$array.".js'></script>\n";
                    }
                    return $css;
                }	

				public static function login_user ( $user_name, $password,$remember=0) {

					$boolvalid_user = false;

					$strquery = 'SELECT `id`,`username`,`type` FROM `' . DB_PREFIX . 'user` WHERE `username` = \''.$user_name.'\' AND `password` = \'' . md5($password) . '\' and `active`=1';

					$rsuser = mysql_query($strquery) or die(mysql_error());

					if ( $rsuser && mysql_num_rows($rsuser) ) {

						$aruser = mysql_fetch_assoc($rsuser);

						self::set_session(ADMIN_LOGIN_USER_ID, common::get_value($aruser['id']));
                        self::set_session(ADMIN_LOGIN_TYPE,common::get_value($aruser['type']));
						self::set_session(ADMIN_LOGIN_USER_NAME, common::get_value($aruser['username']));
                        if ($remember) {
                            setcookie(ADMIN_LOGIN_USER_ID_COOKIE , $aruser['id'] , time() + 9999999);
                            setcookie(ADMIN_LOGIN_USER_NAME_COOKIE, $aruser['username'], time() + 9999999);
                            setcookie(ADMIN_LOGIN_TYPE_COOKIE, $aruser['type'], time() + 9999999);
                        }

						$boolvalid_user = true;

					}

					mysql_free_result($rsuser);

					return $boolvalid_user;

				}

				
                public static function accesstoken ( ) {

					if(self::is_user_loggedin())
                    {
                        return self::get_session(ADMIN_LOGIN_USER_ID);
                    }		

				}
				public static function logout_user ( ) {

					self::remove_session(ADMIN_LOGIN_USER_ID);	
                    self::remove_session(ADMIN_LOGIN_TYPE_COOKIE);
                    
					self::remove_session(ADMIN_LOGIN_USER_NAME);		

				}

				public static function is_register_loggedin ( ) {
                    
					return self::check_session(LOGIN_USER_ID) && self::check_session(LOGIN_USER_EMAIL);

				}

				public static function is_user_loggedin ( ) {
                    
					return self::check_session(ADMIN_LOGIN_USER_ID) || self::check_session(DR_LOGIN_USER_ID);

				}
                public static function user_access_only($type)
                {
                    if(self::is_user_loggedin())
                    {
                        if(is_array($type)){
                            if(in_array(self::get_session(ADMIN_LOGIN_TYPE),$type)){
                                
                            }else{
                                self::redirect_to(self::get_component_link(array('home','home')));
                            }   
                        }else{
                            if(self::get_session(ADMIN_LOGIN_TYPE)==$type)
                            {
                                
                            }else
                            {
                                self::redirect_to(self::get_component_link(array('home','home')));
                            }
                        }
                    }else
                    {
                        self::redirect_to(self::get_component_link(array('home','home')));
                    }
                }
				public static function doctor_accress_only()
                {
                    if( self::check_session(DR_LOGIN_USER_ID))
                    {
                    }else
                    {
                        self::redirect_to(self::get_component_link(array('home','home')));
                    }
                }

				public static function change_password ( $old_password, $new_password ) {

					$intuser_id = self::get_session(ADMIN_LOGIN_USER_ID);

					$strquery = 'UPDATE ' . DB_PREFIX . 'user SET password = \''.md5($new_password).'\' WHERE id = '.$intuser_id.' AND password = \''.md5($old_password).'\'';

					mysql_query($strquery) or die(mysql_error());

					return mysql_affected_rows();

				}

				

				

				public static function time_stamp ( $format = 'Y-m-d' ) {

					return date($format);

				}

				public static function isValidDateTime($dateTime) 
                { 
                    if (preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $dateTime, $matches)) { 
                        if (checkdate($matches[2], $matches[3], $matches[1])) { 
                            return true; 
                        } 
                    } 
                
                    return false; 
                } 

				public static function record_exists ( $table, $condition ) {

					$boolreturn = false;

					$strquery = "SELECT * FROM " . DB_PREFIX . $table . " WHERE " . $condition . " LIMIT 1";

					$recordset = mysql_query($strquery) or die(mysql_error());

					if ( $recordset && mysql_num_rows($recordset) ) {

						$boolreturn = true;

					}

					mysql_free_result($recordset);

					return $boolreturn;

				}

				

				public static function get_field_value ( $table, $field, $condition = '1=1' ) {

					$return_value = '';

					$strquery = 'SELECT '. $field . ' FROM ' . DB_PREFIX . $table . ' WHERE ' . $condition . ' LIMIT 1';

					$recordset = mysql_query($strquery) or die(mysql_error());

					if ( $recordset && mysql_num_rows($recordset) ) {

						$return_value = common::get_value(mysql_result($recordset, 0, $field));

					}

					mysql_free_result($recordset);

					return $return_value;

				}

				

				public static function run_query ( $strquery ) {

					$recordset = mysql_query($strquery) or die(mysql_error());

					return $recordset;

				}

				

				public static function convert_date_to_mysql_format ( $date ) {

					$strreturn = '';

					if ( $date != '' ) {

						$ardate = explode(DATE_SEPARATOR, $date);

						if ( is_array($ardate) && count($ardate) ) {

							$intyear = (int) $ardate[2];

							$intmonth = (int) $ardate[1];

							$intday = (int) $ardate[0];

							$strreturn = $intyear . '-' . $intmonth . '-' . $intday;

						}

					}

					return $strreturn;

				}

				

				public static function convert_date_to_ddmmyyyy ( $date ) {

					$strreturn = '';

					if ( $date != '' ) {

						$ardate = explode('-', $date);

						if ( is_array($ardate) && count($ardate) ) {

							$strreturn = str_pad((int) $ardate[2], 2, '0', STR_PAD_LEFT) . '-' . str_pad((int) $ardate[1], 2, '0', STR_PAD_LEFT) . '-' . (int) $ardate[0];

						}

					}

					return $strreturn;

				}

				

				public static function convert_value ( $data_type, $value ) {

					$return_value = $value;

					if ( $data_type != '' ) {

						switch ( $data_type ) {

							case 'varchar':

								$return_value = (string) $value;

								break;	

							case 'char':

								$return_value = (string) $value;

								break;	

							case 'date':

								$return_value = self::convert_date_to_mysql_format($value);

								break;	

							case 'float':

								$return_value = (float) $value;

								break;	

							case 'int':

								$return_value = (int) $value;

								break;	

						}

					}

					return $return_value;

				}

								

				public static function fill_select_box ( $table, $value_field, $display_field, $selected_value = '' ) {

					$strquery = 'SELECT ' . $value_field . ', ' . $display_field . ' FROM ' . DB_PREFIX . $table . ' WHERE 1=1 order by ' . $display_field;

					$rstable = mysql_query($strquery) or die(mysql_error());

					if ( $rstable && mysql_num_rows($rstable) ) {

						while ( $arrecord = mysql_fetch_array($rstable) ) {

							$strselected = '';

							if ( common::get_value($arrecord[0]) == $selected_value ) {

								$strselected = 'selected="selected"';

							}

?>

							<option value="<?php echo common::get_value($arrecord[0]); ?>" <?php echo $strselected; ?>><?php echo htmlspecialchars(common::get_value($arrecord[1])); ?></option>

<?php

						}

					}

					mysql_free_result($rstable);

				}

				
				
				public static function fill_select_box_condition ( $table, $value_field, $display_field, $selected_value = '', $condition ) {
					$strquery = 'SELECT ' . $value_field . ', ' . $display_field . ' FROM ' . DB_PREFIX . $table . ' WHERE 1=1 ' . $condition . ' order by ' . $display_field;
					$rstable = mysql_query($strquery) or die(mysql_error());
					if ( $rstable && mysql_num_rows($rstable) ) {
						while ( $arrecord = mysql_fetch_array($rstable) ) {
							$strselected = '';
							if ( common::get_value($arrecord[$value_field]) == $selected_value ) {
								$strselected = 'selected="selected"';
							}
?>
							<option value="<?php echo common::get_value($arrecord[$value_field]); ?>" <?php echo $strselected; ?>><?php echo htmlspecialchars(common::get_value($arrecord[$display_field])); ?></option>
<?php
						}
					}
					mysql_free_result($rstable);
				}
				
												

				public static function set_cookie ( $key, $value, $expiry_time ) {

					setcookie($key, $value, $expiry_time);

				}

				

				public static function get_field_value_array ( $table, $field, $primary_key_field = '', $primary_key_value = '' ) {

					$arreturn = array();

					$strquery = 'SELECT ' . $field . ' FROM ' . DB_PREFIX . $table . ' WHERE 1 = 1';

					if ( common::set_value($primary_key_field) != '' && common::get_value($primary_key_value) != '' ) {

						$strquery .= ' AND ' .  common::get_value($primary_key_field) . ' = ' . (int) $primary_key_value;

					}

					$recordset = mysql_query($strquery) or die(mysql_error());

					if ( $recordset && mysql_num_rows($recordset) ) {

						for ( $intcounter = 0; $intcounter < mysql_num_fields($recordset); $intcounter++ ) {

							$arreturn[] = common::get_value(mysql_result($recordset, 0, $field));

						}

					}

					mysql_free_result($recordset);

					return $arreturn;

				}

				

				public static function print_array ( $array ) {

?>

					<pre>

						<?php

							print_r($array);

						?>

					</pre>

<?php

				}

				

				public static function get_component ( ) {

					$component = '';

					$action = '';

					if ( isset($_GET['component']) && trim($_GET['component']) != '' ) {

						$component = self::get_value($_GET['component']);	

					}

					if ( isset($_GET['action']) && trim($_GET['action']) != '' ) {

						$action = self::get_value($_GET['action']);	

					}

					if ( $component == '' || $action == '' ) {

						$return = array(

														'home'
														, 'home'

													);

						if ( self::is_user_loggedin() ) {
                            if(self::get_session(ADMIN_LOGIN_TYPE)=="admin")
							$return = array('user', 'dashboard');
                            else  if(self::get_session(ADMIN_LOGIN_TYPE)=="doctor")
                            $return = array('doctor', 'dashboard');	

						}else if(self::check_session(DR_LOGIN_USER_ID) && self::check_session(DR_LOGIN_USER_NAME)){
						      $return = array('doctor', 'dashboard');
						}

					}

					else {
                        
						$return = array(

														$component

														, $action

													);	

					}

					/*if ( ! self::is_user_loggedin() ) {
                    
						$return = array(

														'home'

														, 'home'

													);

					}*/

					return $return;

				}

				

				public static function is_component_renderable ( $component ) {

					$return = false;

					$component_file = COMPONENTS_DIR . $component[0] . '/' . $component[1] . '.php';

					if ( file_exists($component_file) && is_file($component_file) ) {

						$return = true;

					}

					return $return;

				}

								

				public static function import_component_javascript ( $component ) {

					$component_css_js = COMPONENTS_DIR . $component[0] . '/' . COMPONENTS_INCLUDE_DIR . $component[1] . '-css-js.php';

					if ( file_exists($component_css_js) && is_file($component_css_js) ) {

						require_once $component_css_js;

					}

				}

								

				public static function get_component_link ( $component_array,$parms="") {
                    $return = "";
                    if(!REWRITE_URL){
					$return = 'index.php';

					if ( is_array($component_array) && count($component_array) == 2 ) {
                        
						if ( self::get_value($component_array[0]) != '' && common::get_value($component_array[1]) != '' ) {
                            $extraparms = "";
                            if(is_array($parms))
                            {
                                $i=0;
                                foreach($parms as $k=>$p)
                                {
                                    $extraparms .=$k."=".$p;
                                    if(i<count($parms)-1){
                                        $extraparms.="&";
                                    }
                                }
                            }else
                            {
                                $extraparms = trim($parms);
                            }
							$return .= '?component=' . self::get_value($component_array[0]) . '&action=' . common::get_value($component_array[1]);
                            if($extraparms!="")
                                $return .='&'.$extraparms;
                                
						}

					}
                    }else
                    {
                        $return = SITE_URL;
                        if ( is_array($component_array) && count($component_array) == 2 ) {

						if ( self::get_value($component_array[0]) != '' && common::get_value($component_array[1]) != '' ) {

                            $extraparms = "";
                            if(is_array($parms))
                            {
                                $i=0;
                                foreach($parms as $k=>$p)
                                {
                                    $extraparms .=$k."/".$p;
                                    if(i<count($parms)-1){
                                        $extraparms.="/";
                                    }
                                }
                            }else
                            {
                                $extraparms = trim($parms);
                            }
							$return .= '/' . self::get_value($component_array[0]) . '/' . common::get_value($component_array[1]);
                            if($extraparms!="")
                                $return .='/'.$extraparms;
                                
						}

					   }
                    }
					return $return;

				}

				

				public static function get_control_value ( $control_name, $default_value = '') {

					$return = $default_value;

					if ( isset($_REQUEST[$control_name]) ) {

						$return = mysql_real_escape_string(trim($_REQUEST[$control_name]));

					}

					return $return;

				}

				

				public static function db_compatible_text ( $text ) {

					$text = str_replace('\'', '&rsquo;', trim($text));

					return $text;

				}

				

				public static function is_live_file ( $file_name ) {

					$live_file = false;

					if ( file_exists($file_name) && is_file($file_name) ) {

						$live_file = true;	

					}

					return $live_file;

				}

				

				public static function get_relative_path ( $path ) {

					$return = $path;

					if ( strpos(dirname($_SERVER['SCRIPT_FILENAME']), 'prdadmin') ) {

						$return = '../' . $path;

					}

					return $return;

				}

                public static function seoUrl($string) {
                    //Ind�sirable:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
                    $string = strtolower($string);
                    //�ffacer  les caract�res ind�sirables
                    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
                    //nettoyer les multiples tirets ou les espaces
                    $string = preg_replace("/[\s-]+/", " ", $string);
                    //Convertir les espaces et les underscore en tirets
                    $string = preg_replace("/[\s_]/", "-", $string);
                    return $string;
                }


                public static  function getUrlWithout($getNames){ 
                  $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; 
                  $questionMarkExp = explode("?", $url); 
                  $urlArray = explode("&", $questionMarkExp[1]); 
                  $retUrl=$questionMarkExp[0]; 
                  $retGet=""; 
                  $found=array(); 
                  foreach($getNames as $id => $name){ 
                        foreach ($urlArray as $key=>$value){ 
                            if(isset($_GET[$name]) && $value==$name."=".$_GET[$name]) 
                                unset($urlArray[$key]); 
                      } 
                  } 
                  $urlArray = array_values($urlArray); 
                  foreach ($urlArray as $key => $value){ 
                      if($key<sizeof($urlArray) && $retGet!=="") 
                          $retGet.="&"; 
                      $retGet.=$value; 
                  } 
                  return $retUrl."?".$retGet; 
              } 
              
              
              public static function send_mail($to,$subject,$body)
              {

                            $mail             = new PHPMailer();
                            $body             = eregi_replace('[\]','',$body);
                            
                            $mail->IsSMTP(); // la classe � utiliser SMTP
                            $mail->Host       = SMTP_SERVER; // serveur SMTP
                            $mail->SMTPDebug  = 2;                     // activer les informations de d�bogage SMTP (pour les tests)
                                                                       // 1 = erroeurs et msg
                                                                       // 2 = msg seulement
                            $mail->SMTPAuth   = true;                  // activer l'authentification SMTP
                            $mail->Host       = SMTP_SERVER;      // d�finir GMAIL comme le serveur SMTP
                            $mail->Port       = 25;                   // d�finir le port SMTP pour le serveur GMAIL
                            $mail->Username   = SMTP_USER;  // Nom utilisateur de GMAIL
                            $mail->Password   = SMTP_PASSWORD;            // Mot de passe de GMAIL
                            
                            $mail->SetFrom(SMTP_USER);
                            
                            $mail->AddReplyTo(SMTP_USER);
                            
                            $mail->Subject    = $subject;
                            
                            $mail->AltBody    = "Pour afficher le message, s'il vous pla&icirc;t utiliser un HTML compatible avec e-mail viewer!";
                            
                            $mail->MsgHTML($body);
                            
                            if(is_array($to))
                            {
                                $address=$to[0];
                                $name=$to[1];
                            }else
                            {
                                $address = $to;
                                $name="";
                            }
                            $mail->AddAddress($address, $name);
                            
                            
                            if(!$mail->Send()) {
                              echo "Mailer Erreur: " . $mail->ErrorInfo;
                              return false;  
                            } else {
                              return true;
                            }

              }
              
              public static function get_pages_list($gpages,$cpage)
              {

                    echo "<ul class='pageing'>";
                    echo "<li class='disabled'><a href=''>Trouver plus : </a></li>";
                    for($i=1;$i<=$gpages;$i++)
                    {
                        $query = implode('&',$_GET); 
                        echo "
                        <li class=";
                            if($i==$cpage) { 
                                echo "active"; 
                            }
                        echo "><a href='?go=$i'>$i</a></li>";
                        
                    }
                        
                    
                    echo "</ul>";
              }
              public static function get_page_list2($gpages,$cpage)
              {
                $query = "";
                $count = 0;
                foreach($_GET as $k=>$v)
                {
                    if($count==0)
                    {
                        if($k!="go")
                            $query .= $k."=".$v;
                    }else
                    {
                        if($k!="go")
                            $query .="&".$k."=".$v;
                    }    
                    $count++;
                }
                                        $link="search.php?".$query;
                                       echo "<ul class='pagination'>";
										echo	"<li><a href='".$link."&go=1' title='First Page'>&laquo; First</a></li><li><a href='".$link."&go=".($cpage-1)."' title='Previous Page'>&laquo; Previous</a></li>";
										for($i=1;$i<=$gpages;$i++)
                                        {	
                                            echo "<li><a href='".$link."&go=$i' class='number' title='1'>$i</a></li>";
										}
                                        
                                        echo "<li><a href='".$link."&go=".($cpage+1)."' title='Next Page'>Next &raquo;</a></li><li><a href='".$link."&go=$gpages' title='Last Page'>Last &raquo;</a></li>";
									   echo	"</ul>";
              }


			  public static function current_component_link()
              {
                    return "index.php?component=".self::get_control_value('component')."&action=".self::get_control_value('action');
              }	
              public static function xml_entities($text, $charset = 'UTF-8'){
                    
                    $text = utf8_encode(htmlspecialchars($text, ENT_COMPAT, $charset));
                	
                	$search = array ("&pound;");
                    $replace =  array("&#163;");
                
                    return str_replace($search, $replace, $text);
                }
                
                public static function load_model($component,$action="")
              {
                if($component!="" && $action!=""){
                    $component_startup_file = MODEL_DIR . $component . '/' . $action . '.php';
                	if ( file_exists($component_startup_file) && is_file($component_startup_file) ) {
                		include_once $component_startup_file;
                	}else {
                	   echo "Module non trouv&eacute;";
                	}
                }else if($component!="" && $action=="")
                {
                    $action = $component;
                    $component = $_REQUEST["component"];
                    $component_startup_file = MODEL_DIR . $component . '/' . $action . '.php';
                	if ( file_exists($component_startup_file) && is_file($component_startup_file) ) {
                		include_once $component_startup_file;
                	}else {
                	   echo "Module non trouv&eacute;";
                	}
                }else{
                    
                }
              }
              public static function load_view($component,$action)
              {
                $component_startup_file = VIEW_DIR . $component . '/' . $action . '.php';
            	if ( file_exists($component_startup_file) && is_file($component_startup_file) ) {
            		include_once $component_startup_file;
            	}
              }
              public static function load_action($component,$action)
              {
                $component_startup_file = COMPONENTS_DIR . $component . '/' . $action . '.php';
            	if ( file_exists($component_startup_file) && is_file($component_startup_file) ) {
            		include_once $component_startup_file;
            	}
              }
              public static function elements($element)
              {
                $component_startup_file = ELEMENT_DIR . $element . '.php';
            	if ( file_exists($component_startup_file) && is_file($component_startup_file) ) {
            		include_once $component_startup_file;
            	}
              }
              public static function plugins($plugins)
              {
                $component_startup_file = PLUGIN_DIR . $plugins . '.php';
            	if ( file_exists($component_startup_file) && is_file($component_startup_file) ) {
            		include_once $component_startup_file;
            	}
              }





public static function my_str_split($string)
   {
      $slen=strlen($string);
      for($i=0; $i<$slen; $i++)
      {
         $sArray[$i]=$string{$i};
      }
      return $sArray;
   }
public static   function noDiacritics($string)
   {
      //transcription cyrillique
      $cyrylicFrom = array('?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
      $cyrylicTo   = array('A', 'B', 'W', 'G', 'D', 'Ie', 'Io', 'Z', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'Ch', 'C', 'Tch', 'Sh', 'Shtch', '', 'Y', '', 'E', 'Iu', 'Ia', 'a', 'b', 'w', 'g', 'd', 'ie', 'io', 'z', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'ch', 'c', 'tch', 'sh', 'shtch', '', 'y', '', 'e', 'iu', 'ia'); 
 
      
      $from = array("�", "�", "�", "�", "A", "A", "�", "�", "A", "�", "C", "C", "C", "C", "�", "D", "�", "�", "�", "�", "E", "�", "�", "E", "E", "E", "?", "G", "G", "G", "G", "�", "�", "�", "�", "a", "a", "�", "�", "a", "�", "c", "c", "c", "c", "�", "d", "d", "�", "�", "�", "e", "�", "�", "e", "e", "e", "?", "g", "g", "g", "g", "H", "H", "I", "�", "�", "I", "�", "�", "I", "I", "?", "J", "K", "L", "L", "N", "N", "�", "N", "�", "�", "�", "�", "�", "O", "�", "O", "�", "h", "h", "i", "�", "�", "i", "�", "�", "i", "i", "?", "j", "k", "l", "l", "n", "n", "�", "n", "�", "�", "�", "�", "�", "o", "�", "o", "�", "R", "R", "S", "S", "�", "S", "T", "T", "�", "�", "�", "�", "�", "U", "U", "U", "U", "U", "U", "W", "�", "Y", "�", "Z", "Z", "�", "r", "r", "s", "s", "�", "s", "�", "t", "t", "�", "�", "�", "�", "�", "u", "u", "u", "u", "u", "u", "w", "�", "y", "�", "z", "z", "�");
      $to   = array("A", "A", "A", "A", "A", "A", "A", "A", "A", "AE", "C", "C", "C", "C", "C", "D", "D", "D", "E", "E", "E", "E", "E", "E", "E", "E", "G", "G", "G", "G", "G", "a", "a", "a", "a", "a", "a", "a", "a", "a", "ae", "c", "c", "c", "c", "c", "d", "d", "d", "e", "e", "e", "e", "e", "e", "e", "e", "g", "g", "g", "g", "g", "H", "H", "I", "I", "I", "I", "I", "I", "I", "I", "IJ", "J", "K", "L", "L", "N", "N", "N", "N", "O", "O", "O", "O", "O", "O", "O", "O", "CE", "h", "h", "i", "i", "i", "i", "i", "i", "i", "i", "ij", "j", "k", "l", "l", "n", "n", "n", "n", "o", "o", "o", "o", "o", "o", "o", "o", "o", "R", "R", "S", "S", "S", "S", "T", "T", "T", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "W", "Y", "Y", "Y", "Z", "Z", "Z", "r", "r", "s", "s", "s", "s", "B", "t", "t", "b", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "w", "y", "y", "y", "z", "z", "z");
      
      
      $from = array_merge($from, $cyrylicFrom);
      $to   = array_merge($to, $cyrylicTo);
      
      $newstring=str_replace($from, $to, $string);   
      return $newstring;
   }
   public static function generateSlug($table,$string,$count=0){
        $slug = self::makeSlugs($string);
        $sql = "select * from `".$table."` where slug = '".$slug."'";
        $res = mysql_query($sql);
        if($res){
            if(mysql_num_rows($res)>0){
                $count++;
                return self::generateSlug($table,$string."-".$count,$count);
            }else{
                return $slug;
            }
        }else{
            return $slug;
        }
   }
public static    function makeSlugs($string, $maxlen=0)
   {
      $newStringTab=array();
      $string=strtolower(self::noDiacritics($string));
      if(function_exists('str_split'))
      {
         $stringTab=str_split($string);
      }
      else
      {
         $stringTab=my_str_split($string);
      }

      $numbers=array("0","1","2","3","4","5","6","7","8","9","-");
      

      foreach($stringTab as $letter)
      {
         if(in_array($letter, range("a", "z")) || in_array($letter, $numbers))
         {
            $newStringTab[]=$letter;
           
         }
         elseif($letter==" ")
         {
            $newStringTab[]="-";
         }
      }

      if(count($newStringTab))
      {
         $newString=implode($newStringTab);
         if($maxlen>0)
         {
            $newString=substr($newString, 0, $maxlen);
         }
         
         $newString = self::removeDuplicates('--', '-', $newString);
      }
      else
      {
         $newString='';
      }      
      
      return $newString;
   }
public static    function checkSlug($sSlug)
   {
      if(ereg ("^[a-zA-Z0-9]+[a-zA-Z0-9\_\-]*$", $sSlug))
      {
         return true;
      }
      
      return false;
   }
public static    function removeDuplicates($sSearch, $sReplace, $sSubject)
   {
      $i=0;
      do{
      
         $sSubject=str_replace($sSearch, $sReplace, $sSubject);         
         $pos=strpos($sSubject, $sSearch);
         
         $i++;
         if($i>100)
         {
            die('removeDuplicates() loop error');
         }
         
      }while($pos!==false);
      
      return $sSubject;
   }


function base_url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}
function get_segment($index)
{
    $segment = explode('/',$_REQUEST["segment"]);
    return trim($segment[$index]);
}


		}

	

?>