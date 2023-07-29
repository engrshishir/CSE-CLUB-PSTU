<?php  


namespace App\Controllers;
use App\model\User;

class MailController
{
  public function emailVerification($sender,$token)
  {

    $user = new User();
    $sql = "SELECT * FROM users WHERE username=? AND token=?";
    $stmt = $user->execute($sql, [$sender,$token]);
    if($stmt->rowCount() > 0){
      $sql = "UPDATE users SET is_verified = :is_verified,token = :token WHERE username = :username";
      $data=[
          "is_verified"=>1,
          "username"=>$sender,
          "token"=>null
      ];
      $user->updates($sql,$data);
      $_SESSION["loginalert"] = "Acoount verification successfull !";
      redirects("/login");
    }


  }

}