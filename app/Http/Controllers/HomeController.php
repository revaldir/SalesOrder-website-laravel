<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Budget;
use App\Category;
use App\Month;
use App\Outflow;
use App\User;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $budget = DB::table('budgets')->sum('value');
        $outflow = DB::table('outflows')->sum('out_value');
        $bm = Budget::where('month_id', getdate()['mon'])->sum('value');
        $om = Outflow::where('month_id', getdate()['mon'])->sum('out_value');

        $b = Budget::count();
        $o = Outflow::count();

        return view('home.user', compact('outflow', 'budget', 'bm', 'om'));
    }

    public function admin()
    {
        $categories = Outflow::where('category_id', 1)->sum('out_value');
        $budget = DB::table('budgets')->sum('value');
        $outflow = DB::table('outflows')->sum('out_value');

        $coba = Budget::where('category_id', 1)->sum('value');

        $b = Budget::count();
        $o = Outflow::count();

        $users = User::where('is_active', FALSE)->get();

        return view('home.admin', compact('outflow', 'budget', 'b', 'o', 'categories', 'coba', 'users'));
    }

    public function approve(User $user)
    {
        $user->is_active = TRUE;
        $user->update();
        flash('User approved!')->success();
        return redirect()->route('home.admin');
    }
}
