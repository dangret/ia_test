<?php

class LoginController extends \BaseController {

	/**
	 * Attemp to auth an user.
	 * @return Response
	 */

	public function getIndex(){
			if (Auth::check()) return Redirect::to("/");
			return View::make("login");
	}

	public function postAuth(){
		$email = Input::get("email");
		$pass = Input::get("pass");

		if (Auth::attempt(array('correo_electronico' => $email, 'password' => $pass))){
			return Redirect::intended('inicio');
		}

		return Response::json(["status" => "error", "msg" => "Usuario o nombre incorrectos"],401);
	}

	public function postRegistrar(){
		$user = Input::all();
		$user["password"] = Hash::make($user["password"]);
		try{
			$user = User::create($user);
		}catch (Exception $e){
			return Response::json(["status" => "error", "msg" => "Hubo algún error", "e" => $e],401);
		}
		
		Auth::login($user);

		return Response::json(["status" => "success", "msg" => "Registrado"]);
	}

	public function getLogout(){
		Auth::logout();
		return Response::json(["status" => "success", "msg" => "Adios"]);
	}

}