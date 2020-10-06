<?php

namespace App\Http\Controllers\Frontend;

use App\Budget;
use App\Category;
use App\Http\Controllers\Controller;
use App\Month;
use App\Outflow;
use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Month::find(getdate()['mon']);
        $months = Month::all();

        return view('fe.report.index', compact('now', 'months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $month = Month::find($id);
        $reports = Report::where('month_id', $id)->get();

        return view('fe.report.show', compact('month', 'reports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }

    public function showCat($month, $cat)
    {
        $report = Report::where('month_id', $month)->where('category_id', $cat)->get();
        $budgets = Budget::where('month_id', $month)->where('category_id', $cat)->get();
        $outflows = Outflow::where('month_id', $month)->where('category_id', $cat)->get();

        return view('fe.report.more', compact('budgets', 'report', 'outflows'));
    }
}
