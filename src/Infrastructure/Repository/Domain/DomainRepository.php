<?php 

declare(strict_types = 1);

namespace Src\Infrastructure\Repository\Domain;

use Src\Infrastructure\PDO\PDOManager;
use Src\Entity\Domain\Domain;

final readonly class DomainRepository extends PDOManager implements DomainRepositoryInterface {

    public function find(int $id): ?Domain 
    {
        $query = "SELECT * FROM domain WHERE id = :id";

        $parameters = [
            "id" => $id
        ];

        $result = $this->execute($query, $parameters);
        
        return $this->primitiveToDomain($result[0] ?? null);
    }

    public function search(): array
    {
        $query = "SELECT * FROM domain";
        $results = $this->execute($query);

        $domainResults = [];
        foreach ($results as $result) {
            $domainResults[] = $this->primitiveToDomain($result);
        }

        return $domainResults;
    }

    public function create(Domain $domain): void 
    {
        $query = "INSERT INTO domain (name, code) VALUES (:name, :code)";

        $parameters = [
            "name" => $domain->name(),
            "code" => $domain->code()
        ];

        $this->execute($query, $parameters);
    }

    private function primitiveToDomain(?array $primitive): ?Domain
    {
        if ($primitive === null) {
            return null;
        }

        return new Domain(
            $primitive["id"],
            $primitive["name"],
            $primitive["code"]
        );
    }
}