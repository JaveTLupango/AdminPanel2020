<?php


/**
 * Func Controller
 */
class Func_Controller
{
	function _duration($seconds)
	{
	    $ret = "";

	    /*** get the days ***/
	    $days = intval(intval($seconds) / (3600*24));
	    if($days> 0)
	    {
	        $ret .= "$days days ";
	    }
	    else{
	    	$ret .= "0 days ";
	    }
	    /*** get the hours ***/
	    $hours = (intval($seconds) / 3600) % 24;
	    if($hours > 0)
	    {
	        $ret .= "$hours hours ";
	    }
	    else
	    {
	    	$ret .= "0 hours ";
	    }

	    /*** get the minutes ***/
	    $minutes = (intval($seconds) / 60) % 60;
	    if($minutes > 0)
	    {
	        $ret .= "$minutes minutes ";
	    }
	    else
	    {
	    	$ret .= "0 minutes ";
	    }

	    /*** get the seconds ***/
	    $seconds = intval($seconds) % 60;
	    if ($seconds > 0) {
	        $ret .= "$seconds seconds";
	    }

	    return $ret;
	}

	function GenerateUsername($prefix)
	{
		if ($prefix == "")
		{
		  $charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		  $base = strlen($charset);
		  $result = '';

		  $now = explode(' ', microtime())[1];
		  while ($now >= $base){
		    $i = $now % $base;
		    $result = $charset[$i] . $result;
		    $now /= $base;
		  }
		  return substr($result, -10) . substr(round(microtime(true) * 1000), 8);
		}
		else
		{
		 return $prefix . substr(round(microtime(true) * 1000), 8);
		}
	}	
}