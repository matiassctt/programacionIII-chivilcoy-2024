<?php 

namespace Src\Service\Category;

use Src\Entity\Category\Category;
use Src\Infrastructure\Repository\Category\CategoryRepository;

final readonly class CategoryCreatorService {
    private CategoryRepository $repository;

    public function __construct() {
        $this->repository = new CategoryRepository();
    }

    public function create(string $name, string $code): void
    {
        $category = Category::create($name, $code);
        $this->repository->create($category);
    } 
}