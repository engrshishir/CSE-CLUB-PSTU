<?php


namespace App\Controllers;

use App\model\User;

class LoginController
{

  public function index()
  {
    $compact = [
      "Data" => "This text come from Admin Controller"
    ];

    return view("admin/index.php", compact("compact"));
  }

  public function login()
  {
    /*************************************************************
     *?  Linkedin     : engg-shishir
     *!  Purpose      : fetch site settings info
     *************************************************************/
    $user = new User();
    $sql = "SELECT settings.*,ca.title AS carTitle,ca.slug AS carSlug
    FROM settings
    LEFT JOIN carnivals AS ca
    ON settings.nav_carnival_id = ca.carnival_id";
    $stmt = $user->execute($sql);
    $settings = $stmt->fetchAll();


    $user = new User();
    $sql = "SELECT c.title,c.slug FROM carnivals AS c WHERE status=1";
    $stmt = $user->execute($sql);
    $carnivals = $stmt->fetchAll();


    $compact = ["settings" => $settings, "carnivals" => $carnivals];

    return view("Frontend/Login/login.php", compact("compact"));
  }
  public function logout()
  {
    session_start();
    unset($_SESSION["auth_user"]);
    unset($_SESSION["auth_role"]);
    unset($_SESSION["auth_security_token"]);
    // Clear all session variables.
    session_unset();
    // Destroy the session data.
    session_destroy();
    redirects("/login");
  }

  public function dashboard()
  {

    if (isset($_SESSION["auth_security_token"]) && $_SESSION["auth_security_token"] !== "" && isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "" && isset($_SESSION["auth_role"]) && $_SESSION["auth_role"] !== "" && isset($_SESSION["auth_id"]) && $_SESSION["auth_id"] !== "" && strpos($_SESSION["auth_security_token"], $_SESSION["auth_user"]) !== "") {

      if ($_SESSION["auth_role"] == "participant") {
        redirects("/participant");
      }else{
        $user = new User();
        $sql = "SELECT ud.user_id FROM user_details AS ud WHERE user_id=?";
        $stmt = $user->execute($sql, [$_SESSION["auth_id"]]);
  
  
        if ($stmt->rowCount() > 0) {
  
          if ($_SESSION["auth_role"] == "student" || $_SESSION["auth_role"] == "alumini") {
            
						$_SESSION["auth_profile"] = "/user";
            redirects("/user");
          } else if ($_SESSION["auth_role"] == "admin") {
						$_SESSION["auth_profile"] = "/admin";
            redirects("/admin");
          } else if ($_SESSION["auth_role"] == "teacher") {
						$_SESSION["auth_profile"] = "/teacher";
            redirects("/teacher");
          }
  
        } else {
          $_SESSION["user_setails_status"] = "ON";
          $_SESSION["error_message"] = "Please complete your profile";
          redirects("/userdetails");
        }
      }
    } else {
      $_SESSION["error_message"] = "You are not authenticated";
      redirects("/login");
    }

  }


}