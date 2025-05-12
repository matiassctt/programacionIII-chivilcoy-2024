<?php 


declare(strict_types = 1);

namespace Src\Service\Domain;

use Src\Entity\Domain\Domain;
use Src\Infrastructure\Repository\Domain\DomainRepository;

final readonly class DomainCreatorService {

    private DomainRepository $domainRepository;

    public function __construct() 
    {
        $this->domainRepository = new DomainRepository();
    }

    public function create(string $name, string $code): void 
    {
        $domain = Domain::create($name, $code);
        $this->domainRepository->create($domain);
    }

}
