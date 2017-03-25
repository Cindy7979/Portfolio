<?php
// 전역 함수에서 markdown 함수명이 있는지 없는지 확인.
if(!function_exists('markdown')) {
	function markdown($path=null) {
		return app(ParsedownExtra::class)->text($path);
	}	
}

