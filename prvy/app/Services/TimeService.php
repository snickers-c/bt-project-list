<?php

namespace App\Services;

class TimeService {
  public function time(): string {
    return date("Y-m-d H:i:s");
  }
}