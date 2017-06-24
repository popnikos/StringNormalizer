<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer\Tests;

use PHPUnit\Framework\TestCase;
use Popnikos\StringNormalizer\AlphaNumeric;
/**
 * Description of AlphaNumericTest
 *
 * @author popnikos
 */
class AlphaNumericTest extends TestCase {
    
    private function normalize($str, $options=null) {
        return (new AlphaNumeric)->normalize($str, $options);
    }
    
    public function getCase()
    {
        return [
            ['azertyUIOP',NULL,'azertyUIOP'],
            ['azerty.UIOP',NULL,'azerty UIOP'],
            ['azerty.U 42ç§IOP',NULL,'azerty U 42  IOP'],
            ['àzerty.UIOP',NULL,' zerty UIOP'],
            ['àzerty.UIOP', AlphaNumeric::ALLOW_ACCENT,'àzerty UIOP'],
            ['æzærty.UIOP',NULL,' z rty UIOP'],
            ['æzærty.UIOP',  AlphaNumeric::ALLOW_LIGATURE,'æzærty UIOP'],
            ['àzærty.UIOP',AlphaNumeric::ALLOW_ACCENT | AlphaNumeric::ALLOW_LIGATURE,'àzærty UIOP'],
        ];
    }
    /**
     * @dataProvider getCase
     */
    public function testNormalize($str, $options, $expected)
    {
        $this->assertEquals($expected, $this->normalize($str,$options));
    }
}
