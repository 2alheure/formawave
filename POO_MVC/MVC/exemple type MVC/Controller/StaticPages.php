<?php

namespace Controller;

class StaticPages {
	public function home() {
		view('home');
	}

	public function about() {
		view('about');
	}
}
