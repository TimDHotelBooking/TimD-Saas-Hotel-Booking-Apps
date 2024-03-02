<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppInfo;

use DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Log;


use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AppInfoController extends Controller
{
    public function index()
    {     
        return view("appinfomain");
    }
}
