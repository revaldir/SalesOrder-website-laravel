<?php

namespace App\Http\Controllers\Admin;

use App\Budget;
use App\Http\Controllers\Controller;
use App\Month;
use App\Outflow;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months = Month::all();

        return view('admin.report.index', compact('months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'month' => 'required',
        ])->validate();

        $budget = Budget::where('month_id', $request->month)->sum('value');
        $outflow = Outflow::where('month_id', $request->month)->sum('out_value');
        $balance = $budget - $outflow;

        // UPDATE MONTH MODEL
        Month::find($request->month)->update(
            [
                'budget' => (float) $budget,
                'outflow' => (float) $outflow,
                'balance' => (float) $balance
            ]
        );

        // UPDATE REPORT MODEL
        for ($i = 1; $i <= 21; $i++) {
            $b = Budget::where('month_id', $request->month)->where('category_id', $i)->sum('value');
            // dd($b);
            $o = Outflow::where('month_id', $request->month)->where('category_id', $i)->sum('out_value');

            $coba = Report::updateOrCreate(
                [
                    'month_id' => $request->month,
                    'category_id' => $i,
                    'budget' => (float) $b,
                    'outflow' => (float) $o
                ]
            );
        }
        flash('New Report Created!')->success();
        return redirect('/admin/reports/' . $request->month);
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

        return view('admin.report.show', compact('month', 'reports'));
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
        // dd($budgets);
        return view('admin.report.more', compact('budgets', 'report', 'outflows'));
    }
}
