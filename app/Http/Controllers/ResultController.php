<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    /**
     * Display a listing of the results.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::all();  // Fetch all results
        return response()->json($results);
    }

    /**
     * Show the form for creating a new result.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created result in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idquiz' => 'required|integer',
            'name' => 'required|string|max:255',
            'result' => 'required|numeric',
        ]);

        $result = Result::create($validatedData);

        return response()->json(['message' => 'Result created successfully!', 'data' => $result], 201);
    }

    /**
     * Display the specified result.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        return response()->json($result);
    }

    /**
     * Show the form for editing the specified result.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified result in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        $validatedData = $request->validate([
            'idquiz' => 'sometimes|required|integer',
            'name' => 'sometimes|required|string|max:255',
            'result' => 'sometimes|required|numeric',
        ]);

        $result->update($validatedData);

        return response()->json(['message' => 'Result updated successfully!', 'data' => $result], 200);
    }

    /**
     * Remove the specified result from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        $result->delete();

        return response()->json(['message' => 'Result deleted successfully!'], 200);
    }
}
