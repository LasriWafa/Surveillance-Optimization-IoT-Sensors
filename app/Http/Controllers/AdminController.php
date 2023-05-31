<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Captor;
use Illuminate\Http\Request;
use App\Repository\IAdminRepository;

class AdminController extends Controller
{
    public $admin;
    public $user;

     public function __construct(IAdminRepository $admin, IAdminRepository $user) { 

        $this->admin = $admin;
        $this->user = $user;
    }

     public function adminGetAllCaptors() {

        // $usersCount = User::count();
        
        // $captoro = Captor::take(3)->get();

        $captors = $this->admin->adminGetAllCaptors();

        return view('admins.index')->with(['captors' => $captors,
                                        //    'captoro' => $captoro,
                                        //    'userCount' => $usersCount
        ]);
    }


     public function adminDeleteCaptors($id) {

         $this->admin->adminDeleteCaptors($id);
         return redirect('/admins/index');
     }


    public function adminGetAllUsers() {

        $captoro = Captor::take(3)->get();
        
        $userCount = User::count();
        $useros = User::take(3)->get();
        $users = $this->user->adminGetAllUsers();

        return view('admins.index')->with(['users' => $users,
                                           'userCount' => $userCount,
                                           'useros' => $useros,
                                           'captoro' => $captoro,
        ]);
    }

    public function adminGetSingleUsers($id) {
        
        $users = $this->user->adminGetSingleUsers($id);
        return view('admins.index')->with('users', $users);;
    }

}
