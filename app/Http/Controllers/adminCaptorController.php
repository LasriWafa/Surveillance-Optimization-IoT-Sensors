<?php

namespace App\Http\Controllers;

use App\Models\Captor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repository\ICaptorRepository;

class adminCaptorController extends Controller
{

    public $captor;

    // connecting our captor with the repository using a contructor
    public function __construct(ICaptorRepository $captor) {
        
        $this->captor = $captor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $captors = $this->captor->getAllCaptors();
        return view('adminsCaptors.index')->with('captors', $captors);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminsCaptors.create');
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

            'image' => 'required',
            'name' => 'required',
            'IMEI' => 'required',
            'type' => 'required',
            'manufactor' => 'required',
            'user_id' => 'required',
        ]);

        $data = $request->all();

        if($img = $request->file('image')) {

            $name = time() . "." . $img->getClientOriginalName();
            $img->move(public_path('images'), $name);
            $data['image'] =  "$name";
        }

        $this->captor->createCaptor($data);

        return redirect()->route('adminsCaptors.index'); 

/*
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $filename);
            // Save the filename to the product record in the database
            $data['image'] = $filename;
        }
*/
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $captors = Captor::find($id);
        return view('adminsCaptors.show')->with('captors', $captors);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $captors = Captor::find($id);
        return view('adminsCaptors.edit')->with('captors', $captors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $captors)
    {
        $request->validate([
            'name' => 'required',
            'IMEI' => 'required',
            'manufactor' => 'required',
            'type' => 'required',
            'image' => 'required',
        ]);

        $record = Captor::findOrFail($captors);

        $record->name = $request->name;
        $record->type = $request->type;
        $record->IMEI = $request->IMEI;
        $record->manufactor = $request->manufactor;

        if($img = $request->file('image')) {

            $name = time() . "." . $img->getClientOriginalName();
            $img->move(public_path('images'), $name);
            $record['image'] = "$name";
        }

        $record->save();

        return redirect()->route('adminsCaptors.show', $captors);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $captors = Captor::find($id)->delete();
        return redirect('/adminsCaptors');
    }


    public function remove()
    {
        DB::table('captors')->delete();
        return redirect()->route('adminsCaptors.index');
    }


}
