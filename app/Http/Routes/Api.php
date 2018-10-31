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
    $router->group(['prefix' => '/lists/{list_id}/members'], function () use ($router) {
        $router->post('/', 'MemberController@create');
        $router->get('/{subscriber_hash}', 'MemberController@showMember');
        $router->get('/', 'MemberController@showAllMembers');
        $router->put('/{subscriber_hash}', 'MemberController@update');
        $router->delete('/{subscriber_hash}', 'MemberController@remove');
    });
});
