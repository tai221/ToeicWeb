<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    protected $table = 'tests';

    protected $fillable = [
        'id', 'accessCount', 'title', 'audio'
    ];

    function users(){
        return $this -> belongsToMany('App\Account', 'map_user_tests', 'idBKT', 'idAcc')
            ->withPivot('ngayLam');
    }

    function readingParts(){
        return $this ->belongsToMany('App\ReadingPart', 'map_reading_tests', 'idBKT', 'idPartDoc');
    }

    function listeningParts(){
        return $this ->belongsToMany('App\ListeningPart', 'map_listening_tests', 'idBKT', 'idPartNghe');
    }

}
