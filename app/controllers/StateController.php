<?php

class StateController extends \BaseController {

	public function getStates(){
		return Response::json(["status" => "success", "data" => State::all()]);
	}
}