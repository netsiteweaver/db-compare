<?php

function debug($var, $die=true)
{
    echo "<pre>";
    print_r($var);
    if($die) die;
}