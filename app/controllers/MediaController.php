<?php

class MediaController extends \BaseController {

	/**
	 * REceive the pictures from ajax request
	 *
	 * @return null
	 */
	public function upload()
	{
		Input::file('file')->move('uploads',Input::file('file')->getClientOriginalName());
	}

}