<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Documentation extends Model
{
    //
	/*
	*	@desc 	1. 요청된 파일을 가져온다
				2. 파일을 리턴
	*	@param 	$file
	*/
    public function get($file) {
    	// File::get('docs/artisan.md');
    	return File::get($this->path($file));
    }

    /*
	*	@desc 	요청된 파일 경로를 반환
	*	@param 	$file
	*/
    public function path($file) {
    	// 되돌려줄 파일 패스
    	$path = base_path('docs'.DIRECTORY_SEPARATOR.$file);

    	if (!File::exists($path)) {
    		abort(404, "There is no file.");
    	} 

    	return $path;
    }
}
