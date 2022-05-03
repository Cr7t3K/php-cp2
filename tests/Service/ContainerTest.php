<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use App\Service\Container;

class ContainerTest extends TestCase
{
    public function testPackage()
    {
        $container = new Container();

        $this->assertEquals($container->packages(7), $this->getProvider(7));
        $this->assertEqualsCanonicalizing($container->packages(14), $this->getProvider(14));
        $this->assertEqualsCanonicalizing($container->packages(16), $this->getProvider(16));
        $this->assertEqualsCanonicalizing($container->packages(20), $this->getProvider(20));
    }

    private function getProvider($value)
    {
        $data =
            [
                7 => ['medium' => 1, 'small' => 1],
                14 => ['large' => 1, 'medium' => 1, 'small' => 1, 'remaining' => 1],
                16 => ['large' => 2],
                20 => ['large' => 2, 'small' => 2],
            ];
        return $data[$value];
    }
}
