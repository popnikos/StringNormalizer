<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer\Tests;

use PHPUnit\Framework\TestCase;
use Popnikos\StringNormalizer\UpperSeparated;
/**
 * Description of UpperSeparatedTest
 *
 * @author popnikos
 */
class UpperSeparatedTest extends TestCase {
    
    private function normalize($str) {
        return (new UpperSeparated)->normalize($str);
    }
    
    public function getCase()
    {
        return [
            ['azertyUIOP','azerty UIOP'],
            ['azerty UIOP','azerty UIOP'],
            ['azerty.UIOP','azerty. UIOP'],
        ];
    }
    /**
     * @dataProvider getCase
     */
    public function testNormalize($str, $expected)
    {
        $this->assertEquals($expected, $this->normalize($str));
    }
}
