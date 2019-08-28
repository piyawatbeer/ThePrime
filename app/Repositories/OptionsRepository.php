<?php namespace App\Repositories;
use App\Models\Options;
use App\Models\Optionstype;
use App\Models\Optionslist;
use Illuminate\Support\Facades\Hash;
use DB;
class OptionsRepository
{
    public function castData()
    {
        $data = [
            'options_id' => null,
            'oname' => null,
            'garuntee' => null,
            'gname1' => null,
            'gname2' => null,
            'gname3' => null,
            'comment' => null,
            'detail' => null,
            'service' => null,
            'profit' => null,
            'vat' => null,
            'fcost' => null,
            'fcustomer' => null,
            'fwage' => null,
            'work_id' => null

        ];
        return (object) $data;
    }

    public function getAll()
    {
        $options = Options::all();
        return $options;
    }

    public function getById($id)
    {
        $options= Options::where('options_id', $id);
        return $options;
    }


    public function store($request)
    {        
        $options = new Options;
        $options->work_id = $request->template;
        $options->oname = $request->oname;
        $options->garuntee = $request->garuntee;
        $options->gname1 = $request->gname1;
        $options->gname2 = $request->gname2;
        $options->gname3 = $request->gname3;
        $options->comment = $request->comment;
        $options->detail = $request->detail;
        $options->service = $request->service;
        $options->profit = $request->profit;
        $options->vat = $request->vat;
        $options->fcost = $request->fcost;
        $options->fcustomer = $request->fcustomer;
        $options->fwage = $request->fwage;
        $options->save();
        return true;
    }
    public function storetype($request)
    {        
        $options = new Optionstype;
        $options->options_id = $request->id;
        $options->otname = $request->otname;
        $options->save();
        return true;
    }
    public function storelistboq($request)
    {        
         $items = $request->get('boq');
         foreach($items as $item){
        $options = new Optionslist;
        $options->options_id = $request->id;
        $options->optionstype_id = $request->template;
        $options->boq_id = $item;
        $options->save();
         }
        return true;
    }

    public function update($request, $id)
    {
       
        DB::table('options')
          ->where('options_id',$id)
            ->update(['oname' => $request->oname,
        'garuntee' => $request->garuntee,
        'gname1' => $request->gname1,
        'gname2' => $request->gname2,
        'gname3' => $request->gname3,
        'comment' => $request->comment,
        'detail' => $request->detail,
        'service' => $request->service,
        'profit' => $request->profit,
        'vat' => $request->vat,
        'fcost' => $request->fcost,
        'fcustomer' => $request->fcustomer,
        'fwage' => $request->fwage,
        'work_id' => $request->template]);
       
     
        return true;
    }

    public function getDatatables()
    {
         $query=DB::table('options')
          ->join('work', 'work.id', '=', 'options.work_id') 
         
      ->orderBy('options.options_id','desc')
    
    ->get();
    
        return $query;
        // $query = Options::where('work_id', '1');
        // return $query;
    }

     public function getDatatables2()
    {
         $query=DB::table('optionstype')
        //   ->leftjoin('options', 'options.options_id', '=', 'optionstype.options_id') 
         
      ->orderBy('optionstype.optionstype_id','asc')
    
    ->get();
    
        return $query;
        // $query = Options::where('work_id', '1');
        // return $query;
    }

    public function delete($id)
    {
        $options = DB::table('options')->where('options_id','=',$id);
        if (empty($options)) {
            return false;
        }

        $options->delete();
        return true;
    }

}
