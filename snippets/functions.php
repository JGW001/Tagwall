<?php

    date_default_timezone_set('Europe/Copenhagen');

    function getBrowser()
    {
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $name = 'NA';

        if (preg_match('/MSIE/i', $agent) && !preg_match('/Opera/i', $agent)) 
            $name = 'Internet Explorer';
        elseif (preg_match('/Firefox/i', $agent)) 
            $name = 'Mozilla Firefox';
        elseif (preg_match('/Chrome/i', $agent)) 
            $name = 'Google Chrome';
        elseif (preg_match('/Safari/i', $agent)) 
            $name = 'Apple Safari';
        elseif (preg_match('/Opera/i', $agent)) 
            $name = 'Opera';
        elseif (preg_match('/Netscape/i', $agent)) 
            $name = 'Netscape';

        return $name;
    }

?>