<?php namespace App\Repositories;
use App\Models\Boq;
use App\Models\Boqchange;
// use App\Models\Part;
// use App\Models\Group;
// use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use DB;
class BoqchangeRepository
{
    public function castData()
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
        $boqchange = new Boqchange;
        $boqchange->mcost = $request->mcost;
        $boqchange->wcost = $request->wcost;
        $boqchange->type = $request->price;
        $boqchange->detail = $request->detail;
        $boqchange->save();
        //$boqcs = Boqchange::all()->latest();
    //     $boq = Boq::all();
    //     $boqcs->id;
    //     foreach($boq as $boqs){
    //     if(($boqcs->type)=="add"){
    //         $mcost=$boq->mcost*(100+$boqcs->mcost);
    //         $wcost=$boq->wcost*(100+$boqcs->wcost);
    //     }
    //     else{
    //         $mcost=$boq->mcost*(100-$boqcs->mcost);
    //         $wcost=$boq->wcost*(100-$boqcs->wcost);
    //         $boqu=Boq::where('id',$boqs->id)
    //     ->update(['mcost'=>$mcost],['wcost'=>$wcost]);
    //     $boqu->save();
    //     }
    // }
        // $boq->mcost;
        // $boq->wcost;
        return true;
    }



    public function update($request, $id)
    {
        $boq = $this->getById($id);
        if (empty($boq)) {
            return false;
        }
        // $boq->code = $request->code;
        // $boq->list = $request->list;
        //  $boq->unit = $request->unit;
        // $boq->mcost = $request->mcost;
        // $boq->wcost = $request->wcost;
        // $boq->type = $request->price;
        // $boq->comment = $request->comment;
        // $boq->part_id = $request->part;
        // $boq->group_id = $request->group;
        // $boq->category_id = $request->category;
        // $boq->type_id = $request->type;
        // $boq->typesub_id = $request->typesub;
       
        // $boq->save();
        return true;
    }

    public function getDatatables()
    {
        
    //          $query=DB::table('part')
    //       ->join('category', 'category.part_id', '=', 'part.id') 
    //       ->join('group', 'group.id', '=', 'category.group_id')
    //       ->join('type', 'type.category_id', '=', 'category.id')
    //       ->join('typesub', 'typesub.type_id', '=', 'type.id') 
    //        ->join('boq', 'boq.typesub_id', '=', 'typesub.id') 
    //   ->orderBy('category.categorynumber','asc')
    
    // ->get();
    
        return $query;
    }

    public function delete($id)
    {
        // $boq = $this->getById($id);
        // if (empty($boq)) {
        //     return false;
        // }

        // $boq->delete();
        // return true;
    }

}
