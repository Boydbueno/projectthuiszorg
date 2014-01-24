<?php

dd("hoi");

//Send friendlist data to each of these views
View::composer(array('client.index','dashboard'), function($view)
{
    $view->with('friends', \Auth::user()->friendList());
});