<?php

class Database{


  // private static $INSTANCE = null;
  public $mysqli;
  public $HOST = 'localhost',
          $USER = 'root',
          $PASS = '',
          $DBNAME = 'divingbali';

  public function __construct(){
    $this->mysqli = new mysqli($this->HOST,$this->USER,$this->PASS,$this->DBNAME);
    if(mysqli_connect_error()){
      die('Koneksi Gagal');
    }
  }


  public function koordinat(){
    $query = "SELECT * FROM tb_diving";
    $sql = $this->mysqli->query($query);
    return $sql;
  }

  public function koordinatbyid($id){
    $query = "SELECT * FROM tb_diving WHERE id_diving = $id";
    $sql = $this->mysqli->query($query);
    return $sql;
  }

  }

//
//   public static function getInstance(){
//     if(!isset(self::$INSTANCE)){
//       self::$INSTANCE = new Database();
//     }else{
//       return self::$INSTANCE;
//     }
//   }
// }
?>
