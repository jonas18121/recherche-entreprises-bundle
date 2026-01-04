<?php

namespace Jonas18121\RechercheEntreprisesBundle\Tests;

use PHPUnit\Framework\TestCase;
use Jonas18121\RechercheEntreprisesBundle\Jonas18121RechercheEntreprisesBundle;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Jonas18121RechercheEntreprisesBundle::class)]
class Jonas18121RechercheEntreprisesBundleTest extends TestCase
{
    public function testBundleCanBeInstantiated(): void
    {
        $bundle = new Jonas18121RechercheEntreprisesBundle();
        $this->assertInstanceOf(Jonas18121RechercheEntreprisesBundle::class, $bundle);
    }

    public function testGetPath(): void
    {
        $bundle = new Jonas18121RechercheEntreprisesBundle();
        $path = $bundle->getPath();

        $this->assertDirectoryExists($path);
    }
}