<?php
function tick_handler()
{
    echo "<br />\n";
}

register_tick_function('tick_handler');

try {
    1 && (throw new Exception('must login', 001));
} catch (Exception $e) {
    echo '<pre>';
    declare(ticks=1) {
        print_r($e->getMessage());
        print_r($e->getPrevious());
        print_r($e->getCode());
        print_r($e->getFile());
        print_r($e->getLine());
        print_r($e->getTrace());
        print_r($e->getTraceAsString());
        print_r($e->__toString());
    }
    echo '</pre>';
}

exit();