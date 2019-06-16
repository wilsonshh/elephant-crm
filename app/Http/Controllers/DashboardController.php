<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Project;
use App\Contact;
use App\Lead;
use DB;


class DashboardController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leadCount = Lead::count();
        $projectCount = Project::count();
        $contactCount = Contact::count();
        $leadValue = Lead::sum('value');


        $latestLeads = Lead::with('contact', 'project')->orderBy('created_at', 'DESC')->limit(7)->get();


        return view('dashboard.index',compact('leadCount', 'projectCount', 'contactCount', 'leadValue', 'latestLeads'));

    }

    
}
