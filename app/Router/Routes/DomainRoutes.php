<?php 

final readonly class DomainRoutes {
  public static function getRoutes(): array {
    return [
      [
        "name" => "domain_get",
        "url" => "/domains",
        "controller" => "Domain/DomainGetController.php",
        "method" => "GET",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "domains_get",
        "url" => "/domains",
        "controller" => "Domain/DomainsGetController.php",
        "method" => "GET"
      ]
    ];
  }
}
