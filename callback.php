<?php

function sum(Closure $callable)
{
    $callable();
}

$callable = function () {
    echo 'Callback function';
};

sum($callable);


