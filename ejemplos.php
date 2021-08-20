<?php

$array1 = array("a" => 1, "b" => 2, "c" => 3);
$array2 = array("1" => 1, "2" => 2, "3" => 3);

function ejemplo($pepito, $juanito) {
    echo "$juanito. $pepito<br />\n";
}

array_walk($array1, 'ejemplo');
array_walk($array2, 'ejemplo');