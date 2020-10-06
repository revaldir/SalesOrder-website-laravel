<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Month;
use App\Outflow;
use Carbon\Carbon;
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
        $outflows = Outflow::all();

        // $bln = getdate()['mon'];

        // // dd($bln);

        // $coba = Month::where('id', getdate()['mon'])->select('id', 'month')->get();

        // dd($coba);

        // dd(getdate()['mon']);

        return view('fe.outflow.index', compact('outflows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(mt_rand(100000, 1000000));

        $options = $this->preparedData();

        return view('fe.outflow.create', compact('options'));
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
            'month_id' => 'required|int',
            'category_id' => 'required|int',
            'out_value' => 'required',
        ])->validate();

        $outflow = new Outflow;
        $id = IdGenerator::generate(['table' => 'outflows', 'length' => 7, 'prefix' => date('my')]);
        // $month = Month::find($request->month);

        $outflow->id = $id;
        $outflow->proyek = $request->proyek;
        $outflow->month_id = (int) $request->month_id;
        $outflow->category_id = (int) $request->category_id;
        $outflow->out_value = (float) str_replace(',', '', $request->out_value);
        $outflow->submitter = Auth::user()->name;

        $outflow->save();
        flash('New Outflow Added Successfully!')->success();
        return redirect('/outflows');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Outflow  $outflow
     * @return \Illuminate\Http\Response
     */
    public function show(Outflow $outflow)
    {
        return view('fe.outflow.show', compact('outflow'));
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

        return view('fe.outflow.edit', compact('options', 'outflow'));
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
            'month_id' => 'required|int',
            'category_id' => 'required|int',
            'out_value' => 'required'
        ])->validate();

        $outflow->proyek = $request->proyek;
        $outflow->month_id = (int) $request->month_id;
        $outflow->category_id = (int) $request->category_id;
        $outflow->out_value = (float) str_replace(',', '', $request->out_value);
        $outflow->update();

        flash('Outflow Edited!')->warning();
        return redirect('/outflows');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Outflow  $outflow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outflow $outflow)
    {
        //
    }

    public function preparedData()
    {
        $categories = Category::select('id', 'name')->get();
        $months = Month::all();

        $category = [];
        $month = [];

        foreach ($categories as $c) {
            $category[$c->id] = $c->name;
        }

        foreach ($months as $m) {
            $now = getdate()['mon'];
            $bln = Month::where('id', $now)->first();
            if ($m->id == $bln->id || $m->id == $bln->id + 1) {
                $month[$m->id] = $m->month;
            } else {
            }
        }

        return [
            'category' => $category,
            'month' => $month,
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
            ->editColumn('out_value', function ($model) {
                return number_format($model->out_value, 2, ',', '.');
            })
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'show_url' => route('user.outflows.show', $model->id),
                    'showOnly' => true,
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
