<?php

namespace App\Services;

class BookService {
  public function getAllBooks(): array {
    return [
      ['id' => 1, 'title' => 'Kniha1', 'author' => 'Autor1'],
      ['id' => 2, 'title' => 'Kniha2', 'author' => 'Autor2'],
      ['id' => 3, 'title' => 'Kniha3', 'author' => 'Autor3'],
    ];
  }
}