<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        //$projects = DB::select("SELECT * FROM public.projects ORDER BY projectid ASC");
       // print_r($projects); die("HERE");
        return response()->json($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ProjectName' => 'required|max:255',
            'DateOfStart' => 'required',
            'TeamSize' => 'required'
          ]);
      
          $newProject = new Project([
            'ProjectName' => $request->get('ProjectName'),
            'DateOfStart' => $request->get('DateOfStart'),
            'TeamSize' => $request->get('TeamSize'),
          ]);
      
          $newProject->save();
      
          return response()->json($newProject);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        die("EDIT");die;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Project = Project::find($id);
        $Project->ProjectName = $request->get('ProjectName');
        $Project->DateOfStart = $request->DateOfStart;
        $Project->TeamSize = $request->TeamSize;
        $Project->update();

        return response()->json($Project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = Project::findOrFail($id);
        $Project->delete();
    }

    // public function projectSearch()
    // {
    //     die("success");
    // }

    function search($searchBy,$searchtext)
    {
        if($searchBy == 'TeamSize'){
            $result = Project::where('TeamSize', '=',  $searchtext )->get();
        }
        elseif($searchBy == 'ProjectName'){
            $result = Project::where('ProjectName', 'LIKE', '%'. $searchtext. '%')->get();
        }
        elseif($searchBy == 'ProjectID'){
            $result = Project::where('id', '=',  $searchtext )->get();
        }
        elseif($searchBy == 'DateOfStart'){
            $result = Project::where('DateOfStart', 'LIKE', '%'. $searchtext. '%')->get();
        }
        else{
            return response()->json(['Result' => 'No Data not found'], 404);
        }
            if(count($result)){
            return Response()->json($result);
            }
            else
            {
            return response()->json(['Result' => 'No Data not found'], 404);
        }
    }
}
