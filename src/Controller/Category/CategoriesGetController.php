<?php 

use Src\Service\Category\CategoriesSearcherService;

final readonly class CategoriesGetController {
    private CategoriesSearcherService $service;

    public function __construct() {
        $this->service = new CategoriesSearcherService();
    }

    public function start(): void
    {
        $categories = $this->service->search();
        echo json_encode($this->toResponse($categories));
    }

    private function toResponse(array $categories): array 
    {
        $responses = [];
        
        foreach($categories as $Category) {
            $responses[] = [
                "id" => $Category->id(),
                "name" => $Category->name(),
                "code" => $Category->code(),
            ];
        }

        return $responses;
    }
}