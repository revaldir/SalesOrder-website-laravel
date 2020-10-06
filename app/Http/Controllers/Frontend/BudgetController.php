<?php

namespace App\Http\Controllers\Frontend;

use App\Budget;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $month = Budget::where('month_id', getdate()['mon'])->get();
        $budgets = Budget::all();

        $all = Budget::count();
        $tm = Budget::where('month_id', getdate()['mon'])->count();

        return view('fe.budget.index', compact('budgets', 'month', 'all', 'tm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = $this->preparedData();

        return view('fe.budget.create', compact('options'));
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
            'month_id' => 'required|int',
            'category_id' => 'required|int',
            'value' => 'required'
        ])->validate();

        $budget = new Budget;
        $budget->month_id = (int) $request->month_id;
        $budget->category_id = (int) $request->category_id;
        $budget->value = (float) str_replace(',', '', $request->value);

        // Check if exists.
        if (Budget::where([
            'month_id' => $request->month_id,
            'category_id' => $request->category_id,
        ])->exists()) {
            return back()->with('status', 'Budget Already Exists!');
        }

        $budget->save();
        flash('New Budget Added Successfully!')->success();
        return redirect('/budgets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budget $budget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget)
    {
        //
    }

    public function dataTables()
    {
        $model = Budget::query();

        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->addColumn('months', function (Budget $budget) {
                return $budget->month->month;
            })
            ->addColumn('categories', function (Budget $budget) {
                return $budget->category->name;
            })
            ->editColumn('value', function ($model) {
                return number_format($model->value, 2, ',', '.');
            })
            ->make(true);
    }
}
