<?php
use App\Sessions\Modal;
Modal::SetModal('Le message');
/*------------------------------------------------------------------------*\
			GESTION DES POST
\*------------------------------------------------------------------------*/
if (isset($_POST['id'])) {
	
}

/*------------------------------------------------------------------------*\
			GESTION DES GET
\*------------------------------------------------------------------------*/
if(isset($params['action'])){
	
}

/*------------------------------------------------------------------------*\
			VARIABLES POUR TWIG
\*------------------------------------------------------------------------*/

echo $twig->render('home.html', [
	'page'			=> 'home',
	'description'	=> 'Rama Micro FrameWork | Pour bien démarer mes site',
	'title'			=> 'Rama Micro FrameWork',

	'modal'		=> Modal::Modal()
]);