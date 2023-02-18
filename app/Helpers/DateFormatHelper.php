<?php


use Carbon\Carbon;
/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('convertYmdToMdy')) {

	function convertYmdToMdy($date){

		return Carbon::create($date)->format('m-d-Y');
	}
}




