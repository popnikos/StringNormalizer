<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer;

/**
 * Description of CamelCase
 *
 * @author popnikos
 */
class CamelCase extends AbstractNormalizer
{
    public function normalize($str = '') {
        return lcfirst(str_replace('_','',ucwords((new SnakeCase)->normalize($str),'_')));
    }
}
