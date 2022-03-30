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

        try {

            $library = $this->command->__invoke(new LibraryCommand($value));

            return new Response($library->value()->value(), Response::HTTP_OK);    
        } catch (\Exception $e) {
            return new Response($e, Response::HTTP_BAD_REQUEST);    
        }
    }

}