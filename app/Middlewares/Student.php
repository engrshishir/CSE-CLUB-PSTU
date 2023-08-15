<?php
namespace App\Middlewares;

use App\model\User;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

session_start();
class Student implements IMiddleware
{
	public function handle(Request $request): void
	{


    if(isset($_SESSION["auth_security_token"]) && $_SESSION["auth_security_token"] !=="" && isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !=="" &&  isset($_SESSION["auth_role"]) && $_SESSION["auth_role"] !=="" && $_SESSION["auth_role"]==1){
      if (strpos($_SESSION["auth_security_token"], $_SESSION["auth_user"]) !== false){
				$request->authenticated = true;
      }else{
        $_SESSION["error_message"]= "You are not authenticated";
        redirects("/login");
      }
    }else{
      $_SESSION["error_message"]= "You should sign in first";
      redirects("/login");
    }
	}
}