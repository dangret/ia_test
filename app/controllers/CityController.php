<?php

class CityController extends \BaseController {
	public function getCities(){
		$cities = City::where("id", ">", 0)->with("state")->get();
		return Response::json(["status" => "success", "data" => $cities]);
	}
}