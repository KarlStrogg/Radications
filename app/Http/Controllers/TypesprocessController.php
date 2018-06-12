<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typeprocess;
use Laracasts\Flash\Flash;
use App\Http\Requests\TypeprocessRequest;
use App\Http\Requests\TypeprocessEditRequest;

class TypesprocessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typesprocess = Typeprocess::orderBy('id', 'ASC')->paginate(); //->paginate(10)
        return view('typesprocess.index', ['typesprocess' => $typesprocess]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typesprocess.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeprocessRequest $request)
    {
        $typeprocess = new Typeprocess($request->all());
        $typeprocess->serial = 0;
        $typeprocess->save();

        Flash::success("Successful registration");

        return redirect()->route('typesprocess.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeprocess = Typeprocess::find($id);

        $arrResponse['serialnumber'] = $typeprocess->serial + 1;
        $arrResponse['serialtext'] = $typeprocess->acronym."-".str_pad($arrResponse['serialnumber'], 5, "0", STR_PAD_LEFT);

        $json = "[".json_encode($arrResponse)."]";

        print_r($json);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeprocess = Typeprocess::find($id);
        return view('typesprocess.edit', ['typeprocess' => $typeprocess]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeprocessEditRequest $request, $id)
    {
        $typeprocess = Typeprocess::find($id);
        $typeprocess->name = $request->name;

        $typeprocess->save();

        Flash::success("Register successfully edited");
        return redirect()->route('typesprocess.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeprocess = Typeprocess::find($id);
        $typeprocess->delete();

        Flash::error("Registry successfully deleted: {$typeprocess->name}");

        return redirect()->route('typesprocess.index');
    }
}
