<?php
namespace Vic\Domain;

interface LibraryRepository
{
    public function save(Library $library): ?Library;

    public function search(LibraryValue $value): ?Library;
}