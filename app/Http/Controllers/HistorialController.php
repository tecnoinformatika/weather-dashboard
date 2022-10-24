<?php

namespace App\Http\Controllers;

use App\Models\historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historials = DB::table('historials')->orderby('created_at', 'DESC')->get();
        
        return view('historial', [
            'historials' => $historials]);
    }
    public function indexciudades()
    {
        $historials = DB::table('historials')->orderby('created_at', 'DESC')->get();
        
        return json_decode($historials);
    }
    public function cargardataciudad()
    {
        $historials = DB::table('historials')
                    ->select('city', DB::raw('count(*) as total'))
                    ->groupBy('city')
                    ->get();
        
        return json_decode($historials);
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
        
        try {
            
            DB::table('historials')->insert([
                'city' => $request->city,
                'country' => $request->country,
                'lat' => $request->lat,
                'long' => $request->long,
                'region' => $request->region,
                'timezone_id' => $request->timezone_id,
                'temperature' => $request->temperature,
                'text' => $request->text,
                'sunrise' => $request->sunrise,
                'sunset' => $request->sunset,
                'humidity' => $request->humidity,
                'pressure' => $request->pressure,
             ]);
            
             return '1';
        } catch (\Throwable $th) {
            return $request;
        }
         

         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function show(historial $historial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function edit(historial $historial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, historial $historial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function destroy(historial $historial)
    {
        //
    }
}
