<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Seminar;
use Illuminate\Http\Request;

class SeminarController extends Controller
{

    public function render($request, Throwable $exception)
{
    if ($exception instanceof ModelNotFoundException) {
        return response()->json([
            'status' => 0,
            'message' => 'Resource not found'
        ], 404);
    }

    return parent::render($request, $exception);
}
    /**
     * Display a listing of the resource.
     */
   /* public function index()
    {
        //
        $seminars=Seminar::latest()->paginate(10);
        return[
            "status"=>1,
            "data"=>$seminars
        ];
    }*/

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seminars=Seminar::latest()->paginate(10);
        return[
            "status"=>1,
            "data"=>$seminars
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view('seminars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'seminar_name' => 'required|string',
            'seminar_cat' => 'nullable|string|max:50',
            'details' => 'nullable|json',
            'created_by' => 'nullable|integer',
            'updated_by' => 'nullable|integer',
        ]);

        $seminar = Seminar::create($validatedData);

        return response()->json([
            "status" => 1,
            "data" => $seminar,
            "message" => "Seminar created successfully"
        ], 201); // 201 Created status code
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seminar  $seminar
     * @return \Illuminate\Http\Response
     */
    public function show(Seminar $seminar)
    {
        \Log::info('Inside show method');
        \Log::info('Seminar: ' . print_r($seminar, true));
    
        if ($seminar) {
            return [
                "status" => 1,
                "data" => $seminar
            ];
        } else {
            return [
                "status" => 0,
                "message" => "Seminar not found"
            ];
        }
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seminar  $seminar
     * @return \Illuminate\Http\Response
     */
    public function edit(Seminar $seminar)
    {
       // return view('seminars.edit', compact('seminar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seminar  $seminar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seminar $seminar)
    {
        $validatedData = $request->validate([
            'seminar_name' => 'required|string',
            'seminar_cat' => 'nullable|string|max:50',
            'details' => 'nullable|json',
            'created_by' => 'nullable|integer',
            'updated_by' => 'nullable|integer',
        ]);

        $seminar->update($validatedData->all());
        return [
            "status" => 1,
            "data" => $blog,
            "msg" => "Blog updated successfully"
        ];
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seminar  $seminar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seminar $seminar)
    {
        $seminar->delete();

        return [
            "status" => 1,
            "data" => $seminar,
            "msg" => "Seminar deleted successfully"
        ];
        
    }
}
