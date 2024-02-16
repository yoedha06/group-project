<?php

namespace App\Http\Controllers;

use App\Models\history;
use Illuminate\Http\Request;

class TestingApiController extends Controller
{
    public function index()
    {
        $maps = history::all();
        return response()->json($maps);
    }

    public function store(Request $request)
    {
        $history = new history();
        $history->latlng = $request->input('latlng');
        $history->bounds = $request->input('bounds');
        $history->accuracy = $request->input('accuracy');
        $history->altitude = $request->input('altitude');
        $history->altitude_acuracy = $request->input('altitude_accuracy');
        $history->heading = $request->input('heading');
        $history->speeds = $request->input('speeds');
        $history->save();
        return response()->json($history,201);
    }

    public function edit($id)
    {
        
        $history = History::find($id);
        
        if (!$history) {
            
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        
        return response()->json($history);

    }

    public function update(Request $request, $id)
    {
        $history = History::find($id);
        
        if (!$history) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        
        $validatedData = $request->validate([
            'latlng' => 'required', 
            'bounds' => 'required',
            'accuracy' => 'required',
            'altitude' => 'required',
            'altitude_acuracy' => 'required',
            'heading' => 'required',
            'speeds' => 'required'
        ]);
        
        $history->update($validatedData);

        $history->updated_at = now();
        
        $history->save();
        
        return response()->json([
            'message' => 'History updated successfully',
            'data' => $validatedData,
            'updated_at' => $history->updated_at
        ], 200);
    }

    public function delete($id)
    {
       
        $history = history::find($id);
        if (!$history) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        $history->delete();
        return response()->json([
            'message' => 'data terhapus'
        ],204);

    }

}
