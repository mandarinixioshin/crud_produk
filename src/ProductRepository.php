<?php
class ProductRepository {
  private PDO $pdo;
  public function __construct(PDO $pdo) { $this->pdo = $pdo; }
  public function all(): array {
    return $this->pdo->query('SELECT * FROM products ORDER BY id DESC')->fetchAll();
  }
  public function find(int $id): ?array {
    $stmt = $this->pdo->prepare('SELECT * FROM products WHERE id=? LIMIT 1'); $stmt->execute([$id]); $r=$stmt->fetch(); return $r?:null;
  }
  public function create(array $d): int {
    $sql="INSERT INTO products (name,category,price,stock,image_path,status) VALUES (:name,:category,:price,:stock,:image_path,:status)";
    $stmt=$this->pdo->prepare($sql); $stmt->execute([
      ':name'=>$d['name'],':category'=>$d['category'],':price'=>$d['price'],':stock'=>$d['stock'],':image_path'=>$d['image_path']??null,':status'=>$d['status']??'active'
    ]); return (int)$this->pdo->lastInsertId();
  }
  public function update(int $id, array $d): bool {
    $sql="UPDATE products SET name=:name,category=:category,price=:price,stock=:stock,image_path=:image_path,status=:status WHERE id=:id";
    $stmt=$this->pdo->prepare($sql); return $stmt->execute([
      ':name'=>$d['name'],':category'=>$d['category'],':price'=>$d['price'],':stock'=>$d['stock'],':image_path'=>$d['image_path']??null,':status'=>$d['status']??'active',':id'=>$id
    ]);
  }
  public function delete(int $id): bool {
    return $this->pdo->prepare('DELETE FROM products WHERE id=?')->execute([$id]);
  }
}
