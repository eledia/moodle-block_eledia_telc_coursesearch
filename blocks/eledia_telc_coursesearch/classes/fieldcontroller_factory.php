<?php
namespace block_eledia_telc_coursesearch;

use core_customfield\field_controller;

class fieldcontroller_factory {
    public static function create(field_controller    $field) {
        $classname = "block_eledia_telc_coursesearch\\" . explode('\\', get_class($field))[0];
        if (!class_exists($classname))
            return false;

        return new $classname($field);
    }
}
