<?php 

namespace Src\Infrastructure\Repository\Article;

use Src\Entity\Article\Article;

interface ArticleRepositoryInterface {
    public function find(int $id): ?Article;

    /** @return Article[] */
    public function search(): array;
}