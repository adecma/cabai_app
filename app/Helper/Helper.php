<?php
if (! function_exists('active_menu')) {
	function active_menu($currentRouteName, $requestName, $start, $finish) {
		if (substr($currentRouteName, $start, $finish) == $requestName) {
			return 'active';
		}

		return null;
	}
} 

if (! function_exists('num_row')) {
	function num_row($page, $limit) {
		if (is_null($page)) {
			$page = 1;
		}

		$num = ($page * $limit) - ($limit - 1);
		return $num;
	}
}