<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer\Tests;

use PHPUnit\Framework\TestCase;
use Popnikos\StringNormalizer\StudlyCaps;
/**
 * Description of StudlyCapsTest
 *
 * @author popnikos
 */
class StudlyCapsTest extends TestCase {
    
    private function normalize($str) {
        return (new StudlyCaps)->normalize($str);
    }
    
    public function getCase()
    {
        return [
            ['azertyUIOP','Azertyuiop'],
            ['azerty.UIOP','Azerty_Uiop'],
            ['azerty.U 42ç§IOP','Azerty_U_42c_Iop'],
            ['àzerty.UIOP','Azerty_Uiop'],
            ['æzærty.UIOP','Aezaerty_Uiop'],
        ];
    }
    /**
     * @dataProvider getCase
     */
    public function testNormalize($str,$expected)
    {
        $this->assertEquals($expected, $this->normalize($str));
    }
}
