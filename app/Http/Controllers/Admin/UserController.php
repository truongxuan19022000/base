<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Utils\AppUtils;
use App\Http\Utils\UserUtils;
use App\Models\User;
use App\Repositories\UsersRepository;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends AdminBaseController
{
    protected $userRepo;
    /** @var  UserService */
    private $userService;

    public function __construct(UserService $userService, UsersRepository $usersRepository)
    {
        $this->userService = $userService;
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
        $search['role_id'] = UserUtils::USER_TYPE_NORMAL;
        $users = $this->userService->paginate($search, AppUtils::DEFAUL_LIMIT);

        $this->assign('search', $search);
        $this->assign('users', $users);
        $this->addMeta('title', 'admin/user.title');
        $this->addButtonCreate('admin/user.add_new', 'admin.users.create');
        $this->addIconPage("/assets/admin/images/common/icon-nav01.svg");

        return $this->render('users.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->addMeta('title', 'User create');
        return $this->render('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $input = $request->all();
        $input['role_id'] = UserUtils::USER_TYPE_NORMAL;
        $data = $this->userService->store($input);
        if($data['status']) {
            $this->raiseSuccess('User save successfully');
            return redirect()->route('admin.users.index');
        }else{
            $this->raiseDanger($data['message']);
        }
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
        if (!$user) {
            $this->raiseDanger('404');
            return back()->withInput();
        }

        $this->assign('item', $user);
        $this->addMeta('title', 'User Edit');
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
        if (!$user) {
            return back()->withInput()->with('status', '404');
        }

        $data = $this->userService->update($request->all(), $id);
        if ($data['status']) {
            $this->raiseSuccess('User update successfully');
            return redirect()->route('admin.users.index');
        } else{
            $this->raiseDanger($data['message']);
        }
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
        if (!$user || $user->role_id != UserUtils::USER_TYPE_NORMAL) {
            return back()->withInput()->with('status', '404');
        }

        $this->raiseSuccess('User destroy successfully');
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
            if (!$user || $user->role_id != UserUtils::USER_TYPE_NORMAL) {
                DB::rollBack();
                return back()->withInput()->with('status', '404');
            }

            $this->userService->destroy($id);
        }
        DB::commit();

        $this->raiseSuccess('User destroy successfully');
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
