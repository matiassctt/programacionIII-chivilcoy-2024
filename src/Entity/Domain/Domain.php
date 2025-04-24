<?php 

namespace Src\Entity\Domain;

final readonly class Domain {

    public function __construct(
        private int $id,
        private string $name,
        private string $code
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

    public function code(): string
    {
        return $this->code;
    }
}