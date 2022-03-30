<?php

namespace Vic\Application\Finder;

use Vic\Domain\Library;
use Vic\Domain\LibraryValue;
use Vic\Application\LibraryCommand;

final class FinderLibraryCommandHandler
{

    private LibraryFinder $finder;

    public function __construct(LibraryFinder $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke(LibraryCommand $command): ?Library
    {
        $value             = new LibraryValue($command->value());

        return $this->finder->__invoke($value);

    }
}