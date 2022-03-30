<?php

namespace App\Controller;

use Vic\Application\LibraryCommand;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vic\Application\Finder\FinderLibraryCommandHandler;

class LibraryGetController
{

    private FinderLibraryCommandHandler $command;

    public function __construct(FinderLibraryCommandHandler $command)
    {
        $this->command = $command;
    }

    public function __invoke(string $value, Request $request): Response
    {

        $library = $this->command->__invoke(new LibraryCommand($value));

        if (is_null($library))
        {
            return new Response('Value no found.', Response::HTTP_NOT_FOUND);
        }
        return new Response($library->value()->value(), Response::HTTP_OK);    
    }

}