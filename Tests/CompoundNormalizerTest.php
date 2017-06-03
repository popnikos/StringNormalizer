<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer\Tests;

use PHPUnit\Framework\TestCase;
use Popnikos\StringNormalizer\CompoundNormalizer;
/**
 * Description of CompoundNormalizerTest
 *
 * @author popnikos
 */
class CompoundNormalizerTest extends TestCase
{
    /**
     * @covers \Popnikos\StringNormalizer\CompoundNormalizer::add
     */
    public function testAddClassNotFound()
    {
        $normalizer = new CompoundNormalizer();
        $args = [
            null,
            'NotFoundClass'
        ];
        foreach ($args as $notAClass) {
            try {
                $normalizer->add($notAClass);
            } catch (\Exception $e) {
                $this->assertInstanceOf(\Exception::class, $e);
            }
        }
    }
    /**
     * @covers \Popnikos\StringNormalizer\CompoundNormalizer::add
     */
    public function testAddBadClassInstance()
    {
        $normalizer = new CompoundNormalizer();
        $args = [
            get_class($this)
        ];
        foreach ($args as $notAClass) {
            try {
                $normalizer->add($notAClass);
            } catch (\InvalidArgumentException $e) {
                $this->assertInstanceOf(\InvalidArgumentException::class, $e);
            }
        }
    }
    
    /**
     * @covers \Popnikos\StringNormalizer\CompoundNormalizer::add
     */
    public function testAdd()
    {
        $normalizer = new CompoundNormalizer();
        $normalizer
                ->add(\Popnikos\StringNormalizer\Lower::class)
                ->add(\Popnikos\StringNormalizer\NoAccent::class)
                ->add(\Popnikos\StringNormalizer\NoLigature::class);
        $strings = [
            'test'=>'test',
            'TeSt Æ'=>'test ae',
            "un café SVP" => 'un cafe svp'
        ];
        foreach ($strings as $str => $result) {
            $this->assertEquals($result,$normalizer->normalize($str));
        }
    }
}
