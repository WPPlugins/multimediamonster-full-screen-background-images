<?php
class mmm_fsbi_admin_functions 
{
	// ---------------------------------------------------------------------------------------------------------------------
	// 	FUNCTIONS
	// 	@since									MultiMediaMonster
	// ---------------------------------------------------------------------------------------------------------------------
	
		static function printf_array($format, $arr) 
		{ 
			return call_user_func_array('printf', array_merge((array)$format, $arr)); 
		}
		static function return_replaced_array($format, $arr) 
		{ 
			return call_user_func_array('sprintf', array_merge((array)$format, $arr)); 
		}
		static function loop_array_find_element_by($input_to_check, $what, $array)
		{
			// key or val
			$ret = 0;
			if ($what == 'val')
			{
				if (in_array($input_to_check, $array)) 
				{
					$ret++;
				}
			}
			else
			{
				if (array_key_exists($input_to_check, $array)) 
				{
					$ret++;
				}
			}
			foreach ($array as $k => $v) 
			{
				if (is_array($v)) 
				{
					$ret_child 					= 	self::loop_array_find_element_by($input_to_check, $what, $array[$k]);
					if ($ret_child > 0) 
					{
						$ret++;
					}
				}
			}
			return $ret;
		}
		static function array_find_element_by($input_to_check, $what, $array) 
		{
		  	$ret 							= 	0;
			if (is_array($input_to_check))
			{
				foreach ($input_to_check as $input_to_check_key => $input_to_check_val)
				{
					$ret 					+= 	self::loop_array_find_element_by($input_to_check_val, $what, $array);
				}
			}
			else
			{
				$ret 						+= 	self::loop_array_find_element_by($input_to_check_val, $what, $array);
			}
			if ($ret > 0)
			{
				return $ret;
			}
			return false;
		}
}