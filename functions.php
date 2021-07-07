<?php
function getDateTime($date) {
    $time = strtotime($date);
    $month_name = array(1 => 'января', 2 => 'февраля', 3 => 'марта',
        4 => 'апреля', 5 => 'мая', 6 => 'июня',
        7 => 'июля', 8 => 'августа', 9 => 'сентября',
        10 => 'октября', 11 => 'ноября', 12 => 'декабря',
    );
    $month = $month_name[date('n', $time)];
    $day = date('j', $time);	$year = date('Y', $time);
    $hour = date('H', $time);	$min = date('i', $time);
    $date = "$day $month $year | $hour : $min";
    return $date;
}