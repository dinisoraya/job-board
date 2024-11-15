<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class JobApplicationController extends Controller
{
    public function create(Job $job)
    {
        $this->authorize('apply', $job);
        return view('job_application.create', ['job' => $job]);
    }

    public function store(Job $job, Request $request)
    {
        $this->authorize('apply', $job);

        $validatedData = $request->validate([
            'expected_salary' => 'required|min:1|max:1000000',
            'cv' => 'required|file|mimes:pdf|max:2048'
        ]);

        $file = $request->file('cv');
        $path = $file->store('cvs', 'private');

        $job->jobApplications()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path
        ]);

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Job application submitted.');
    }

    public function downloadCV(Job $job, $applicationId)
    {
        $application = $job->jobApplications()->findOrFail($applicationId);

        $this->authorize('view', $application);

        $cvPath = $application->cv_path;

        if (Storage::disk('private')->exists($cvPath)) {
            $downloadFileName = $application->user->name . '_CV.pdf';
            return Storage::disk('private')->download($cvPath, $downloadFileName);        }

        return redirect()->back()->withErrors(['error' => 'File not found.']);
    }

    public function destroy(string $id)
    {
        //
    }
}