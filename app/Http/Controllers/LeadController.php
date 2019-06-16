<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Contact;
use App\Lead;


use TomLingham\Searchy\Facades\Searchy;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadTrait;
use App\Http\Requests\LeadRequest;


class LeadController extends Controller
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
     * Display a listing of the project.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::with('contact', 'project')->orderBy('created_at', 'DESC')->paginate(15);


        return view('lead.index',compact('leads'));
    }


    /**
     * Show the form for creating a new project.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::get();       
        $contacts = Contact::get();       

        return view('lead.create',compact('projects', 'contacts'));
     }

    /**
     * Store a newly created project in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeadRequest $request)
    {

        Lead::create(['name' => $request->name,
        'value' => $request->value,
        'user_id' => Auth::id(),
        'contact_id'=> $request->contact_id,
        'project_id'=> $request->project_id,
        ]);

        return redirect()->route('lead.index');
    }
}
