<?php 

namespace App\Repository;

use App\Models\Captor;

class CaptorRepository implements ICaptorRepository {

    // get all the data in database
    public function getAllCaptors() {

        return Captor::all();
    }

    // insert data into database
    public function createCaptor(array $data) {

        Captor::insert([ 

            'image' => $data['image'],
            'type' => $data['type'],
            'name' => $data['name'],
            'manufactor' => $data['manufactor'],
            'IMEI' => $data['IMEI'],
            'user_id' => $data['user_id'],
        ]); 
        
    }

    // get a single data from database using id
    public function getSingleCaptor($id) {

        return Captor::find($id);
    }

    // editing a single data from database using id
    public function editCaptor($id) {

        return Captor::find($id);
    }

    // updating the single data that we edited using id in database 
    public function updateCaptor($id, array $data) {

        Captor::find($id)->update([ 

            'image' => $data['image'],
            'name' => $data['name'],
            'type' => $data['type'],
            'manufactor' => $data['manufactor'],
            'IMEI' => $data['IMEI'],
           
        ]); 

    }

    public function deleteCaptors($id) {

        return Captor::find($id)->delete();
    }

}

?>