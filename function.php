<?php

function sum(float ...$numbers): float
{
    return array_sum($numbers);
}

echo sum(67, 78);
