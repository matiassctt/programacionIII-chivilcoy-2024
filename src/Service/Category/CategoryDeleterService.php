<?php 

namespace Src\Service\Category;

use Src\Infrastructure\Repository\Category\CategoryRepository;

final readonly class CategoryDeleterService {
    private CategoryRepository $repository;
    private CategoryFinderService $finder;

    public function __construct() {
        $this->repository = new CategoryRepository();
        $this->finder = new CategoryFinderService();
    }

    public function delete(int $id): void
    {
        $category = $this->finder->find($id);

        $category->delete();

        $this->repository->update($category);
    } 
}