<?php 

namespace App\Repository;

// an interface doesn't have a body
// we'll implement all function in CaptorRepository file

interface ICaptorRepository {

    public function getAllCaptors();

    public function createCaptor(array $data);

    public function getSingleCaptor($id);

    public function editCaptor($id);

    public function updateCaptor($id, array $data);

    public function deleteCaptors($id);
}


?>