<?php

class PictureController extends \BaseController {

	public function postSubirTempImg(){
		
		$file = Input::file('file');
		$name = $file->getClientOriginalName();
		$tempFile = str_random(5);
		$extension = $file->getClientOriginalExtension();
		$img = Image::make($file);
		$relative_path = "/uploads/$tempFile.$extension"; 
		$img->save($relative_path);

		return Response::json([
			"status" => "success",
			"nombre" => $name,
			"tempFile" => $tempFile,
			"extension" => $extension,
			"relative_path" => $relative_path
 			]);
	}
}