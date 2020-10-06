<?php

namespace App\Http\Controllers\Admin;

use App\Budget;
use App\Category;
use App\Http\Controllers\Controller;
use App\Imports\BudgetsImport;
use App\Month;
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
        return view('admin.budget.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $option = $this->preparedData();

        return view('admin.budget.create', compact('option'));
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


        // Check if exists.
        if (Budget::where([
            'month_id' => $request->month_id
        ])->exists()) {
            flash('Budget Already Exists!')->error();
            return back();
        }

        Budget::create([
            'month_id' => (int) $request->month_id,
            'category_id' => (int) $request->category_id,
            'value' => (float) str_replace(',', '', $request->value),
        ]);
        flash('New Budgets Added Successfully!')->success();
        return redirect('/admin/budgets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        return view('admin.budget.show', compact('budget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {
        $option = $this->preparedData();

        return view('admin.budget.edit', compact('budget', 'option'));
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
        Validator::make($request->all(), [
            'month_id' => 'required|int',
            'category_id' => 'required|int',
            'value' => 'required',
        ])->validate();

        $budget->month_id = (int) $request->month_id;
        $budget->category_id = (int) $request->category_id;
        $budget->value = (float) str_replace(',', '', $request->value);

        $budget->update();
        flash('Budget Updated Successfully!')->warning();
        return redirect('/admin/budgets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget)
    {
        $budget->delete();
        flash('Budget Has Been Deleted!')->error();
        return redirect('/admin/budgets');
    }

    public function preparedData()
    {
        $categories = Category::select('id', 'name')->get();

        $category = [];

        foreach ($categories as $c) {
            $category[$c->id] = $c->name;
        }

        return [
            'category' => $category,
        ];
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
            ->addColumn('action', function ($model) {
                return view(
                    'layouts._action',
                    [
                        'model' => $model,
                        // 'show_url' => route('budgets.show', $model->id),
                        'edit_url' => route('budgets.edit', $model->id),
                        'delete_url' => route('budgets.destroy', $model->id),
                        'editDelete' => true,
                    ]
                );
            })
            ->editColumn('value', function ($model) {
                return number_format($model->value, 2, ',', '.');
            })
            ->editColumn('created_at', function ($model) {
                return date("H:i:s, j/M/Y", strtotime($model->created_at));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function import(Request $request)
    {
        Validator::make($request->all(), [
            'imported_file' => 'required|mimes:xls,xlsx'
        ])->validate();

        $file = $request->file('imported_file')->store('import');

        $import = new BudgetsImport;
        $import->import($file);

        flash('Budget Created!')->success();
        return redirect('/admin/budgets');
    }
}
