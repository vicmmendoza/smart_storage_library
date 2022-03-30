<?php

namespace Vic\Application\Create;

use Vic\Domain\Library;
use Vic\Domain\LibraryValue;
use Vic\Domain\LibraryRepository;

final class LibraryCreator
{

    private $repository;

    public function __construct(LibraryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(LibraryValue $value): ?Library
    {
        $library = new Library($value);
        
        return $this->repository->save($library);
    }
}