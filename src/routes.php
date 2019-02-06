<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\_Auth_Controller;
use App\Controllers\_User_Controller;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
	// Render index view - Typically an API welcome page or JSON message.
	return $this->renderer->render($response, 'index.phtml', $args);
});

$app->group('/api', function(){

	$this->group('/oAuth', function(){
		$this->post('/token',  _Auth_Controller::class.':processTokenRequest');
	});

	// EXAMPLE OF AN AUTH PROTECTED ROUTE
	$this->group('/users', function(){
		$this->get('/me', _User_Controller::class.'');
	})->add('App\MiddleWare\CheckAuthMiddleWare');

	// IN SLIM YOU CAN PROTECT A ROUTE BY USING ' ->add ' AS SHOWN ABOVE
	// YOU CAN ALSO PROTECT A WHOLE GROUP, OR EVEN THE WHOLE APP!

});