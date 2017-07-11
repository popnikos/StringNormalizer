<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer;

/**
 * Description of SnakeCase
 *
 * @author popnikos
 */
class SnakeCase extends AbstractNormalizer 
{
    private function getCompoundNormalizer()
    {
        return (new CompoundNormalizer)
                ->add(NoLigature::class)
                ->add(NoAccent::class)
                ->add(AlphaNumeric::class)
                ->add(Lower::class);
    }
    
    public function normalize($str = '') {
        return str_replace(' ','_',$this->getCompoundNormalizer()->normalize($str));
    }
}
