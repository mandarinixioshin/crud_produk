<?php
class Database {
  private static ?PDO $pdo = null;
  public static function getConnection(array $config): PDO {
    if (self::$pdo === null) {
      $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', $config['db_host'], $config['db_name']);
      $opts = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false];
      self::$pdo = new PDO($dsn, $config['db_user'], $config['db_pass'], $opts);
    }
    return self::$pdo;
  }
}
