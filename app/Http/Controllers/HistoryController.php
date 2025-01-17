<?php

namespace App\Http\Controllers;

use App\Models\Ds_hypothesis;
use App\Models\Ds_result;
use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Hypothesis;

class HistoryController extends Controller
{
    public function index()
    {
        return view('history.index',[
            'title' => 'History CF',
            'histores' => History::orderby('id','desc')->get(),
            'hypotesis' => Hypothesis::all(),
            'history' => History::all(),
        ]);
    }

    public function index_ds()
    {
        return view('history.index_ds',[
            'title' => 'History DS',
            'histores' => Ds_result::orderby('id','desc')->get(),
            'hypotesis' => Ds_hypothesis::all(),
            'history' => Ds_result::all(),
        ]);
    }

    public function destroy_ds($id)
    {
        Ds_result::where('id', $id)->delete();
        return redirect()->route('history_ds.index')->with('status', 'Data deleted successfully');
    }

    public function destroy_cf($id)
    {
        History::where('id', $id)->delete();
        return redirect()->route('history.index')->with('status', 'Data deleted successfully');
    }

}
