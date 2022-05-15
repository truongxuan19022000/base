<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Controllers\VendorBaseController;
use App\Http\Requests\StoreVendorRequest;
use App\Repositories\UsersRepository;
use App\Services\UserService;
use App\Services\VendorService;
use Illuminate\Http\Request;

class VendorRegister extends VendorBaseController
{
    protected $userRepo;
    /** @var  UserService */
    private $userService;
    /**
     * @var VendorService
     */
    private $vendorService;

    public function __construct(UserService $userService,VendorService $vendorService,UsersRepository $usersRepository)
    {
        $this->userService = $userService;
        $this->vendorService = $vendorService;
        $this->userRepo = $usersRepository;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * vendor registration
     *
     */
    public function showRegisterForm(){
        return $this->render('register.new_member');
    }
    public function showPlan(){
        return $this->render('register.plan');
    }

    /**
     * vendor registration
     * input: email, password, confirm password
     * @param StoreVendorRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function  vendorRegistration(StoreVendorRequest $request){
        $input = $request->all();
        if ($this->vendorService->store($input)){
            $this->raiseSuccess('User save successfully');
            return $this->render('register.authentication');
        }
        return back();

    }
}
