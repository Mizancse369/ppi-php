<?php

$day = 'Sunday';
$days = ['Sunday', 'Saturday'];

if (in_array($day, $days, true)): ?>
    We have class on today.<br/>
<?php else: ?>
    We have no class today.<br/>
<?php endif; ?>
