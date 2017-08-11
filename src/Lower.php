<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer;

/**
 * Description of Lower
 *
 * @author popnikos
 */
class Lower extends AbstractNormalizer{
    public function normalize($str = '') {
        // Lower case string
        return mb_strtolower($str);
    }
}
