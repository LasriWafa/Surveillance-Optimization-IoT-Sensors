<?php 

namespace App\Repository;

use App\Models\Captor;
use App\Models\User;

class AdminRepository implements IAdminRepository {

    public function adminGetAllCaptors() {
        
        return Captor::all();
    }
  
    public function adminDeleteCaptors($id) {

        return Captor::find($id)->delete();
    }

    public function adminGetAllUsers() {
        
        return User::all();
    }

    public function adminGetSingleUsers($id) {
        
        return User::find($id);
    }
}

?>