<?php 

final readonly class ArticleRoutes {
  public static function getRoutes(): array {
    return [
      [
        "name" => "article_get",
        "url" => "/articles",
        "controller" => "Article/ArticleGetController.php",
        "method" => "GET",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "articles_get",
        "url" => "/articles",
        "controller" => "Article/ArticlesGetController.php",
        "method" => "GET"
      ]
    ];
  }
}
