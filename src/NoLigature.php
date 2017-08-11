<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer;

/**
 * Description of NoLigature
 * Replace common ligatures by there literal multiple character representation 
 * @author popnikos
 */
class NoLigature extends AbstractNormalizer{
    
    private static $ligatured = [
        'Æ'=>'AE', 'æ'=>'ae', 'ȸ'=>'db', 'ȹ'=>'qp', 'Ĳ'=>'IJ', 'ĳ'=>'ij', 
        'Œ'=>'OE', 'œ'=>'oe', 'ﬀ'=>'ff', 'ﬁ'=>'fi', 'ﬂ'=>'fl', 'ﬃ'=>'ffi',
        'ﬄ'=>'ffl', 'ﬆ'=>'st', 'ﬅ', 'st',
        // cyrilic
        'Ӕ'=>'AE', 'ӕ'=>'ae'
    ];
    
    public function normalize($str = '') 
    {
        return str_replace(self::ligaturedList(), self::unligaturedList(),$str);
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
        return implode('', self::ligaturedList());
    }
    
    public static function unligaturedStringList()
    {
        return implode('', self::unligaturedList());
    }
    
    public static function isLigatured($char) {
        return in_array($char, self::ligaturedList());
    }
}
