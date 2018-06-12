<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

use App\Radication;
use App\Typeprocess;


class RadicationsController extends Controller
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
        $radications = Radication::orderBy('id', 'ASC')->paginate();

        $radications->each(function($radications){
            $radications->user;
            $radications->typeprocess;
        });
        //->paginate(10)

        return view('radications.index', ['radications' => $radications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typesprocess = Typeprocess::orderBy('name', 'ASC')->pluck('name', 'id')->prepend('Select one type...', '');

        return view('radications.create')
            ->with('typesprocess', $typesprocess);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Data File Save
        if($request->file('file'))
        {
            $file = $request->file('file');
            $path = public_path().'/storage/docs/';
            $filename = $request->number.'.'.$file->getClientOriginalExtension();
            //End Fiel save
            $file->move($path, $filename);
        }

        $radicacion = new Radication($request->all());
        $radicacion->filename = $filename;
        $radicacion->save();


        $typesprocess = Typeprocess::find($request->typeproc_id);
        $typesprocess->serial = $request->serial;
        $typesprocess->save();

        Flash::success("Successful registration");

        return redirect()->route('radications.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $radication = Radication::find($id);

        $radication->each(function($radication){
            $radication->user;
            $radication->typeprocess;
        });

        $pathfilename = '/storage/docs/'.$radication->filename;


        return view('radications.show', ['radication' => $radication, 'pathfilename' => $pathfilename]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $radication = Radication::find($id);
        $pathfilename = public_path().'/storage/docs/'.$radication->filename;
        $radication->delete();

        Flash::error("Registry successfully deleted: {$radication->number}");

        unlink($pathfilename);
        return redirect()->route('radications.index');
    }
}
