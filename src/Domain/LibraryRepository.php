<?php
namespace Vic\Domain;

interface LibraryRepository
{
    public function save(Library $library): void;

    public function search(LibraryValue $value): ?Library;
}