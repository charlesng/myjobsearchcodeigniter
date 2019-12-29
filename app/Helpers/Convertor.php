<?php

namespace App\Helpers;

class Convertor
{
    public static function obj2array(&$Instance)
    {
        $clone = (array) $Instance;
        $rtn = array();
        $rtn['___SOURCE_KEYS_'] = $clone;

        foreach ($clone as $key => $value) {
            $aux = explode("\0", $key);
            $newkey = $aux[count($aux) - 1];
            $rtn[$newkey] = &$rtn['___SOURCE_KEYS_'][$key];
        }
        unset($rtn['___SOURCE_KEYS_']);
        return $rtn;
    }
}
