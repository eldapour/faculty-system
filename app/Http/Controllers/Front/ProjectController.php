<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $sliders = Slider::first();
        $settings = Setting::first();
        $projects = Project::latest()->get();
        $services = Service::get();
        return view('Front.project', compact('settings', 'services', 'projects', 'sliders'));
    }

    public function oneProject($id)
    {
        $projects = Project::latest()->take(6)->get();
        $settings = Setting::first();
        $oneProject = Project::findOrFail($id);
        return view('Front.project-single', compact('settings', 'oneProject', 'projects'));
    }

    public function categorySort(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id && $request->id == 'all') {
                $projects = Project::get();
            } else {
                $id = $request->id;
                $projects = Project::where('service_id', $id)->get();
            }
            $output = '';

            if ($projects->count() > 0) {
                foreach ($projects as $key => $project) {
                    $output .=
                        '     <div class="col-12 col-md-6 col-lg-4 project-item filter-finance filter-supply">
                        <div class="project-panel" data-hover="">
                            <div class="project-panel-holder projects-all">

                                <div class="project-img">
                                    <a class="link" href="' . route('project', $project->id) . '"></a
                                    ><img
                                        src="' . asset($project->image) . '"
                                        alt="project image"
                                        class="w-100"
                                    />
                                </div>

                                <div class="project-content">
                                    <div class="project-title">
                                        <h4>
                                            <a href="' . route('project', $project->id) . '"
                                            >' . trans_model($project,'title') . '</a

                                            >
                                        </h4>
                                    </div>
                                    <div class="project-cat">
                                        <a href="projects-standard.html">' . trans_model($project,'desc') . '</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>';
                }
                return Response([$output]);
            } else {
                return response('no data', 404);
            }
        }
    } // end Category sorting
}
