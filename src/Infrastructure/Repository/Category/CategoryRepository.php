<?php 

namespace Src\Infrastructure\Repository\Category;

use Src\Infrastructure\PDO\PDOManager;
use Src\Entity\Category\Category;

final readonly class CategoryRepository extends PDOManager implements CategoryRepositoryInterface {
    public function find(int $id): ?Category
    {
        $query = <<<HEREDOC
                        SELECT 
                            *
                        FROM
                            category C
                        WHERE
                            C.id = :id AND C.deleted = 0
                    HEREDOC;

        $parameters = [
            "id" => $id,
        ];

        $result = $this->execute($query, $parameters);

        return $this->toCategory($result[0] ?? null);
    }

    /** @return Category[] */
    public function search(): array
    {
        $query = <<<HEREDOC
                        SELECT
                            *
                        FROM
                            category C
                        WHERE
                            C.deleted = 0
                    HEREDOC;
        
        $results = $this->execute($query);

        $categories = [];
        foreach($results as $result) {
            $categories[] = $this->toCategory($result);
        }

        return $categories;
    }

    public function create(Category $category): void
    {
        $query = <<<INSERT_QUERY
                        INSERT INTO category (name, code, deleted)
                        VALUES (:name, :code, :deleted)
                    INSERT_QUERY;

        $parameters = [
            "name" => $category->name(),
            "code" => $category->code(),
            "deleted" => $category->deleted()
        ];

        $this->execute($query, $parameters);
    }

    public function update(Category $category): void
    {
        $query = <<<UPDATE_CATEGORY
                    UPDATE
                        category
                    SET
                        name = :name,
                        code = :code,
                        deleted = :deleted
                    WHERE
                        id = :id
                UPDATE_CATEGORY;
        
        $parameters = [
            "name" => $category->name(),
            "code" => $category->code(),
            "deleted" => $category->deleted(),
            "id" => $category->id(),
        ];

        $this->execute($query, $parameters);
    }

    private function toCategory(?array $primitive): ?Category {
        if ($primitive === null) {
            return null;
        }

        return new Category(
            $primitive["id"],
            $primitive["name"],
            $primitive["code"],
            $primitive["deleted"]
        );
    }
}