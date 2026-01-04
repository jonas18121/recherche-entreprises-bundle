<?php

declare(strict_types=1);

namespace Jonas18121\RechercheEntreprisesBundle\Client;

use Jonas18121\RechercheEntreprisesBundle\Model\Entreprise;
use Jonas18121\RechercheEntreprisesBundle\Model\SearchResult;

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