<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\VendorBaseController;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UsersRepository;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends VendorBaseController
{
    protected $userRepo;
    /** @var  UserService */
    private $userService;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->render('main');
    }
}
