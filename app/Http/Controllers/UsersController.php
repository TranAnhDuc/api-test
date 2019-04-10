<?php

namespace App\Http\Controllers;

use App\User;
use App\Repo\Repository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller {

    use RESTActions;

    public function __construct(User $repo)
    {
        // set the model
        $this->repo = new Repository($repo);
    }

    public function get($id)
    {
        $user = $this->repo->with('role', ['role_name'])->findOrFail($id);
        if(is_null($user)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        return $this->respond(Response::HTTP_OK, $user);
    }
}
