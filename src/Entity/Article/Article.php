<?php 

namespace Src\Entity\Article;

final readonly class Article {
    public function __construct(
        private int $id,
        private string $name
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}