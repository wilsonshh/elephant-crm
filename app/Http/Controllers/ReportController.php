<?php

namespace App\Http\Controllers;

use App\Report;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{


    /**
     * Display the gender split between contacts
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function getGenderCount(Report $report)
    {
        $results = DB::select( DB::raw("SELECT count(case when gender='Male' then 1 end) as Male,
                                               count(case when gender='Female' then 1 end) as Female,
                                               count(case when gender='Other' then 1 end) as Other
                                        FROM contacts") );
        return $results;

    }

    /**
     * Display the job title split between contacts
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function getCountByOccupation(Report $report)
    {
        $results = DB::select( DB::raw("SELECT job_title, COUNT(*) AS `count`
                                        FROM contacts
                                        GROUP BY job_title
                                        ORDER BY count DESC
                                        LIMIT 5") );

        return $results;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function getAnnualBreakdown(Report $report)
    {
        $results = DB::select( DB::raw("SELECT MONTHNAME(created_at) MONTH,
                                                Count(*)          COUNT
                                        FROM   contacts
                                        WHERE  Year(created_at) = 2019
                                        GROUP  BY MONTHNAME(created_at);") );

        return $results;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function getLeadActivity(Report $report)
    {
        $results = DB::select( DB::raw("SELECT activity, COUNT(*) count
                                        FROM leads 
                                        GROUP BY activity;") );

        return $results;
    }


}
