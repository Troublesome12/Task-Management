<?php defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
use Carbon\Carbon;

class TimeDifference {
	
	public static function time($timestamp) {
		$date = Carbon::createFromTimestamp(strtotime($timestamp), 'Asia/Dhaka');
		return $date->diffForHumans();
	}
}