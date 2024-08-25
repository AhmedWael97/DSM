<?php

if(!function_exists('translate')) {
    function translate($term) {
        return $term; 
    }
}

if(!function_exists('def_lang')) {
    function def_lang() {
        return 'en';
    }
}

?>