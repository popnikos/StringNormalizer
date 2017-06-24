<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer;

/**
 * Description of NoMultipleWhiteSpace
 *
 * @author popnikos
 */
class NoMultipleWhiteSpace extends AbstractNormalizer{
    public function normalize($str = '') {
        return preg_replace('/\s+/u',' ',$str);
    }
}
