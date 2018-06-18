<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.charts.index');
    }

    public function chartpays()
    {
        $purchasesmonth =  DB::select( DB::raw("select round(SUM(amount),2) as total, MONTHNAME(created_at) AS mes ,YEAR(created_at) AS year FROM pays group by MONTHNAME(created_at),YEAR(created_at) ORDER BY(created_at)"));


        return $purchasesmonth;

    }

    public function totals()
    {
        $total =  DB::select( DB::raw("select round((SUM(amount)/100),2) * 30 as doc, round((SUM(amount)/100),2) * 70 as users , round(SUM(amount),2) as total from pays"));

        return $total;

    }

    public function chartDocCat()
    {
        $cat =  DB::select( DB::raw("select  count(c.id) as total ,c.name from categories c join
documents d on c.id = d.category_id group by c.name"));
        return $cat;
    }

    public function chartUsers()
    {
        $users =  DB::select( DB::raw("select count(id) as total, MONTHNAME(created_at) AS mes ,YEAR(created_at) AS year FROM users group by MONTH(created_at),YEAR(created_at) ORDER BY(created_at)"));
        return $users;
    }
}
