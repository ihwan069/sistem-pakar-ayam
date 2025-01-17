<?php

namespace App\Http\Controllers;

use App\Models\Evidence;
use App\Models\Hypothesis;
use App\Models\Role;
use App\Models\Setting;
use Illuminate\Http\Request;

class EvidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('evidence.index', [
            'title' => 'Evidences',
            'evidences' => Evidence::orderby('id', 'desc')->get(),
            'evidence_name' => Setting::find(1)->evidence_name,
        ]);
    }

    public function autoCode(){
        $latest_evidence = Evidence::orderBy('id', 'desc')->first();
    
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
        return view('evidence.create', [
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
            'code' => 'required|max:255|unique:evidence',
            'name' => 'required|max:255'
        ]);

        Evidence::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        $hypothesis = Hypothesis::all();
        $evidence = Evidence::orderby('id', 'desc')->first();

        foreach ($hypothesis as $h) {
            Role::create([
                'hypothesis_id' => $h->id,
                'evidence_id' => $evidence->id,
                'value' => 0.0
            ]);
        }

        return redirect()->route('evidence.index')->with('status','Data created succesfully!');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function show(Evidence $evidence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evidence = Evidence::where('id',$id)->first();
        return view('evidence.edit', [
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

        Evidence::where('id', $id)
            ->update([
                'name' => $request->name
            ]);
            
        return redirect()->route('evidence.index')->with('status','Data updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Evidence::where('id',$id)->delete();
        Role::where('evidence_id',$id)->delete();
        return redirect()->route('evidence.index')->with('status','Data deleted succesfully!');
    }
}
