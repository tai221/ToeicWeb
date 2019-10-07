<?php
namespace App\Repositories\Eloquents;

use App\Test;

class TestRepository {

    public function getAllTest()
    {
        return Test::all();
    }

    public function getTest($id)
    {
        return Test::where('id', $id)->fisrt();
    }
    public function createTest($data)
    {
         Test::create($data->all());
    }

    public function updateTest($id, $data)
    {
        Test::updateOrCreate(
            ['id' => $id],
            [
                'accessCount' => $data["accessCount"],
                'title' => $data["title"],
                'audio' => $data["audio"]
            ]
        );
    }

    public function deleteTest($id)
    {
        Test::where('id', $id)->delete();
    }
}
