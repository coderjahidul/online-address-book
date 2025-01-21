<?php
namespace App\Interfaces;

interface CRUDInterface {
    public function create($data): bool;
    public function read():array;
    public function update($id, $data): bool;
    public function delete($id): bool;
}