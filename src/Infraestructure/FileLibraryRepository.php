<?php

namespace Vic\Infraestructure;

use Vic\Domain\Library;

use Vic\Domain\LibraryValue;
use Vic\Domain\LibraryRepository;

final class FileLibraryRepository implements LibraryRepository
{

    protected $file_path;
    
    public function __construct()
    {
        $this->file_path = __DIR__ . $_SERVER['APP_DIR_LIBRARY'];
    }

    public function save(Library $library): ?Library
    {
        if ($this->searchValue($library->value()->value()) == false )
        {
            file_put_contents($this->file_path, $this->saveValue($library->value()->value()));
            return $library;
        }

        return null;
    }

    public function search(LibraryValue $value): ?Library
    {
        return $this->searchValue($value->value()) ? new Library($value) : null;
    }

    private function searchValue(string $value) :bool
    {
        
        // Aquí se puede realizar la busqueda de forma sequencial línea a línea 
        // ya que al guardar los valores con el salto de línea esto te lo permite.
        // Lo he intentado hacer con expresiones regurales pero me daba un error
        // llevo un tiempo sin utilizar las expresiones regurales.
        // Yo he utilizado esta de convertir a array el contenido por el salto de 
        // linea que creo que se ve clarita.

        $content_library = explode(PHP_EOL,  $this->getContentLibrary());
       
        $key = array_search($value, $content_library);       

        if ($key === false)
        {
            return false;
        }

        return true;
    
    }

    private function saveValue(string $value) :string 
    {
        return $this->getContentLibrary(). $value. PHP_EOL;
    }

    private function getContentLibrary()
    {
        return file_exists($this->file_path)
            ? file_get_contents($this->file_path)
            : null;
    }

}