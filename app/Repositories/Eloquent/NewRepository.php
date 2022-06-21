<?php

namespace App\Repositories\Eloquent;

use App\Models\News;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\NewInterface;
use Illuminate\Http\Request;
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
        $object->puplish_date = date('d/m/Y', strtotime($object->puplish_date));
        $object->user_id  = $request->user_id;
        $object->category_new_id  = $request->category_new_id;
        if ($request->hasFile('image')) {
            $get_image          = $request->image;
            $path               = 'public/images';
            $get_name_image     = $get_image->getClientOriginalName();
            $name_image         = current(explode('.', $get_name_image));
            $new_image          = $name_image . time() . '.' . $get_image->getClientOriginalExtension();
            $get_image->storeAs($path, $new_image);
            $object->image = '/storage/images/' . $new_image;
        }
        $object->save();
        return $object;
    }

    public function categories($id)
    {
        $users = DB::table('        ')->where("user_id", $id)->get();
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
        $object->category_new_id  = $request->category_new_id;
        if ($request->hasFile('image')) {
            $get_image          = $request->image;
            $path               = 'public/images';
            $get_name_image     = $get_image->getClientOriginalName();
            $name_image         = current(explode('.', $get_name_image));
            $new_image          = $name_image . time() . '.' . $get_image->getClientOriginalExtension();
            $get_image->storeAs($path, $new_image);
            $object->image = '/storage/images/' . $new_image;
        }
        $object->save();
        return $object;
    }

    public function trashedItems()
    {

        $query = $this->model->onlyTrashed();

        $query->orderBy('id', 'desc');
        $news = $query->paginate(5);
        return $news;
    }

    public function restore($id)
    {
        $new = $this->model->withTrashed()->find($id);

        if ($new) {
            $new->restore();
            return true;
        } else {
            return false;
        }
        return $new;
    }

    public function force_destroy($id)
    {
        $new = $this->model->withTrashed()->find($id);
        if ($new) {
            $new->forceDelete();
            return $new;
        } else {
            return false;
        }
    }

    public function getAll($request)
    {
        $news = $this->model->select('*');
        if (isset($request->title) && $request->title) {
            $title = $request->title;
            $news->where('title', 'LIKE', '%' . $title . '%');
        }
        return $news->orderBy('id', 'desc')->paginate(5);
    }
}
