<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ds_evidence;
use App\Models\Hypothesis;
use App\Models\Role;
use App\Models\Setting;

class EvidencedsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('evidence_ds.index', [
            'title' => 'Evidences DS',
            'evidences' => Ds_evidence::orderby('id', 'desc')->get(),
            'evidence_name' => Setting::find(1)->evidence_name,
        ]);
    }

    public function autoCode(){
        $latest_evidence = Ds_evidence::orderBy('id', 'desc')->first();
    
        if ($latest_evidence) {
            $code = $latest_evidence->code;
            $order = (int) substr($code, 2, 4);
            $order++;
        } else {
            $order = 1; // Set a default value if no evidence is found
        }
    
        $letter = "G";
        $code = $letter . sprintf("%03s", $order);
    
        return $code;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evidence_ds.create', [
            'title' => 'Create Evidence',
            'code' => $this->autoCode()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEvidenceRequest  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|max:255|unique:Ds_evidences',
            'name' => 'required|max:255'
        ]);

        Ds_evidence::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return redirect()->route('evidence_ds.index')->with('status','Data created succesfully!');

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evidence = Ds_evidence::where('id',$id)->first();
        return view('evidence_ds.edit', [
            'title' => 'Edit Evidence',
            'evidence' => $evidence
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvidenceRequest  $request
     * @param  \App\Models\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        Ds_evidence::where('id', $id)
            ->update([
                'name' => $request->name
            ]);
            
        return redirect()->route('evidence_ds.index')->with('status','Data updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ds_evidence::where('id',$id)->delete();
        return redirect()->route('evidence_ds.index')->with('status','Data deleted succesfully!');
    }
}
