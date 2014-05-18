<?php

class MediaController extends \BaseController {

	const LG_WIDTH 	= 1200;
	const MD_WIDTH 	= 800;
	const SM_WIDTH 	= 400;
	const XS_WIDTH 	= 200;

	/**
	 * REceive the pictures from ajax request
	 *
	 * @return null
	 */
	public function upload()
	{
		// event_directory / img_directory / size_ .jpeg
		$folder = Input::get('uniqid');
		$fileName = uniqid('img_');

		$path = 'uploads/' . $folder . '/' . $fileName . '/';

		$file = Input::file('file');

		mkdir($path, 0777, true);

		// LG_WIDTH
		Image::make($file->getRealPath())->resize(self::LG_WIDTH, null, true)->save($path . 'lg.jpeg' );
		
		// MD_WIDTH
		Image::make($file->getRealPath())->resize(self::MD_WIDTH, null, true)->save($path . 'md.jpeg');
		
		// SM_WIDTH
		Image::make($file->getRealPath())->resize(self::SM_WIDTH, null, true)->save($path . 'sm.jpeg');
		
		// XS_WIDTH
		Image::make($file->getRealPath())->resize(self::XS_WIDTH, null, true)->save($path . 'xs.jpeg');

		$picture = new Picture;
		$picture->folder = $folder;
		$picture->name = $fileName;
		$picture->url = URL::asset('uploads').'/'.$folder.'/'.$fileName.'/';
		$picture->save();
	}

}