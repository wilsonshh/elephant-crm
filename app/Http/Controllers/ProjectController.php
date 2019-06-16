<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use TomLingham\Searchy\Facades\Searchy;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadTrait;
use App\Http\Requests\ProjectRequest;


class ProjectController extends Controller
{

    use UploadTrait;

    // Limit the number of project shown.
    const LIMIT = 6;

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
     * Display a listing of the project.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('user_id', auth()->user()->id)
                                                    ->inRandomOrder()
                                                    ->take(static::LIMIT)->get();

        return view('project.index',compact('projects'));
    }


    /**
     * Show the form for creating a new project.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created project in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {

        // Get image file
        $image = $request->file('image');
        // Make a image name based on project name and current timestamp
        $name = str_slug($request->input('name')).'_'.time();
        // Define folder path
        $folder = '/uploads/images/';
        // Set file path
        $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();

        // Upload image
        $this->uploadOne($image, $folder, 'public', $name);

        Project::create(['name' => $request->name,
        'desc' => $request->desc,
        'user_id' => Auth::id(),
        'image'=> $filePath
        ]);

        return redirect()->route('project.index');
    }

    /**
     * Display the specified project.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $this->setLastViewed($id);

         // get the project
         $project = Project::find($id);


         // show the edit form and pass the project

         return view('project.show',compact('project'));


    }


    /**
     * Set the project id when a project is shown.
     *
     * @param  int  $projectId
     */
    public function setLastViewed($projectId) {

        $authId = auth()->user()->id;
        $user = User::findOrFail($authId);
        $user->last_project_viewed = $projectId;

        $user->save();
    }

    /**
     * Show the form for editing the project.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the project
        $project = Project::find($id);

        // show the edit form and pass the project

        return view('project.edit',compact('project'));
    }

    /**
     * Update project in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($files=$request->file('image')){

            // Get image file
            $image = $request->file('image');
            // Make a image name based on project name and current timestamp
            $name = str_slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Set file path
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();

            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);

            $project = Project::findOrFail($id);

            $project->name = $request->get('name');
            $project->desc = $request->get('desc');
            $project->user_id = auth()->user()->id;
            $project->image = auth()->user()->id;

            $project->save();

        } else {
            $project = Project::findOrFail($id);

            $project->name = $request->get('name');
            $project->desc = $request->get('desc');
            $project->user_id = auth()->user()->id;


            $project->save();
        }


        return redirect()->route('project.index');
    }

    /**
     * Remove the specified project from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json($project);
    }

    /**
     * Show autocomplete suggestion for the given term.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = Project::select("name")
                ->where("name","LIKE","%{$request->input('query')}%")
                ->get();

        return response()->json($data);
    }

    /**
     * Display project list for the given search term.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        $projects = Searchy::projects('name')->query($query)
                                             ->getQuery()
                                             ->orderBy('created_at', 'DESC')
                                             ->limit(static::LIMIT)
                                             ->get();

        return view('project.index',compact('projects'));
    }
}
