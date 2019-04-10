<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait RESTActions {


    public function all()
    {
        return $this->respond(Response::HTTP_OK, $this->repo->all());
    }

    public function get($id)
    {
        $model = $this->repo->show($id);
        if(is_null($model)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }   
        return $this->respond(Response::HTTP_OK, $model);
    }

    public function add(Request $request)
    {
        $this->validate($request, $this->repo->getModel()::$rules);
        return $this->respond(Response::HTTP_CREATED, $this->repo->create($request->all()));
    }

    public function put(Request $request, $id)
    {
        $this->validate($request, $this->repo->getModel()::$rules);
        $model = $this->repo->show($id);
        if(is_null($model)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $model = $this->repo->update($request->all(), $id);
        return $this->respond(Response::HTTP_OK, $model);
    }

    public function remove($id)
    {
        if(is_null($this->repo->show($id))){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $this->repo->delete($id);
        return $this->respond(Response::HTTP_NO_CONTENT);
    }

    public function batchRemove(Request $request)
    {
        $ids = $request->all()['ids'];
        foreach ($ids as $id) {
            if (!is_null($this->repo->show($id))) {
                $this->repo->delete($id);
            }
        }
        return $this->respond(Response::HTTP_NO_CONTENT);
    }

    protected function respond($status, $data = [])
    {
        return response()->json($data, $status);
    }

}
