<?php

namespace App\Http\Controllers;
use App\Publication;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::orderBy('id', 'DESC')->paginate(3);
        return view('Publication.index', compact('publications'));
    }


    public function create()
    {
        return view('publication.create');
    }

 
    public function store(Request $request)
    {
        $this->validate($request,[ 'auth'=>'required', 'title'=>'required', 'content'=>'required']);
        Publication::create($request->all());
        return redirect()->route('publication.index')->with('success','Registro creado satisfactoriamente');
    }


    public function show($id)
    {
        $publication=Publication::find($id);
        return  view('publication.show',compact('publication'));
    }

    public function edit($id)
    {
        $publication=Publication::find($id);
        return view('publication.edit',compact('publication'));
    }


    public function update(Request $request, $id)
    {
        Publication::find($id)->update($request->all());
        return redirect()->route('publication.index')->with('success','Registro actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Publication::find($id)->delete();
        return redirect()->route('publication.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
