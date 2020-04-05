<?php
function timeDiff($time, $gran = -1) {

    $d[0] = array(1, 'second');
    $d[1] = array(60, 'minute');
    $d[2] = array(3600, 'hour');
    $d[3] = array(86400, 'day');
    $d[4] = array(604800, 'week');
    $d[5] = array(2592000, 'month');
    $d[6] = array(31104000, 'year');

    $w = array();

    $return = '';
    $database = new mysqli( 'localhost', 'root', '', 'projet' );
    $sqlTimeQuery = 'Select Current_timestamp + 0';
    $sqlTime = $database -> query( $sqlTimeQuery );
    $sqlTime = $sqlTime -> fetch_assoc();
    $now = (int) $sqlTime['Current_timestamp + 0'];
    $diff = ($now - $time);
    $secondsLeft = $diff;
    $stopat = 0;
    for ($i = 6; $i > $gran; $i--) {
        $w[$i] = (int) ($secondsLeft / $d[$i][0]);
        $secondsLeft -= ($w[$i] * $d[$i][0]);
        if ($w[$i] !== 0) {
            $return .= abs( $w[$i] ) . ' ' . $d[$i][1] . (($w[$i] > 1) ? 's' : '') . ' ';
            switch ($i) {
                case 6: // shows years and months
                    if ($stopat === 0) {
                        $stopat = 5;
                    }
                    break;
                case 5: // shows months and weeks
                    if ($stopat === 0) {
                        $stopat = 4;
                    }
                    break;
                case 4: // shows weeks and days
                    if ($stopat === 0) {
                        $stopat = 3;
                    }
                    break;
                case 3: // shows days and hours
                    if ($stopat === 0) {
                        $stopat = 2;
                    }
                    break;
                case 2: // shows hours and minutes
                    if ($stopat === 0) {
                        $stopat = 1;
                    }
                    break;
                case 1: // shows minutes and seconds if granularity is not set higher
                    break;
            }
            if ($i === $stopat) {
                break 1;
            }
        }
    }
    $return .= ($diff > 0) ? 'ago' : 'left';
    return $return;
}