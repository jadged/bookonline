<?php

function filled_out($form_vars){
    //проверить что каждая переменная имеет значение
    foreach ($form_vars as $key=>$value){
        if((!isset($key))||($value==""))
            return false;
    }
    return true;
}

function valid_email($adress){
    //проверить допустимость адреса электронной почты
    if (preg_match('/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])' .
                   '(([a-z0-9-])*([a-z0-9]))+' .
                   '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i', $adress)){
        return true;
    }else{
        return false;
    }
}

