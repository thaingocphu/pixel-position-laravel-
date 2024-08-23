<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    public function index()
    {
        //feature have two type values such as True(1) and False(0)
        $jobs = Job::latest()->get()->groupBy("featured");
        $tags = Tag::latest()->get();

        return view("jobs.index", [
            "featured_jobs"=> $jobs[1],
            "jobs"=> $jobs[0],
            "tags"=> $tags
        ]);
    }
    public function create()
    {
        return view("jobs.create");
    }
    public function store(HttpRequest $request)
    {

        $jobAttributes = $request->validate([
            "title"=> ["required"],
            "salary"=> ["required"],
            "location"=> ["required"],
            "schedule"=> ["required", Rule::in(["Full time","Part time"])],
            "url"=> ["required", "active_url"],
            "tags"=> ["nullable"],
        ]); 

        $jobAttributes["featured"] = $request->has("featured");


        $job = Auth::user()->employer->jobs()->create(Arr::except($jobAttributes, 'tags'));

        if($jobAttributes['tags'] ?? false){
            foreach (explode(', ', $jobAttributes['tags']) as $tag) {
            $job->tag($tag);
            }
        }

       return redirect(route('jobs.index'));
    }
}
