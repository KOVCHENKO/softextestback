<?php
declare(strict_types=1);

/** @var \Laravel\Lumen\Routing\Router $router */

// MailChimp group
$router->group(['prefix' => 'mailchimp', 'namespace' => 'MailChimp'], function () use ($router) {
    // Lists group
    $router->group(['prefix' => 'lists'], function () use ($router) {
        $router->post('/', 'ListsController@create');
        $router->get('/{listId}', 'ListsController@show');
        $router->put('/{listId}', 'ListsController@update');
        $router->delete('/{listId}', 'ListsController@remove');
    });

    // Members group
    $router->group(['prefix' => 'members'], function () use ($router) {
        $router->post('/{list_id}', 'MemberController@create');
        $router->get('/{member_id}', 'MemberController@show');
        $router->put('/{member_id}', 'MemberController@update');
        $router->delete('/{member_id}', 'MemberController@remove');
    });
});
