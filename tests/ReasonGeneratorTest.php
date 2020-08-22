<?php

declare(strict_types=1);

namespace Tests\Nyholm\Why;

use Nyholm\Why\ReasonGenerator;
use PHPUnit\Framework\TestCase;

class ReasonGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $generator = new ReasonGenerator();
        for ($i = 0; $i<10000; $i++) {
            $text = $generator->generate();
            $this->assertNotEmpty($text);
        }
    }
}