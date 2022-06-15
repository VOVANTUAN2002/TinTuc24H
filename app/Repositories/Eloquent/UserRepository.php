<?php
namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository extends EloquentRepository implements UserInterface
{

    public function getModel()
    {
        return User::class;
    }
    public function create($request)
    {

        try {
            $object = $this->model;
            $object->name = $request->name;
            $object->phone = $request->phone;
            $object->password= Hash::make($request->password);
            $object->gender = $request->gender;
            $object->day_of_birth = $request->day_of_birth;
            $object->address = $request->address;
            $object->start_day = $request->start_day;
            $object->email = $request->email;
            $object->user_group_id = $request->user_group_id;

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $storedPath = $avatar->move('avatars', $avatar->getClientOriginalName());
                $object->avatar           = 'upload/'.$avatar->getClientOriginalName();
            }
            $object->save();

        } catch (\Exception $e) {
            return null;
        }
        return $object;
    }

    public function update($request, $id)
    {
        $object = $this->model->find($id);
        $object->name = $request->name;
        $object->phone = $request->phone;
        $object->password= Hash::make($request->password);
        $object->gender = $request->gender;
        $object->day_of_birth = $request->day_of_birth;
        $object->address = $request->address;
        $object->start_day = $request->start_day;
        $object->email = $request->email;
        $object->user_group_id = $request->user_group_id;

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $storedPath = $avatar->move('avatars', $avatar->getClientOriginalName());
            $object->avatar           = 'upload/'.$avatar->getClientOriginalName();
        }
        $object->save();

        return $object;
    }

    public function trashedItems(){

        $query = $this->model->onlyTrashed();
        //sắp xếp thứ tự lên trước khi update
        $query->orderBy('id', 'desc');
        $users = $query->paginate(2);
        return $users;
    }

    public function restore($id){

        $user = $this->model->withTrashed()->find($id);

        if($user){
            $user->restore();
            return true;
        }else{
            return false;
        }
        return $user;
    }

    public function force_destroy($id){
        $user= $this->model->withTrashed()->find($id);
        if($user){
            $user->forceDelete();
            return $user;
        }else{
            return false;
        }
    }
}
