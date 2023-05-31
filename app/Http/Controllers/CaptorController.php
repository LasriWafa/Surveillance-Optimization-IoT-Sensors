<?php

namespace App\Http\Controllers;

use App\Models\Captor;
use App\Models\mesure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\ICaptorRepository;

class CaptorController extends Controller
{

    public $captor;

    // connecting our captor with the repository using a contructor
    public function __construct(ICaptorRepository $captor)
    {

        $this->captor = $captor;
    }

    // display all captors available in database : GET
    public function index()
    {

        // To display all captors in database 
        // $captors = $this->captor->getAllCaptors();

        // To display only captors that belong to spesific user 
        $captors = Auth::user()->captors;
        return view('captors.index')->with('captors', $captors);
    }

    // Show the form for creating a new resource.
    public function create()
    {

        return view('captors.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {

        $request->validate([

            'image' => 'required',
            'name' => 'required',
            'type' => 'required',
            'IMEI' => 'required',
            'manufactor' => 'required',
            'user_id' => 'required',
        ]);

        $data = $request->all();

        // image upload
        // to recover the image choosen by user and store it in the images folder 
        if ($img = $request->file('image')) {

            $name = time() . "." . $img->getClientOriginalName();
            $img->move(public_path('images'), $name);
            $data['image'] = "$name";
        }

        $this->captor->createCaptor($data);

        return redirect('/captors');
    }


    // shows an individual resourse 
    public function show($id)
    {
        $captor = $this->captor->getSingleCaptor($id);
        $lastMesure = mesure::where('captor_id', $id)
            ->orderBy('created_at', 'desc')
            ->first();
    
        return view('captors.show', compact('captor', 'lastMesure'));
    }

    // edit a single resourse using it's id
    public function edit($id)
    {

        $captor = $this->captor->editCaptor($id);
        return view('captors.edit')->with('captor', $captor);
    }

    // update the edited resourse in database
    public function update($id, Request $request)
    {

        $request->validate([

            'image' => 'required',
            'name' => 'required',
            'IMEI' => 'required',
            'manufactor' => 'required',
            'type' => 'required',
        ]);

        $data = $request->all();

        if ($img = $request->file('image')) {

            $name = time() . "." . $img->getClientOriginalName();
            $img->move(public_path('images'), $name);
            $data['image'] = "$name";
        }

        $this->captor->updateCaptor($id, $data);

        return redirect('/captors');
    }

    public function deleteCaptors($id)
    {

        $this->captor->deleteCaptors($id);
        return redirect('/captors');
    }
}
