<?php

namespace Vendorcustom\RechercheEntreprisesBundle\Tests\Client;

use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Vendorcustom\RechercheEntreprisesBundle\Client\EntrepriseSearchClient;

class EntrepriseSearchClientTest extends TestCase
{
    public function testSearchReturnsResults(): void
    {
        // 1. Créer une réponse simulée
        $mockResponse = new MockResponse(json_encode([
            'results' => [
                [
                    'siren' => '123456789',
                    'nom_complet' => 'TEST ENTREPRISE',
                    'siege' => [
                        'siret' => '12345678900001',
                        'adresse' => '1 RUE DE TEST',
                    ],
                ],
            ],
            'total_results' => 1,
            'page' => 1,
            'per_page' => 10,
            'total_pages' => 1,
        ]));

        // 2. Créer un client HTTP qui retourne cette réponse
        $httpClient = new MockHttpClient($mockResponse);

        // 3. Injecter le client mocké dans notre service
        $client = new EntrepriseSearchClient($httpClient, new NullLogger());

        // 4. Tester normalement
        $result = $client->search('test');

        $this->assertTrue($result->hasResults());
        $this->assertCount(1, $result->results);
        $this->assertEquals('123456789', $result->results[0]->siren);
    }

    public function testFindBySirenWithInvalidSiren(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $httpClient = new MockHttpClient();
        $client = new EntrepriseSearchClient($httpClient, new NullLogger());

        $client->findBySiren('12345'); // SIREN invalide
    }
}