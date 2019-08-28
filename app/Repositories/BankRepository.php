<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Storage;
use App\Models\Bank;
class BankRepository
{
     public function castData()
    {
        $data = [
            'id' => null,
            'bname' => null,
            'name' => null,
            'number' => null,
            'pic' => null
        ];
        return (object) $data;
    }

    public function getAll()
    {
        $banks = Bank::all();
        return $banks;
    }
    public function getById($id)
    {
        $bank = Bank::find($id);
        return $bank;
    }
   

   

     public function update($request, $id)
    {
        $bank = $this->getById($id);
        if (empty($bank)) {
            return false;
        }

        $bank->bname = $request->bname;
        $bank->name = $request->name;
        $bank->number = $request->number;
        $bank->pic = $request->file_name;
        $bfile_name = $request->bfile_name;
        $bank->save();
        if($bfile_name!=$bank->pic){
         Storage::delete($bfile_name);
        }
        return true;
    }
    public function store($request)
    {        
        $bank = new Bank;
        $bank->bname = $request->bname;
        $bank->name = $request->name;
        $bank->number = $request->number;
        $bank->pic = $request->file_name;
        $bank->save();
        return true;
    }

     public function getDatatables()
    {
        $query = Bank::select('id', 'bname', 'number', 'name','pic');
        return $query;
    }

    public function delete($id)
    {
        $bank = $this->getById($id);
        if (empty($bank)) {
            return false;
        }
        
        $bank->delete();
        Storage::delete($bank->pic);
        return true;
    }
}