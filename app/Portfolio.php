<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //
    public function content() {
		return $this->belongsTo(Content::class);
	}
}
