<?php

namespace App\Repositories\Eloquent;

use App\Models\News;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\NewInterface;
use Illuminate\Support\Facades\DB;

class NewRepository extends EloquentRepository implements NewInterface
{
    public function getModel()
    {
        return News::class;
    }

    public function create($request)
    {
        $object = $this->model;
        $object->title    = $request->title;
        $object->description   = $request->description;
        $object->content    = $request->content;
        $object->status   = $request->status;
        $object->view  = $request->view;
        $object->hot = $request->hot;
        $object->puplish_date = $request->puplish_date;
        $object->user_id  = $request->user_id;
        if ($request->hasFile('image')) {
            $get_image          = $request->image;
            //tạo file upload trong public để chạy ảnh
            $path               = 'front-end/images';
            $get_name_image     = $get_image->getClientOriginalName(); //abc.jpg
            //explode "." [abc,jpg]
            $name_image         = current(explode('.', $get_name_image)); //trả về phần tử thứ 1 của mảng
            //getClientOriginalExtension: tạo đuôi ảnh
            $new_image          = $name_image . time() . '.' . $get_image->getClientOriginalExtension();
            //abc nối số ngẫu nhiên từ 0-99, nối "." ->đuôi file jpg
            $get_image->storeAs($path, $new_image); //chuyển file ảnh tới thư mục
            // $data['image']      = $new_image;
            // dd($new_image);
            $object->image = '/front-end/images/' . $new_image;
        }
        $object->save();
        return $object;
    }

    public function categories($id)
    {
        $users = DB::table('users')->where("user_id", $id)->get();
        return $users;
    }

    public function update($request, $id)
    {
        $object = $this->model->find($id);
        $object->title    = $request->title;
        $object->description   = $request->description;
        $object->content    = $request->content;
        $object->status   = $request->status;
        $object->view  = $request->view;
        $object->hot = $request->hot;
        $object->puplish_date = $request->puplish_date;
        $object->user_id  = $request->user_id;
        if ($request->hasFile('image')) {
            $get_image          = $request->image;
            //tạo file upload trong public để chạy ảnh
            $path               = 'front-end/images';
            $get_name_image     = $get_image->getClientOriginalName(); //abc.jpg
            //explode "." [abc,jpg]
            $name_image         = current(explode('.', $get_name_image)); //trả về phần tử thứ 1 của mảng
            //getClientOriginalExtension: tạo đuôi ảnh
            $new_image          = $name_image . time() . '.' . $get_image->getClientOriginalExtension();
            //abc nối số ngẫu nhiên từ 0-99, nối "." ->đuôi file jpg
            $get_image->storeAs($path, $new_image); //chuyển file ảnh tới thư mục
            // $data['image']      = $new_image;
            // dd($new_image);
            $object->image = '/front-end/images/' . $new_image;
        }
        // dd($object);
        $object->save();
        return $object;
    }

    public function trashedItems(){

        $query = $this->model->onlyTrashed();

        $query->orderBy('id', 'desc');
        $news = $query->paginate(5);
        return $news;
    }

    public function restore($id){

        $new = $this->model->withTrashed()->find($id);

        if($new){
            $new->restore();
            return true;
        }else{
            return false;
        }
        return $new;
    }

    public function force_destroy($id){
        $new= $this->model->withTrashed()->find($id);
        if($new){
            $new->forceDelete();
            return $new;
        }else{
            return false;
        }
    }
}
