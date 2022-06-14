<?php

use App\Models\News;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\RepositoryInterface;

class NewRepository extends EloquentRepository implements RepositoryInterface
{
    public function getModel()
    {
        return News::class;
    }

    public function getAll($request)
    {
        $result = $this->model->paginate(10);
        return $result;
    }
    public function findBySlug($slug)
    {
        $result = $this->model::with('will_learns', 'category', 'tracks')->where('slug', $slug)->first();
        foreach ($result->tracks as $key => $track) {
            foreach ($track->track_steps as $key2 => $track_step) {
                $track->track_steps[$key2]->step = $track_step->step;
            }
            $result->tracks[$key]->track_steps = $track->track_steps;
        }
        return $result;
    }
    public function findById($id)
    {
        $result = $this->model::with('will_learns', 'category', 'tracks')->where('id', $id)->first();
        foreach ($result->tracks as $key => $track) {
            foreach ($track->track_steps as $key2 => $track_step) {
                $track->track_steps[$key2]->step = $track_step->step;
            }
            $result->tracks[$key]->track_steps = $track->track_steps;
        }
        return $result;
    }
}
