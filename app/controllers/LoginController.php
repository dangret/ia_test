<?php

class LoginController extends \BaseController {

	/**
	 * Attemp to auth an user.
	 * @return Response
	 */
	public function postAuth(){
		$username = Input::get("username");
		$password = Input::get("password");

		return Response::json(["status" => "error", "msg" => "Usuario o nombre incorrectos"],401);
	}

}