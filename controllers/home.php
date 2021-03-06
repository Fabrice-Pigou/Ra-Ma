<?php
use App\Sessions\Flash;

echo $twig->render('home.html', [
	'page'			=> 'home',
	'description'	=> 'Rama Micro FrameWork | Pour bien démarer mes site',
	'title'			=> 'Rama Micro FrameWork',

	'flash'		=> Flash::flash()
]);