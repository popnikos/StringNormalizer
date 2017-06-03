<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer;

/**
 * Description of NoLigature
 *
 * @author popnikos
 */
class NoLigature extends AbstractNormalizer{
    private static $ligatured = [
        'Ӕ'=>'AE', 'æ'=>'ae', 'ȸ'=>'db', 'ȹ'=>'qp', 'Ĳ'=>'IJ', 'ĳ'=>'ij', 
        'Œ'=>'OE', 'œ'=>'oe', 'ﬀ'=>'ff', 'ﬁ'=>'fi', 'ﬂ'=>'fl', 'ﬃ'=>'ffi',
        'ﬄ'=>'ffl', 'ﬆ'=>'st', 'ﬅ', 'st'
        
    ];
    
    public function normalize($str = '') {
        return strtr($str,$this->ligaturedStringList(), $this->unligaturedStringList());
    }
    
    public static function ligaturedList()
    {
        return array_keys(self::$ligatured);
    }
    
    public static function unligaturedList()
    {
        return array_values(self::$ligatured);
    }
    
    public static function ligaturedStringList()
    {
        return implode('',  $this->ligaturedList());
    }
    
    public static function unligaturedStringList()
    {
        return implode('',  $this->unligaturedList());
    }
}
