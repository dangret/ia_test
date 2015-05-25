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

	public function getStates(){
		return Response::json(["status" => "success", "data" => State::all()]);
	}

	public function getCities(){
		$cities = City::where("id", ">" 0)->with("state")->get();
		return Response::json(["status" => "success", "data" => $cities]);
	}

}