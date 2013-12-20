<?php

class Status extends Eloquent {

	public function jobs() {
		return $this->hasMany('job');
	}

}