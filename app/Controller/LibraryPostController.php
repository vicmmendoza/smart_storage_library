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

        try {
            $this->command->__invoke(new LibraryCommand(
                $request->get('value')??'',
            ));

            return new Response('', Response::HTTP_CREATED);    
        } catch (\Exception $e) {
            return new Response($e, Response::HTTP_BAD_REQUEST);    
        }
    }

}