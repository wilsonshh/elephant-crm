@extends('layouts.master') @section('pageTitle', 'Project') @section('content')


<div class="container-fluid">
    <div id="ui-view">
        <div>


            <div class="row">


                <div class="col-6 col-lg-3">
                    <div class="card">
                        <div class="card-body p-3 d-flex align-items-center">
                            <i class="icon-notebook bg-primary p-3 font-2xl mr-3"></i>
                            <div>
                                <div class="text-value-sm text-primary">{{ $projectCount }}</div>
                                <div class="text-muted text-uppercase font-weight-bold small">Projects</div>
                            </div>
                        </div>
                        <div class="card-footer px-3 py-2">
                            <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('project.index') }}">
                                <span class="small font-weight-bold">Show All</span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="card">
                        <div class="card-body p-3 d-flex align-items-center">
                            <i class="icon-people bg-info p-3 font-2xl mr-3"></i>
                            <div>
                                <div class="text-value-sm text-info">{{ $contactCount }}</div>
                                <div class="text-muted text-uppercase font-weight-bold small">Contacts</div>
                            </div>
                        </div>
                        <div class="card-footer px-3 py-2">
                            <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('contact.index') }}">
                                <span class="small font-weight-bold">Show All</span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="card">
                        <div class="card-body p-3 d-flex align-items-center">
                            <i class="fa fa-phone bg-warning p-3 font-2xl mr-3"></i>
                            <div>
                                <div class="text-value-sm text-warning">{{ $leadCount }}</div>
                                <div class="text-muted text-uppercase font-weight-bold small">Leads</div>
                            </div>
                        </div>
                        <div class="card-footer px-3 py-2">
                            <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('lead.index') }}">
                                <span class="small font-weight-bold">View More</span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="card">
                        <div class="card-body p-3 d-flex align-items-center">
                            <i class="fa fa-money bg-danger p-3 font-2xl mr-3"></i>
                            <div>
                                <div class="text-value-sm text-danger"> £{{ $leadValue }}</div>
                                <div class="text-muted text-uppercase font-weight-bold small">Total Lead Value</div>
                            </div>
                        </div>
                        <div class="card-footer px-3 py-2">
                            <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('lead.index') }}">
                                <span class="small font-weight-bold">View More</span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col 6">
                    <div class="card">
                        <div class="card-header">Most Recent Leads
                            <div class="card-header-actions">
                                <a class="card-header-action" href="http://www.chartjs.org" target="_blank">
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Lead</th>
                                            <th>Project</th>
                                            <th>Value</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latestLeads as $lead)
                                        <tr>
                                            <td>
                                                <h5 class="font-15 mb-1 font-weight-normal">{{ $lead->contact->name }}</h5>
                                                <span class="text-muted font-13">{{ $lead->contact->job_title }}</span>
                                            </td>
                                            <td>{{ $lead->project->name }}</td>
                                            <td>£{{ $lead->value }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive-->

                        </div>
                    </div>
                </div>

                <div class="col 6">

                    <div class="card">
                        <div class="card-header">Lead Activity
                            <div class="card-header-actions">
                                <a class="card-header-action" href="http://www.chartjs.org" target="_blank">
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                    </div>
                                </div>
                                <canvas id="canvas-2" width="566" height="282" class="chartjs-render-monitor" style="display: block; height: 141px; width: 283px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col 6">
                    <div class="card">
                        <div class="card-header">Contact Radar
                            <div class="card-header-actions">
                                <a class="card-header-action" href="http://www.chartjs.org" target="_blank">
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div class="chartjs-size-monitor" style="position: absMembers online
                                    olute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                                        </div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                    </div>
                                </div>
                                <canvas id="canvas-4" width="678" height="338" class="chartjs-render-monitor" style="display: block; height: 169px; width: 339px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col 6">
                    <div class="card">
                        <div class="card-header">Contacts Gender
                            <div class="card-header-actions">
                                <a class="card-header-action" target="_blank">
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                                        </div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                    </div>
                                </div>
                                <canvas id="canvas-5" width="678" height="338" class="chartjs-render-monitor" style="display: block; height: 169px; width: 339px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection