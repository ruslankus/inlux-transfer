<?php
class ErrorController extends Controller
{
    public $defaultAction='404error';

    public function action404error()
    {
        $this->render('404');
    }
}