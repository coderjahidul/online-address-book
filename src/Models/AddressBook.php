<?php 
namespace App\Models;

use App\Interfaces\CRUDInterface;

class AddressBook implements CRUDInterface {
    private array $contacts = [];
    private string $storageFile;

    public function __construct(string $storageFile = __DIR__ . '/../storage/contacts.json'){
        $this->contacts = json_decode(file_get_contents($this->storageFile), true) ?? [];
    }

    public function create($data): bool {
        $this->contacts[] = $data;
        return $this->saveToFile();
    }

    public function read(): array {
        return $this->contacts;
    }

    public function update($id, $data): bool {
        if(isset($this->contacts[$id])){
            $this->contacts[$id] = $data;
            return $this->saveToFile();
        }
        return false;
    }

    public function delete($id): bool {
        if(isset($this->contacts[$id])){
            unset($this->contacts[$id]);
            return $this->saveToFile();
        }
    }

    private function saveToFile(): bool {
        return file_put_contents($this->storageFile, json_encode($this->contacts, JSON_PRETTY_PRINT)) !== false;
    }
}