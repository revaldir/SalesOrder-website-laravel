<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Month;
use App\Outflow;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class OutflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.outflow.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = $this->preparedData();

        return view('admin.outflow.create', compact('options'));
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
            'proyek' => 'required|max:16',
            'month' => 'required|int',
            'category_id' => 'required|int',
            'value' => 'required',
        ])->validate();

        $outflow = new Outflow;
        $id = IdGenerator::generate(['table' => 'outflows', 'length' => 7, 'prefix' => date('my')]);
        $month = Month::find($request->month);

        $outflow->id = $id;
        $outflow->proyek = $request->proyek;
        $outflow->month_id = (int) $request->month;
        $outflow->category_id = (int) $request->category_id;
        $outflow->out_value = (float) str_replace(',', '', $request->value);
        $outflow->submitter = Auth::user()->name;

        $outflow->save();
        flash('New Outflow Added Successfully!')->success();
        return redirect('/admin/outflows');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Outflow  $outflow
     * @return \Illuminate\Http\Response
     */
    public function show(Outflow $outflow)
    {
        return view('admin.outflow.show', compact('outflow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Outflow  $outflow
     * @return \Illuminate\Http\Response
     */
    public function edit(Outflow $outflow)
    {
        $options = $this->preparedData();

        return view('admin.outflow.edit', compact('outflow', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outflow  $outflow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outflow $outflow)
    {
        Validator::make($request->all(), [
            'proyek' => 'required|max:16',
            'month_id' => 'required',
            'category_id' => 'required',
            'out_value' => 'required'
        ])->validate();

        $outflow->proyek = $request->proyek;
        $outflow->month_id = (int) $request->month_id;
        $outflow->category_id = (int) $request->category_id;
        $outflow->out_value = (float) str_replace(',', '', $request->out_value);

        $outflow->update();
        flash('Outflow Updated Successfully!')->warning();
        return redirect('/admin/outflows');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Outflow  $outflow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outflow $outflow)
    {
        $outflow->delete();

        flash('Outflow Has Been Deleted!')->error();
        return redirect('admin/outflows');
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
        $model = Outflow::query();

        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->addColumn('months', function (Outflow $outflow) {
                return $outflow->month->month;
            })
            ->addColumn('categories', function (Outflow $outflow) {
                return $outflow->category->name;
            })
            ->addColumn('action', function ($model) {
                return view(
                    'layouts._action',
                    [
                        'model' => $model,
                        'delete_url' => route('outflows.destroy', $model->id),
                        'edit_url' => route('outflows.edit', $model->id),
                        'show_url' => route('outflows.show', $model->id),
                        'showOnly' => true,
                    ]
                );
            })
            ->editColumn('out_value', function ($model) {
                return number_format($model->out_value, 2, ',', '.');
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
