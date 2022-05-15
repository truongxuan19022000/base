<?php


namespace App\Services;

use App\Http\Utils\AppUtils;
use App\Http\Utils\UserUtils;
use App\Repositories\UsersRepository;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class VendorService
{
    /** @var  UsersRepository */
    private $usersRepository;

    public function __construct(
        UsersRepository $usersRepository
    ) {
        $this->usersRepository = $usersRepository;
    }

    public function paginate($search, $perPage, $columns = ['*'], $orders = [])
    {
        return $this->usersRepository->paginate($search, $perPage, $columns, $orders);
    }

    public function find($id)
    {
        return $this->usersRepository->find($id);
    }

    public function store($input)
    {
        try {
            DB::beginTransaction();
            $email = explode("@", $input['email']);
            $input['role_id'] = 2;
            $input['name'] = $email[0];
            $user = $this->usersRepository->create($input);
            Auth::guard('vendor')->loginUsingId($user->id, true);
            event(new Registered($user));
            DB::commit();
            return true;
        } catch (\Throwable $ex) {
            dd($ex->getMessage());
            DB::rollBack();
            return false;
        }
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            if (isset($request['password']) && $request['password'] != "") {
                $request['password'] = Hash::make($request['password']);
            } else {
                unset($request['password']);
            }

            $this->usersRepository->update($request, $id);
            DB::commit();
            return true;
        } catch (\Throwable $ex) {
            DB::rollBack();
            return false;
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

    // vendor

    function SendMail($input){


    }
}
