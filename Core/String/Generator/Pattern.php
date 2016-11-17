<?php

namespace App\Core\String\Generator;

use App\Core\String\GeneratorInterface;
use Hoa\Compiler;
use Hoa\File;
use Hoa\Math;
use Hoa\Regex\Visitor\Isotropic;

class Pattern implements GeneratorInterface {

    /**
     * String pattern
     *
     * @var string
     */
    protected $pattern;

    public function __construct($pattern) {
        $this->pattern = $pattern;
    }

    /**
     *
     * @return string
     */
    public function generate() {
        // generate string with pattern, for example with Hoa\Regex
        // https://github.com/hoaproject/Regex

        $compiler    = Compiler\Llk\Llk::load(
            new File\Read('hoa://Library/Regex/Grammar.pp')
        );

        $ast       = $compiler->parse($this->pattern);
        $generator = new Isotropic(new Math\Sampler\Random());

        return $generator->visit($ast);
    }
}