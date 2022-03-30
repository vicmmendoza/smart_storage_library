<?php

namespace App\Controller;

use Vic\Application\LibraryCommand;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vic\Application\Create\CreateLibraryCommandHandler;

class LibraryPostController
{

    private CreateLibraryCommandHandler $command;

    public function __construct(CreateLibraryCommandHandler $command)
    {
        $this->command = $command;
    }

    public function __invoke(Request $request): Response
    {

        $library = $this->command->__invoke(new LibraryCommand(
                            $request->get('value')??'',
                    ));
        
        if (is_null($library)) {
            return new Response('Value found', Response::HTTP_FOUND);    
        }            

        return new Response($library->value()->value(), Response::HTTP_CREATED);    
        
    }

}