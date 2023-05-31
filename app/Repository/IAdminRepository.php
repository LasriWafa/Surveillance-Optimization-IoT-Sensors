<?php 

namespace App\Repository;


interface IAdminRepository {

    public function adminGetAllCaptors();

    public function adminDeleteCaptors($id);

    public function adminGetAllUsers();

    public function adminGetSingleUsers($id);
}


?>