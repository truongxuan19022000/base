<?php


namespace App\Services;

use App\Http\Utils\AppUtils;
use App\Models\UserInfo;
use App\Repositories\UsersInfoRepository;
use App\Repositories\UsersRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserService extends BaseService
{
    /** @var  UsersRepository */
    private $usersRepository;
    private $userInfoRepository;

    public function __construct(
        UsersRepository $usersRepository,
        UsersInfoRepository $userInfoRepository
    )
    {
        $this->usersRepository = $usersRepository;
        $this->userInfoRepository = $userInfoRepository;
    }

    public function paginate($search, $perPage, $columns = ['*'], $orders = [])
    {
        return $this->usersRepository->paginate($search, $perPage, $columns, $orders);
    }

    public function find($id)
    {
        return $this->usersRepository->find($id);
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $request['password'] =  Hash::make('123456');
            $user = $this->usersRepository->create($request);
            $request['user_id'] = $user->id;
            $request['name'] = 'guest';
            $this->userInfoRepository->create($request);
            DB::commit();
           return $this->res($user);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return $this->res(null, false, $ex->getMessage());
        }
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $user = $this->usersRepository->update($request, $id);
            $this->userInfoRepository->update($request, $id);
            DB::commit();
            return $this->res($user);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return $this->res(null, false, $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->usersRepository->delete($id);
            DB::commit();
            return true;
        } catch (\Throwable $ex) {
            DB::rollBack();
            return false;
        }
    }

}
