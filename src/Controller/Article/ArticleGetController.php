<?php 

use Src\Service\Article\ArticleFinderService;

final readonly class ArticleGetController {

    private ArticleFinderService $service;

    public function __construct() {
        $this->service = new ArticleFinderService();
    }

    public function start(int $id): void
    {
        $article = $this->service->find($id);
        
        echo json_encode([
            "id" => $article->id(),
            "name" => $article->name()
        ]);
    }
}