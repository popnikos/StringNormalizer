<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer;

/**
 * Description of Upper
 * @author popnikos
 */
class Upper extends AbstractNormalizer
{
    public function normalize($str = '') {
        return strtoupper($str);
    }
}
