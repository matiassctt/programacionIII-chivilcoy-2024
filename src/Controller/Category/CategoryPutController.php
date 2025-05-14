<?php 

use Src\Utils\ControllerUtils;
use Src\Service\Category\CategoryUpdaterService;

final readonly class CategoryPutController {
    private CategoryUpdaterService $service;

    public function __construct() {
        $this->service = new CategoryUpdaterService();
    }

    public function start(int $id): void
    {
        $name = ControllerUtils::getPost("name");
        $code = ControllerUtils::getPost("code");

        $this->service->update($name, $code, $id);
    }
}