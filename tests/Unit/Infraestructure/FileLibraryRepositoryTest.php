<?php

namespace App\Tests\Unit\Infraestructure;

use PhpParser\Node\Expr\Cast\Object_;
use Vic\Domain\Library;
use Vic\Domain\LibraryValue;
use PHPUnit\Framework\TestCase;
use Vic\Infraestructure\FileLibraryRepository;

final class FileLibraryRepositoryTest extends TestCase
{

    protected $library;
    protected $repository;


    protected function setUp(): void
    {
        parent::setUp();

        $this->library = $this->getLibraryMother();

        $this->repository = new FileLibraryRepository();
    }

    /** @test */
    public function it_should_save_and_search_a_value(): void
    {

        $this->repository->save($this->library);

        $search = $this->repository->search($this->library->value());

        $this->assertEquals($this->library, $search);

    }

    /** @test */
    public function it_should_not_return_a_non_existing_value(): void
    {

        $value = new LibraryValue('0');

        $search = $this->repository->search($value);

        $this->assertEquals($search, null);
    }

    private function getLibraryMother(string $value = null) :Library
    {
        
        $value = new LibraryValue($value??strval(rand(1,1000000)));

        return new Library($value);

    }
}