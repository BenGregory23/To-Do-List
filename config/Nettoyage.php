<?php


class Nettoyage
{
    static function nettoyer_string(string $str):string {
        return filter_var($str,FILTER_SANITIZE_STRING);
    }

    static function nettoyer_int_id($id){
        $id=filter_var($id,FILTER_SANITIZE_NUMBER_INT);
        if ($id = filter_var($id,FILTER_VALIDATE_INT,array("options"=>array("min_range"=>1)))){
            return $id;
        }
        else{
            return -1;
        }
    }

    static function nettoyer_int_page($page){
        $page=filter_var($page,FILTER_SANITIZE_NUMBER_INT);
        if ($page = filter_var($page,FILTER_VALIDATE_INT,array("options"=>array("min_range"=>1)))){
            return $page;
        }
        else{
            return -1;
        }
    }
}
