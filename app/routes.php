<?php

use Pecee\SimpleRouter\SimpleRouter;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;



SimpleRouter::get('/error', 'P@error');

SimpleRouter::error(function(Request $request, \Exception $exception) {

    if($exception instanceof NotFoundHttpException && $exception->getCode() === 404) {
        response()->redirect('/error');
    }

});

//SimpleRouter::get('/randomQ{id}', 'P@randomQ');
//SimpleRouter::controller('/', PagesController::class);
//SimpleRouter::controller('/', 'index');

SimpleRouter::get('/', function() {
    '/views/p/index';
});

SimpleRouter::get('/p/contact', function() {
    '/views/p/contact';
});
