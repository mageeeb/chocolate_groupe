<?php
class Category{
  private int $id;
  private string $name;

  public function __construct(int $id, string $name) {
    $this->id = $id;
    $this->setName($name);
  }

  /**
   * @return true if success , string if error
   */
  public function delete(PDO $db):string{
    try {
      $sql = "DELETE FROM `category` WHERE id=?;";
      $prepare = $db->prepare($sql);
      $prepare->execute([$this->id]);
      $prepare->closeCursor();
      return true;
    }catch (Exception $e){
      return $e->getMessage();
    }
  }

  // getters
  public function getId():int{
    return $this->id;
  }
  public function getName():string{
    return $this->name;
  }

  // setters
  public function setName(string $name):self{
    $this->name = $name;
    return $this;
  }
}
