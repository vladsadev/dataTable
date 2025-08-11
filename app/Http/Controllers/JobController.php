<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $jobs = Job::all()->groupBy('featured');
//        $jobs = Job::latest()->get()->groupBy('featured');
        $jobs = Job::latest()->with(['employer','tags'])->get()->groupBy('featured');

//       return $jobs;
        return view('jobs.index', [
            'featured_jobs' => $jobs[1],
            'jobs' => $jobs[0],
//            'jobs' => Job::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $validated = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url' => ['required'],
            'tags' => ['nullable']
        ]);

        $validated['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create(
            Arr::except($validated, 'tags')
        ); //

        if ($validated['tags'] ?? false) {
            foreach (explode(',', $validated['tags']) as $tag) {
                $job->tag($tag);
            }
        }

        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
