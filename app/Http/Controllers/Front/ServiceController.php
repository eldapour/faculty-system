<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::get();
        return view('Front.service', compact('services'));
    } // end index

    public function serviceProject($id)
    {
        $service = Service::find($id);
        $projects = Project::where('service_id', $id)->get();
        return view('Front.service-project', compact('projects','service'));
    } // end serviceProject
}
