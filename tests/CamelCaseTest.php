<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer\Tests;

use PHPUnit\Framework\TestCase;
use Popnikos\StringNormalizer\CamelCase;
/**
 * Description of CamelCaseTest
 *
 * @author popnikos
 */
class CamelCaseTest extends TestCase {
    
    private function normalize($str) {
        return (new CamelCase)->normalize($str);
    }
    
    public function getCase()
    {
        return [
            ['azertyUIOP','azertyuiop'],
            ['azerty.UIOP','azertyUiop'],
            ['azerty.U 42ç§IOP','azertyU42cIop'],
            ['àzerty.UIOP','azertyUiop'],
            ['æzærty.UIOP','aezaertyUiop'],
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
