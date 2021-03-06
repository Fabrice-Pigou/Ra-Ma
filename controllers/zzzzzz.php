<?php
use App\Sessions\Flash;

echo $twig->render('home.html', [
	'flash' => Flash::flash()
]);