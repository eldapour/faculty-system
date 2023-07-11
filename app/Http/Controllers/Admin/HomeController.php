<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getSubjectByBranch($department_branch_id, $group_id): Collection
    {

        return Subject::query()
            ->where("department_branch_id", '=', $department_branch_id)
            ->where("group_id", '=', $group_id)
            ->pluck("subject_name", "id");

    }

    public function index()
    {
        $user_count = User::query()
            ->where('user_type', '=', 'student')
            ->orderBy('university_register_year','asc')
            ->get();
        $user_count = $user_count->countby('university_register_year')->toArray();
        $key = array_keys($user_count);
        $value = array_values($user_count);
        return view('admin.index', compact('key','value'));
    }

    public function forbidden($token)
    {

    }
}
