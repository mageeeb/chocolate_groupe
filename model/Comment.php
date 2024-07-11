<?php
class Comment implements JsonSerializable {
  const MAX_COMMENT_BY_PAGE_AND_USER = 1;
  private int $id;
  private string $comment;
  private string $subject;
  private string $created_date;
  private int $stars;
  private string $username;

  public function __construct(int $id, string $comment, string $subject, string $created_date, int $stars, string $username) {
    $this->id = $id;
    $this->setComment($comment);
    $this->setSubject($subject);
    $this->setCreatedDate($created_date);
    $this->setStars($stars);
    $this->setUsername($username);
  }

  public function jsonSerialize(): mixed{
    return [
      'username' => $this->getUsername(),
      'subject' => $this->getSubject(),
      'comment' => $this->getComment(),
      'stars' => $this->getStars(),
      'created_date' => $this->getCreatedDate(),
    ];
}

  public function delete(PDO $db):?string{
    try {
      $sql = "DELETE FROM `comment` WHERE id=?;";
      $prepare = $db->prepare($sql);
      $prepare->execute([$this->id]);
      $prepare->closeCursor();
      return true;
    }catch (Exception $e){
      return $e->getMessage();
    }

    return null;
  }

  public static function getCommentsByUserAndRecipe(PDO $db, int $recipe_id, string $user_name):array|string{
    try {
      $sql = "SELECT `comment`.* FROM `comment` WHERE `recipe_id`=? AND `user_name`=?";
      $prepare = $db->prepare($sql);
      $prepare->execute([$recipe_id, $user_name]);
      $results = $prepare->fetchAll();
      $comments = [];
      foreach($results as $result){
        array_push($comments, new Comment($result["id"], $result["comment"], $result['subject'], $result["created_date"], $result["stars"], $result["user_name"]));
      }
      $prepare->closeCursor();
      return $comments;
    }catch (Exception $e){
      return $e->getMessage();
    }
  }

  /**
   * For the form html. Check if the values is submit in the super var $_POST
   * @return string is a error
   * @return array isset array['is-error'] mean that is a error
   * @return array without is-error mean that is a success
   */
  public static function insertCommentByForm(PDO $db, int $id_recipe){
    if (!isset($_POST["username"], $_POST["comment"], $_POST["subject"], $_POST["stars"]) || !ctype_digit($_POST["stars"])) 
      return null;
    $username = trim(strip_tags($_POST["username"]));
    $comment = trim(strip_tags($_POST["comment"]));
    $subject = trim(strip_tags($_POST["subject"]));
    $stars = $_POST["stars"];
    $errors = [];
    if(!strlen($comment) && strlen($comment) > 2500) $errors['error-comment'] = "* Le commentaire ne doit pas être vide ou dépasser 2500 caractères.";
    if(!strlen($username) && strlen($username) > 50) $errors['error-username'] = "* Le username ne doit pas être vide ou dépasser 50 caractères.";
    if(!strlen($subject) && strlen($subject) > 50) $errors['error-subject'] = "* Le sujet ne doit pas être vide ou dépasser 50 caractères.";
    if($stars < 1 || $stars > 5) $errors['error-stars'] = "* Les étoiles doivent être comprises entre 1 et 5";
    if(sizeof($errors) === 0){
      $result = Comment::insertComment($db, $id_recipe, $username, $comment, $subject, $stars);
      if(isset($_POST['api'])){
        $result = gettype($result) === 'string' ? [ 'error-form' => $result ] : $result;
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
        die;
      }else return $result;
    }else{
      if(isset($_POST['api'])){
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($errors);
        die;
      }
      else{
        $errors['is-error'] = true;
        return $errors;
      }
    }
  }

  /** stars must be from 1 -> 10 */
  public static function insertComment(PDO $db, int $recipe_id, string $user_name, string $comment, string $subject, int $stars){
    if (sizeof(self::getCommentsByUserAndRecipe($db, $recipe_id, $user_name))>=self::MAX_COMMENT_BY_PAGE_AND_USER){
      return "trop de commentaires insérés par vous sur cette page";
    }
    try {
      $sql = "INSERT INTO `comment`(`recipe_id`, `user_name`, `comment`, `subject`, `stars`) VALUES(?,?,?,?,?);";
      $prepare = $db->prepare($sql);
      $prepare->execute([$recipe_id, $user_name, $comment, $subject, $stars]);
      $prepare->closeCursor();
      return self::getCommentsByUserAndRecipe($db, $recipe_id, $user_name);
    }catch (Exception $e){
      return $e->getMessage();
    }
  }

  // getters
  public function getId():int{
    return $this->id;
  }
  public function getComment():string{
    return nl2br($this->comment);
  }
  public function getSubject():string{
    return $this->subject;
  }
  public function getCreatedDate():string{
    return (new DateTime($this->created_date))->format('d/m/Y à H:i:s');
  }
  public function getStars():int{
    return $this->stars;
  }
  public function getUsername():string{
    return $this->username;
  }

  // setters
  public function setComment(string $comment):self{
    $this->comment = trim(htmlspecialchars(strip_tags($comment)),ENT_QUOTES);
    return $this;
  }
  public function setSubject(string $subject):self{
    $this->subject = trim(htmlspecialchars(strip_tags($subject)),ENT_QUOTES);
    return $this;
  }
  public function setCreatedDate(string $created_date):self{
    $this->created_date = $created_date;
    return $this;
  }
  public function setStars(int $stars):self{
    $this->stars = $stars;
    return $this;
  }
  public function setUsername(string $username):self{
    $this->username = $username;
    return $this;
  }
}