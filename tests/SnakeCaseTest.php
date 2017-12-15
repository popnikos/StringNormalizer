<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer\Tests;

use PHPUnit\Framework\TestCase;
use Popnikos\StringNormalizer\SnakeCase;
/**
 * Description of SnakeCaseTest
 *
 * @author popnikos
 */
class SnakeCaseTest extends TestCase {
    
    private function normalize($str) {
        return (new SnakeCase)->normalize($str);
    }
    
    public function getCase()
    {
        return [
            ['azertyUIOP','azertyuiop'],
            ['azerty.UIOP','azerty_uiop'],
            ['azerty.U 42ç§IOP','azerty_u_42c_iop'],
            ['àzerty.UIOP','azerty_uiop'],
            ['æzærty.UIOP','aezaerty_uiop'],
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
