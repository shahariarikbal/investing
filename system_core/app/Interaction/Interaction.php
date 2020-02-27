<?php

namespace App\Interaction;

class Interaction
{

	public function like ($service)
	{
		$liked = $service->likes()->where('member_id', auth()->guard('member')->user()->id)->first();
		if($liked) {
			$service->likes()->where('id', $liked->id)->delete();
		} else {
			$service->likes()->create([
				'member_id' => auth()->guard('member')->user()->id
			]);
		}

		return $service;
		
	}

	public function comments ($service)
	{
		$service->comments()->create();
	}

	public function ratings ($service)
	{
		$service->ratings()->create();
	}
}