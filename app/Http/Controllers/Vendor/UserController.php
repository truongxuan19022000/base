<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\VendorBaseController;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Utils\AppUtils;
use App\Http\Utils\UserUtils;
use App\Repositories\UsersRepository;
use App\Services\UserService;
use App\Services\VendorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends VendorBaseController
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
    public function index(Request $request)
    {
        $search = $request->all();
        $search['role_id'] = UserUtils::USER_TYPE_VENDOR;
        $users = $this->userService->paginate($search, 10);

        $this->assign('search', $search);
        $this->assign('users', $users);

        return $this->render('users.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $this->render('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorRequest $request)
    {

        $input = $request->all();
        if ($this->vendorService->store($input)){
            $this->raiseSuccess('User save successfully');
            return $this->render('register.authentication');
        }
        dd('error');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userService->find($id);

        if (!$user || $user->role_id != UserUtils::USER_TYPE_VENDOR) {
            $this->raiseDanger('404');
            return back()->withInput();
        }

        $this->assign('item', $user);
        return $this->render('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, $id)
    {
        $user = $this->userRepo->show($id);
        if (!$user || $user->role_id != UserUtils::USER_TYPE_VENDOR) {
            return back()->withInput()->with('status', '404');
        }

        $this->userService->update($request->all(), $id);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepo->show($id);
        if (!$user || $user->role_id != UserUtils::USER_TYPE_VENDOR) {
            return back()->withInput()->with('status', '404');
        }

        $this->userService->destroy($id);
        return back()->withInput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deletemany(Request $request)
    {
        $cid = $request->get('cid');

        DB::beginTransaction();
        foreach ($cid as $id) {
            $user = $this->userRepo->show($id);
            if (!$user || $user->role_id != UserUtils::USER_TYPE_VENDOR) {
                DB::rollBack();
                return back()->withInput()->with('status', '404');
            }

            $this->userService->destroy($id);
        }
        DB::commit();
        return back()->withInput();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        return $this->render('user.profile');
    }

}
