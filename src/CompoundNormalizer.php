<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer;

use Exception;
use InvalidArgumentException;

/**
 * Description of CompoundNormalizer
 * Build a sequence of normalization to apply on a string
 * @author popnikos
 */
class CompoundNormalizer extends AbstractNormalizer
{
    /**
     *
     * @var string Ordered normalizer classes names to call
     */
    private $classes=[];
    
    public function normalize($str='') {
        $normalized = array_reduce($this->classes, function($str,$class){
            return (new $class)($str);
        }, strval($str));
        return $normalized;
    }

    public function add($normalizerClass) {
        if (!class_exists($normalizerClass)) { 
            throw new Exception("{$normalizerClass} doesn't exists");
        }
        if (!is_subclass_of($normalizerClass, AbstractNormalizer::class)) {
            throw new InvalidArgumentException("{$normalizerClass} must be instance of " . AbstractNormalizer::class);
        }
        $this->classes[] = $normalizerClass;
        return $this;
    }

}
