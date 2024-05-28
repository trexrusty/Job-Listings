<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use App\Models\Job;
use App\Models\Tag;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->with(['employer', 'tags'])->get();

        $featuredJobs = $jobs->where('featured', true);
        $regularJobs = $jobs->where('featured', false);

        $perPage = 2;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $regularJobs->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $paginatedJobs = new LengthAwarePaginator($currentPageItems, $regularJobs->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        return view('jobs.index', [
            'featuredJobs' => $featuredJobs,
            'jobs' => $paginatedJobs,
            'tags' => Tag::all(),
            'paginator' => $paginatedJobs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url' => ['required', 'url'],
            'tags' => ['nullable'],
        ]);

        $attributes['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if($attributes['tags'] ?? false) {
           foreach (explode(',', $attributes['tags']) as $tag){
                $job->tag($tag);
           }
        }
        return redirect('/');
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
