<?php

namespace Vendorcustom\RechercheEntreprisesBundle\Tests;

use PHPUnit\Framework\TestCase;
use Vendorcustom\RechercheEntreprisesBundle\VendorcustomRechercheEntreprisesBundle;

class VendorcustomRechercheEntreprisesBundleTest extends TestCase
{
    public function testBundleCanBeInstantiated(): void
    {
        $bundle = new VendorcustomRechercheEntreprisesBundle();
        $this->assertInstanceOf(VendorcustomRechercheEntreprisesBundle::class, $bundle);
    }

    public function testGetPath(): void
    {
        $bundle = new VendorcustomRechercheEntreprisesBundle();
        $path = $bundle->getPath();

        $this->assertDirectoryExists($path);
    }
}