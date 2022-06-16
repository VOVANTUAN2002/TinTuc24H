<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\CommentInterface;

class CommentRepository extends EloquentRepository implements CommentInterface
{

    public function getModel()
    {
        return Comment::class;
    }

    public function getAll($request)
    {
         $comment = $this->model->orderBy('id', 'desc')->paginate(5);
         return $comment;
    }

    public function update($request, $id)
    {

        $comment =$this->model->find($id)->first();
        $comment->content = $request->content;
        $comment->startus = $request->startus;
        // dd($comment);
        $comment->save();
        return $comment;
    }

    public function destroy($id)
    {
        $comment = $this->model->find($id)->first();
        $comment->delete();
        return $comment;
    }

}
