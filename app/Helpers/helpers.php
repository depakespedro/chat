<?php

if( ! function_exists('message') )
{
    function message()
    {
        return app('message');
    }
}

if( ! function_exists('user') )
{
    function user()
    {
        return app('user');
    }
}