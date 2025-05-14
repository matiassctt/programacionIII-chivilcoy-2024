<?php 

use Src\Service\Article\ArticlesSearcherService;

final readonly class ArticlesGetController {
    private ArticlesSearcherService $service;

    public function __construct() {
        $this->service = new ArticlesSearcherService();
    }

    public function start(): void
    {
        $articles = $this->service->search();
        echo json_encode($this->toResponse($articles));
    }

    private function toResponse(array $articles): array 
    {
        $responses = [];
        
        foreach($articles as $article) {
            $responses[] = [
                "id" => $article->id(),
                "name" => $article->name(),
            ];
        }

        return $responses;
    }
}