<?php

set_time_limit(0);
//error_reporting(0);

$token = '0520c454267b17458c47bf287a596c802cf292908ddccf6d7e51a35e8d98de22399a3c45d67580242e8e25bd';
$number = '+639274990896';
$number = "+16506189523";
#$number = "+16506189549";
#$number = "+7753870523";
#$number = "+6328131126";
#http://api.tropo.com/1.0/sessions?action=create&token=0520b4812300e84188550a6b79755835c1f45f60a7920885f521452123485a8b585664083c34cfc192533ba7&numberToDial=+639274990896&customerName=franz&message=test

include_once 'tropo.class.php';
$tropo = new Tropo(); 
if ($tropo->createSession($token, array('dial' => $number))) {
	
	$tropo->call($number);
	$tropo->say("Tag, francis you're it!"); 	
	print 'Calling ' . $number.'...\n';
	#$tropo->RenderJson();
} else {
  print "call failed! Try it again with the Tropo debugger running to see what the error is.";
}



/*
	try {
	  $session = new Session();  
	  if ($session->getParameters("action") == "create") { 
		$tropo->call($session->getParameters("dial"));
		$tropo->say('This is an outbound call.');
	  } else {

		$tropo->say('Thank you for calling us.');
	  }
	  $tropo->renderJSON();
	} catch (TropoException $e) {
		
	  if ($e->getCode() == '1') { 
		if ($tropo->createSession($token, array('dial' => $number))) {
		  print 'Call launched to ' . $number;
		} else {
		  print "call failed! Try it again with the Tropo debugger running to see what the error is.";
		}
	  }
	}
*/