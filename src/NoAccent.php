<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer;

/**
 * Description of NoAccent
 * 
 * @author popnikos
 */
class NoAccent extends AbstractNormalizer
{
    /**
     * picked from http://ie2.php.net/manual/fr/function.strtr.php#90925
     * Ligatured are excluded for this normalization and non latin caracters too
     * 'Đ'=>'Dj', 'đ'=>'dj','Æ'=>'A','æ'=>'a','Þ'=>'B', 'ß'=>'Ss', 'þ'=>'b',
     * @var string[] 
     */
    private static $accents = [
        'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 
        'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
    ];
    
    public function normalize($str = '') {
        return strtr($str, self::$accents);
    }
    
    public static function accentuatedList()
    {
        return array_keys(self::$accents);
    }
    
    public static function unaccentuatedList()
    {
        return array_values(self::$accents);
    }
    
    public static function accentuatedStringList()
    {
        return implode('', self::accentuatedList());
    }
    
    public static function unaccentuatedStringList()
    {
        return implode('', self::unaccentuatedList());
    }
    
    public static function isAccentuated($char) {
        return in_array($char, self::accentuatedList());
    }
}
