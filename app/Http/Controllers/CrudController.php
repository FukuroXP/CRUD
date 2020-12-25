<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'nama' => 'required',
            'foto' => 'required',
        ]);

        $crud = new Crud;
        $crud->nama = $request->nama;

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $fileName = time().'.'.$file->getClientOriginalName();
            $ServicesPath = public_path('foto');
            $file->move($ServicesPath, $fileName);
            $crud->foto = $fileName;

        }

//        dd($crud);

        $crud->save();

        return redirect('/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(Crud $crud)
    {
        $cruds = DB::table('cruds')
            ->select('cruds.*')
            ->get();

        return view('show', compact('cruds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit(Crud $crud, $id)
    {
        $cruds = DB::table('cruds')
            ->select('cruds.*')
            ->where('cruds.id',$id)
            ->get();

        return view('update', compact('cruds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crud $crud, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $crud = Crud::where('id', $id)->first();
        $crud->nama = $request->nama;

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $fileName = time().'.'.$file->getClientOriginalName();
            $ServicesPath = public_path('foto');
            $file->move($ServicesPath, $fileName);
            $crud->foto = $fileName;

        }

//        dd($crud);

        $crud->save();

        return redirect('/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crud $crud, $id)
    {
        $crud = Crud::where('id',$id)->first();

        if ($crud != null) {
            $crud->delete();
            return redirect('/show')->with(['message'=> 'Successfully deleted!!']);
        }

        return redirect('/show')->with(['message'=> 'Wrong ID!!']);
    }
}
