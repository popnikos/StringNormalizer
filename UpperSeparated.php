<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer;

/**
 * Description of UpperSeparated
 * Add 
 * @author popnikos
 */
class UpperSeparated extends AbstractNormalizer{
    public function normalize($str = '') {
        return preg_replace_callback('/(\P{Lu})(\p{Lu})/u', function ($matched){
            if (preg_match('/\s/u', $matched[1])) {
                return "{$matched[1]}{$matched[2]}";
            }
            return "{$matched[1]} {$matched[2]}";}, $str);
    }
}
