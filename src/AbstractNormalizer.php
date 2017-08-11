<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer;

use Normalizer;

/**
 * Description of AbstractNormalizer
 *
 * @author popnikos
 */
abstract class AbstractNormalizer implements NormalizerInterface
{
    /**
     * compute the string normalization
     * @return string Normalized representation of $str parameter 
     */
    abstract public function normalize($str='');
}
