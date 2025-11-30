<?php
class Product {
  public ?int $id = null;
  public string $name = '';
  public string $category = '';
  public float $price = 0.0;
  public int $stock = 0;
  public ?string $image_path = null;
  public string $status = 'active';
  public function __construct(array $data = []) {
    foreach($data as $k=>$v) if(property_exists($this,$k)) $this->$k = $v;
  }
}
