<?php

declare(strict_types=1);

namespace Vendorcustom\RechercheEntreprisesBundle\Client;

use Vendorcustom\RechercheEntreprisesBundle\Model\Entreprise;
use Vendorcustom\RechercheEntreprisesBundle\Model\SearchResult;

/**
 * Interface pour le client de recherche d'entreprises.
 */
interface EntrepriseSearchClientInterface
{
    public function search(
        string $query,
        int $page = 1,
        int $perPage = 10,
        array $filters = []
    ): SearchResult;

    public function findBySiren(string $siren): ?Entreprise;

    public function searchByCodePostal(
        string $codePostal,
        int $page = 1,
        int $perPage = 10
    ): SearchResult;
}