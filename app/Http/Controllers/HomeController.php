<?php
/**
 * Created by PhpStorm.
 * User: javan
 * Date: 7/20/18
 * Time: 3:46 PM
 */

namespace App\Http\Controllers;

class HomeController extends \Illuminate\Routing\Controller
{
    public function index()
    {
        return view('home');
    }
}