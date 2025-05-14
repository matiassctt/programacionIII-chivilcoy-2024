<?php 

namespace Src\Service\Category;

use Src\Entity\Category\Category;
use Src\Infrastructure\Repository\Category\CategoryRepository;

final readonly class CategoryUpdaterService {
    private CategoryRepository $repository;
    private CategoryFinderService $finder;

    public function __construct() {
        $this->repository = new CategoryRepository();
        $this->finder = new CategoryFinderService();
    }

    public function update(string $name, string $code, int $id): void
    {
        $category = $this->finder->find($id);

        $category->modify($name, $code);

        $this->repository->update($category);
    } 
}