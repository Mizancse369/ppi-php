<?php

function multiplication($table)
{
    for ($i = 1; $i <= 10; $i++) {
        echo $table.'x'.$i.'='.$table * $i.'<br/>';
    }

    echo '<hr/>';
}

multiplication(5);


