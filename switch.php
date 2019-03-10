<?php

$day = 'Sunday';

switch ($day) {
    case 'Saturday':
    case 'Sunday':
        echo 'We have class on '.$day.'.<br/>';
        break;
    default:
        echo 'We have no class today.<br/>';
}
