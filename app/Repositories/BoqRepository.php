<?php namespace App\Repositories;
use App\Models\Boq;
use App\Models\Boqchange;
// use App\Models\Part;
// use App\Models\Group;
// use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use DB;
class BoqRepository
{
    public function castData()
    {
        $data = [
            'id' => null,
            'code' => null,
            'list' => null,
            'unit' => null,
            'mcost' => null,
            'wcost' => null,
             'mcostp' => null,
            'wcostp' => null,
            'type' => null,
            'comment' => null,
            'part_id'=> null,
             'group_id'=> null,
             'category_id'=> null,
             'type_id'=> null,
             'typesub_id'=> null
        ];
        return (object) $data;
    }
    public function castData2()
    {
        $data = [
            'id' => null,
        
            'mcost' => null,
            'wcost' => null,
            'type' => null,
            'detail' => null
        ];
        return (object) $data;
    }

    public function getAll()
    {
        $boq = Boq::all();
     
        return $boq;
    }

    public function getById($id)
    {
        $boq = Boq::find($id);
  
       
        return $boq;
    }


    public function store($request)
    {        
        $boq = new Boq;
        $boq->code = $request->code;
        $boq->list = $request->list;
        $boq->unit = $request->unit;
        $boq->mcost = $request->mcost;
        $boq->wcost = $request->wcost;
        $boq->mcostp = $request->mcostp;
        $boq->wcostp = $request->wcostp;
        $boq->type = $request->price;
        $boq->comment = $request->comment;
        $boq->part_id = $request->part;
        $boq->group_id = $request->group;
        $boq->category_id = $request->category;
        $boq->type_id = $request->type;
        $boq->typesub_id = $request->typesub;
        $boq->save();
        return true;
    }
public function storeChange($request)
    {        
        $boqchange = new Boqchange;
        $boqchange->mcost = $request->mcost;
        $boqchange->wcost = $request->wcost;
        $boqchange->type = $request->price;
        $boqchange->detail = $request->detail;
        $boqchange->save();
        
        return true;
    }


    public function update($request, $id)
    {
        $boq = $this->getById($id);
        if (empty($boq)) {
            return false;
        }
        $boq->code = $request->code;
        $boq->list = $request->list;
         $boq->unit = $request->unit;
        $boq->mcost = $request->mcost;
        $boq->wcost = $request->wcost;
         $boq->mcostp = $request->mcostp;
        $boq->wcostp = $request->wcostp;
        $boq->type = $request->price;
        $boq->comment = $request->comment;
        $boq->part_id = $request->part;
        $boq->group_id = $request->group;
        $boq->category_id = $request->category;
        $boq->type_id = $request->type;
        $boq->typesub_id = $request->typesub;
       
        $boq->save();
        return true;
    }

    public function getDatatables()
    {
        
             $query=DB::table('part')
          ->join('category', 'category.part_id', '=', 'part.id') 
          ->join('group', 'group.id', '=', 'category.group_id')
          ->join('type', 'type.category_id', '=', 'category.id')
          ->join('typesub', 'typesub.type_id', '=', 'type.id') 
           ->join('boq', 'boq.typesub_id', '=', 'typesub.id') 
      ->orderBy('category.categorynumber','asc')
       ->orderBy('category.id','asc')
       ->orderBy('type.typenumber','asc')
         ->orderBy('type.id','asc')
    
    ->get();
    
        return $query;
    }
    public function historyDatatables()
    {
        $history = (!empty($_GET["history"])) ? ($_GET["history"]) : ('');
        if($history){
            $query=DB::table('part')
          ->join('category', 'category.part_id', '=', 'part.id') 
          ->join('group', 'group.id', '=', 'category.group_id')
          ->join('type', 'type.category_id', '=', 'category.id')
          ->join('typesub', 'typesub.type_id', '=', 'type.id') 
           ->join('boq', 'boq.typesub_id', '=', 'typesub.id')
           ->join('boqchangelist','boqchangelist.boq_id','=','boq.id') 
        //    ->join('boqchange','boqchange.id','=','boqchangelist.boqchange_id')
            ->where('boqchangelist.boqchange_id','=',$history)

      ->orderBy('category.categorynumber','asc')
       ->orderBy('type.typenumber','asc')
    
    ->get();
    
        return $query;
        }
        // else{ return false;}
    }

    public function delete($id)
    {
        $boq = $this->getById($id);
        if (empty($boq)) {
            return false;
        }

        $boq->delete();
        return true;
    }

}
