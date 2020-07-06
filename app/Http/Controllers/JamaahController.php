<?php

namespace App\Http\Controllers;

use App\Jamaah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JamaahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jamaah = Jamaah::all();
        $data = [
            'message' => 'Data jamaah berhasil di tampilkan',
            'jamaah' => $jamaah
        ];

        return response()->json(['data' => $data], 200);
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
            'id_jamaah'=>'required', 
            'nama_jamaah' => 'required',
            'telpon_jamaah' => 'required',
            'gender' => 'required'
        ],[
            'id_jamaah.required' => 'Nama jamaah harus di isi',
            'nama_jamaah.required' => 'Nama jamaah harus di isi',
            'telpon_jamaah.required' => 'Telpon jamaah Harus di isi',
            'gender.required' => 'Gender Harus di isi'
        ]); 

        Jamaah::create([
            'id_jamaah'=> $request->id_jamaah,
            'nama_jamaah' => $request->nama_jamaah,
            'telpon_jamaah' => $request->telpon_jamaah,
            'gender'=> $request->gender
        ]);

        $data = [
            'message' => 'Data jamaah berhasil disimpan!'
        ];

        return response()->json(['data' => $data], 201);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     
        $jamaah = Jamaah::where('id_jamaah', $id)->first();
      
        $jamaah->update([
            'nama_jamaah' => $request->nama_jamaah,
            'telpon_jamaah' => $request->telpon_jamaah,
            'gender' => $request->gender
        ]);

        $data = [
            'message' => 'Data jamaah berhasil update!'
        ];

        return response()->json(['data' => $data], 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jamaah = Jamaah::where('id_jamaah',$id)->first();
        $jamaah->delete();

        $data = [
            'message' => 'Data jamaah berhasil dihapus!'
        ];

        return response()->json(['data' => $data], 201);
    }
}
