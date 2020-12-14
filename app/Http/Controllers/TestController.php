<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Team;

class TestController extends Controller
{
 
    public function test() {
    	echo 'GET <br>';
        $request = Request::create('api/teams', 'GET');
        echo app()->handle($request)->getContent();
        echo '<br><br>';

        echo 'GET 1 <br>';
		$request = Request::create('api/teams/' . 2, 'GET');
        echo app()->handle($request)->getContent();
         echo '<br><br>';

        echo 'POST <br>';
        $request = Request::create('api/teams', 'POST', array('name' => 'Ledere', 'users' => [2,3]));
        echo app()->handle($request)->getContent();
        echo '<br><br>';

        echo 'PUT <br>';
        $request = Request::create('api/teams/3', 'PUT', array('name' => 'Praktikanter'));
        echo app()->handle($request)->getContent();
        echo '<br><br>';

        echo 'DELETE <br>';
        $request = Request::create('api/teams/1', 'DELETE');
        echo app()->handle($request)->getContent();
        echo '<br><br>';
		

        echo 'Final: <br>';
        $request = Request::create('api/teams', 'GET');
        echo app()->handle($request)->getContent();

    }
}
