<?php

namespace Vic\Application\Finder;

use Vic\Domain\LibraryValue;
use Vic\Domain\LibraryRepository;
use Vic\Domain\Library;

final class LibraryFinder
{

    private $repository;

    public function __construct(LibraryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(LibraryValue $value): Library
    {
        $library = $this->repository->search($value);

        if (null === $library)
        {
            throw new \Exception("Device does not exist.");
        }

        return $library;
    }
}