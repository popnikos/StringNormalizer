<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Popnikos\StringNormalizer;

/**
 * Description of AlphaNumeric
 *
 * @author popnikos
 */
class AlphaNumeric extends AbstractNormalizer {

    const ALLOW_ACCENT = 1;
    const ALLOW_LIGATURE = 2;

    public function normalize($str = '') {
        // Extra options
        $options = func_num_args()<2?null:func_get_arg(1);
        $accent='';
        $lig = '';
        if ($options) {
            if ($options & AlphaNumeric::ALLOW_ACCENT) {
                $accent = NoAccent::accentuatedStringList();
            }
            if ($options & AlphaNumeric::ALLOW_LIGATURE) {
                $lig = NoLigature::ligaturedStringList();
            }
        }
        $pattern = "/[^a-zA-Z0-9{$accent}{$lig}]/u";
        $normalized = preg_replace($pattern, ' ', $str);
        return (new NoMultipleWhiteSpace)->normalize($normalized);
    }

}
