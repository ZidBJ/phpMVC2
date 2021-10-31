<?php


namespace app\controllers;

use app\core\Controller;

class SiteController extends Controller
{
    public function home()
    {
        return $this->render('home', [
            'name' => 'zee'
        ]);
    }

    public function contact()
    {
        return $this->render('contact');
    }
}
