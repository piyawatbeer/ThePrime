<?php namespace App\Repositories;
use App\Models\Work;
use Illuminate\Support\Facades\Hash;

class WorkRepository
{
    public function castData()
    {
        $data = [
            'id' => null,
            'workname' => null
        ];
        return (object) $data;
    }

    public function getAll()
    {
        $work = Work::all();
        return $work;
    }

    public function getById($id)
    {
        $work = Work::find($id);
        return $work;
    }


    public function store($request)
    {        
        $work = new Work;
        $work->workname = $request->workname;
        $work->save();
        return true;
    }

    public function update($request, $id)
    {
        $work = $this->getById($id);
        if (empty($work)) {
            return false;
        }
        $work->workname = $request->workname;
       
        $work->save();
        return true;
    }

    public function getDatatables()
    {
        $query = Work::select('id', 'workname');
        return $query;
    }

    public function delete($id)
    {
        $work = $this->getById($id);
        if (empty($work)) {
            return false;
        }

        $work->delete();
        return true;
    }

}
