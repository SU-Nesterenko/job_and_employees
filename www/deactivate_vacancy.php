<?php

require_once("../auth/auth.inc.php");
	
	define(VACANCY_ACTIVITY_DELAY, 7);
	#!/usr/bin/php -q
	$loop = React\EventLoop\Factory::create();
	$loop->addPeriodicTimer(86 400, function(){
	Update Vacancy 
	SET [IsActive] = false WHERE [Dates] = Dates + 0000-00-07;
});
?>
