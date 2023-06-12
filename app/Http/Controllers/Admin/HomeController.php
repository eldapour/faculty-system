<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Support\Collection
     */


    public function getSubjectByBranch($department_branch_id,$group_id)
    {

        $subjects = Subject::query()
            ->where("department_branch_id",'=',$department_branch_id)
        ->where("group_id",'=',$group_id)
            ->pluck("subject_name", "id");

        return $subjects;

    }



    public function index()
    {
        return view('admin.index');
    }
}
