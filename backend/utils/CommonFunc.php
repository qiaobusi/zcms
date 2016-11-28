<?php

namespace backend\utils;

class CommonFunc
{
		public static function getErrorInfo($error)
    {
    		$array = array_values($error);
    		$info = $array[0];
    		
    		return $info;
    }
}


?>