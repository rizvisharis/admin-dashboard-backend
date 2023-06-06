<?php

namespace App\Utils;


class Constants
{
    public static $ROLE = [
        'admin' => 'admin',
    ];

    public static $ERROR_MESSAGE = [
        'success' => 'Success!',
        'id_exist' => 'Id already exist!',
        'id_not_exist' => 'Id not already exist!',
        'no_email_password' => 'Your password or email is incorrect!',
        'password_not_match' => 'Your current password does not match!',
        'access_denied' => 'You do not have access permission!',
        'token_not_exist' => 'Token not provided!',
    ];

    public static $ERROR_CODE = [
        'success' => 200,
        'unauthorized' => 401,
        'access_denied' => 403,
        'not_found' => 404,
        'unprocessable_entity' => 422,
        'internal_server_error' => 500,
    ];

    
    public static $PAGINATION_PAGE_PARAM = 'api/v1/';

}