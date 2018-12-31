<?php
	class form_validation
	{
		public static $validation_array = array();
		public static $error = '';
		public static $error_message = array();
		public static $template_error_message = array (
														0 => '<li>&ndash; Sil vous pla&icirc;t entrer ##field_name##.</li>'
														,1 => '<li>&ndash; Sil vous pla&icirc;t s&eacute;lectionner une option dans ##field_name##.</li>'
														,2 => '<li>&ndash; Sil vous pla&icirc;t entrer des entiers valides (0-9) dans ##field_name##.</li>'
														,3 => '<li>&ndash; Sil vous pla&icirc;t entrer une valeur qui est sup&eacute;rieure &agrave; ##compare_with_value## in ##field_name##.</li>'
														,4 => '<li>&ndash; valeur en double trouv&eacute;e dans ##field_name##, sil vous pla&icirc;t entrer une autre valeur.</li>'
														,5 => '<li>&ndash; Sil vous pla&icirc;t entrer les chiffres valides (0-9, .(point)) en ##field_name##.</li>'
														,6 => '<li>&ndash; Sil vous pla&icirc;t entrer inf&eacute;rieure ou &eacute;gale &agrave; ##max_length## charact&egrave;res dans ##field_name##.</li>'
														,7 => '<li>&ndash; Sil vous pla&icirc;t s&eacute;lectionner un fichier pour ##field_name##.</li>'
														,8 => '<li>&ndash; Sil vous pla&icirc;t s&eacute;lectionner un fichier valide pour##field_name##, extension(s) de fichiers valides sont ##valid_file_extension##.</li>'
														,9 => '<li>&ndash; Sil vous pla&icirc;t entrer une adresse valide ##field_name##.</li>'
														,10 => '<li>&ndash; ##field_name## doit correspondre avec ##field2_name##.</li>'
														,11 => '<li>&ndash; Sil vous pla&icirc;t entrez le code de s&eacute;curit&eacute; valide.</li>'
														,12 => '<li>&ndash; Sil vous pla&icirc;t s&eacute;lectionner au moins une option ##field_name##.</li>'
                                                        ,12 => '<li>&ndash; Le champs ne doit pas contenir des espaces ##field_name##.</li>'
                                                        ,13 => '<li>&ndash; Le champs ne doit pas contenir des espaces ou de caract&egrave;res sp&eacute;ciaux ##field_name##.</li>'
														,100=> '<li>Erreur &agrave; la page rediriger.</li>'
													);
		public static function add_validation ( $control_name, $validation_type, $control_friendly_name, $extra_args = '', $custom_error_message = '' ) {
			$array = array();
			$array['control_name'] = $control_name;
			$array['validation_type'] = $validation_type;
			$array['control_friendly_name'] = $control_friendly_name;
			$array['extra_args'] = $extra_args;
			$array['custom_error_message'] = $custom_error_message;
			self::$validation_array[] = $array;
		}
		
		public static function validate_fields ( ) {
			$return = false;
			if ( is_array(self::$validation_array) && count(self::$validation_array) ) {
				foreach ( self::$validation_array as $validation ) {
					if ( is_array($validation) && count($validation) ) {
							$strcontrol_name = trim($validation['control_name']);
							switch ( trim($validation['validation_type']) ) {
								case 'required': //champ obligatoire
                                    if(is_array($_REQUEST[$strcontrol_name]))
                                    {
                                        if ( empty($_REQUEST[$strcontrol_name])) {
										self::$error_message[] = str_replace('##field_name##', strtolower(common::get_value($validation['control_friendly_name'])), self::$template_error_message[0]);
									   }
                                    }else
                                    {
									if ( trim($_REQUEST[$strcontrol_name]) == '' ) {
										self::$error_message[] = str_replace('##field_name##', strtolower(common::get_value($validation['control_friendly_name'])), self::$template_error_message[0]);
									}
                                    }
									break;
								case 'selone': //selectionner un choix
									if ( trim($_REQUEST[$strcontrol_name]) == '' ) {
										self::$error_message[] = str_replace('##field_name##', strtolower(common::get_value($validation['control_friendly_name'])), self::$template_error_message[12]);
									}
									break;
                                case 'slug' :
                                    if(ereg ("^[a-zA-Z0-9]+[a-zA-Z0-9\_\-]*$", $sSlug))
                                    {
                                        self::$error_message[] = str_replace('##field_name##', strtolower(common::get_value($validation['control_friendly_name'])), self::$template_error_message[13]);   
                                    }
                                    break;
                                case 'no_space':
                                    if ( preg_match('/\s/',trim($_REQUEST[$strcontrol_name])) )
                                    {
                                        self::$error_message[] = str_replace('##field_name##', strtolower(common::get_value($validation['control_friendly_name'])), self::$template_error_message[13]);
                                    }
                                    break;
								case 'compare': //comparer deux controles
									$extra_args = explode('|', $validation['extra_args']);
									$compare_with = common::get_value($extra_args[0]);
									if ( trim($_REQUEST[$strcontrol_name]) != trim($_REQUEST[$compare_with]) ) {
										if ( trim($validation['custom_error_message']) != '' ) {
											self::$error_message[] = trim($validation['custom_error_message']);
										}
										else {
											$error_message = str_replace('##field_name##', ucfirst(common::get_value($validation['control_friendly_name'])), self::$template_error_message[10]);
											$error_message = str_replace('##field2_name##', strtolower(common::get_value($extra_args[1])), $error_message);											
											self::$error_message[] = $error_message;
										}
									}
									break;
								case 1: //seulement des nombres entiers
									if ( preg_match('/\D/', trim($_REQUEST[$strcontrol_name])) == true ) {
										self::$error_message[] = str_replace('##field_name##', strtolower(common::get_value($validation['control_friendly_name'])), self::$template_error_message[2]);
									}
									break;
								case 'floatonly': //seulement des nombres réels
									if ( preg_match('/[0-9.]/', trim($_REQUEST[$strcontrol_name])) == false ) {
										self::$error_message[] = str_replace('##field_name##', strtolower(common::get_value($arfield['field_caption'])), self::$template_error_message[5]);
									}
									break;
								case 'max_length': //max long
									$intvalue_length = strlen(trim($_REQUEST[$strcontrol_name]));
									$intmax_length = (int) $validation['extra_args'];
									if ( $intvalue_length > $intmax_length ) {
										self::$error_message[] = str_replace('##max_length##', (string) intval($intmax_length), str_replace('##field_name##', strtolower(common::get_value($validation['control_friendly_name'])), self::$template_error_message[6]));
									}
									break;
								case 4: //plus grand que
									$compare_with_value = (float) $arfield['validation'][$intcounter]['add_parameters'];
									if ( ! (floatval($_REQUEST[$strcontrol_name]) > $compare_with_value) ) {
										$strerror_message = str_replace('##compare_with_value##', $compare_with_value, self::$template_error_message[3]);	
										self::$error_message[] = str_replace('##field_name##', strtolower(common::get_value($arfield['field_caption'])), $strerror_message);									
									}
									break;
								case 'duplicate': //validation en double
									if ( trim($_REQUEST[$strcontrol_name]) != '' ) {
										$extra_args = explode('|',common::get_value($validation['extra_args']));
										if ( is_array($extra_args) && count($extra_args) ) {
											$strtable = common::get_value($extra_args[0]);
											$strduplicate_field = common::get_value($extra_args[1]);
											$strprimary_key_field = common::get_value($extra_args[2]);
											$intprimary_key_field_value = common::get_value($extra_args[3]);
											$strcondition = common::get_value($extra_args[4]);
											$strduplicate_field_value = common::set_value($_REQUEST[$strcontrol_name]);
											$strquery = 'SELECT '.$strprimary_key_field.' FROM '.$strtable.' WHERE '.$strduplicate_field.' = \''.$strduplicate_field_value.'\' AND '.$strprimary_key_field.' <> '.$intprimary_key_field_value.' AND '.$strcondition . ' LIMIT 1';
											$rsduplicate_recs = mysql_query($strquery) or die(mysql_error());
											if ( $rsduplicate_recs && mysql_num_rows($rsduplicate_recs) ) {
												if ( trim($validation['custom_error_message']) != '' ) {
													self::$error_message[] = trim($validation['custom_error_message']);
												}
												else {
													self::$error_message[] = str_replace('##field_name##', strtolower(common::get_value($validation['control_friendly_name'])), self::$template_error_message[4]);
												}
											}
											mysql_free_result($rsduplicate_recs);
										}
									}
									break;
								case 'required_file': //fichier requis
									if ( $validation['extra_args'] == 'add' ) {
										if ( ( ! isset($_FILES[$strcontrol_name]) ) || common::get_value($_FILES[$strcontrol_name]["name"]) == '' || intval($_FILES[$strcontrol_name]['size']) <= 0 ) {
											self::$error_message[] = str_replace('##field_name##', strtolower(common::get_value($validation['control_friendly_name'])), self::$template_error_message[7]);
										}
									}
									break;
								case 'file_extension': //extension de fichier
									if ( isset($_FILES[$strcontrol_name]) && common::get_value($_FILES[$strcontrol_name]['name']) != '' && intval($_FILES[$strcontrol_name]['size']) > 0 ) {
										$arfile_info = pathinfo($_FILES[$strcontrol_name]['name']);
										if ( is_array($arfile_info) && count($arfile_info) ) {
											$strfile_extension = strtolower(common::get_value($arfile_info['extension']));
											$strallowed_extension = common::get_value($validation['extra_args']);
											$aradd_parameters = explode(',' ,$strallowed_extension);
											if ( ! in_array($strfile_extension, $aradd_parameters) ) {
												$strerror_message = str_replace('##field_name##', strtolower(common::get_value($validation['control_friendly_name'])), self::$template_error_message[8]);
												self::$error_message[] = str_replace('##valid_file_extension##', strtolower(implode(', ', explode(',', common::get_value($strallowed_extension)))), $strerror_message);
											}
										}
									}
									break;
								case 'email': //valide email
									$strfield_value = trim($_REQUEST[$strcontrol_name]);
									if ( $strfield_value != '' ) {
										$pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
										if ( ! preg_match($pattern, $strfield_value) ) {
											self::$error_message[] = str_replace('##field_name##', strtolower(common::get_value($validation['control_friendly_name'])), self::$template_error_message[9]);
										}
									}
									break;
								case 'captcha': //champs requis
									if ( trim($_REQUEST[$strcontrol_name]) != $_SESSION['captcha_code'] ) {
										self::$error_message[] = self::$template_error_message[11];
									}
									break;
							}
						}
					}
			}
			//erreur de construction
			if ( count(self::$error_message) ) {
				common::set_message(0, implode('', self::$error_message));
			}
			else {
				$return = true;
			}
			return $return;
		}
	
	}
?>