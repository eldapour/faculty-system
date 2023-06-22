<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }




    public function getSubjectByBranch($department_branch_id,$group_id): Collection
    {

        return Subject::query()
            ->where("department_branch_id",'=',$department_branch_id)
        ->where("group_id",'=',$group_id)
            ->pluck("subject_name", "id");

    }


    public function index()
    {
        return view('admin.index');
    }
}
