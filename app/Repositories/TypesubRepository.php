<?php namespace App\Repositories;
use App\Models\Typesub;
// use App\Models\Part;
// use App\Models\Group;
// use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use DB;
class TypesubRepository
{
    public function castData()
    {
        $data = [
            'id' => null,
            'typesubnumber' => null,
            'typesubname' => null,
            'part_id'=> null,
             'group_id'=> null,
             'category_id'=> null,
             'type_id'=> null
        ];
        return (object) $data;
    }

    public function getAll()
    {
        $typesub = Typesub::all();
     
        return $typesub;
    }

    public function getById($id)
    {
        $typesub = Typesub::find($id);
    //    if(empty($id)){ $category = Categorysub::find($id);}
    //     elseif($id){
    //        $category=DB::table('part')
    // ->join('category', 'category.part_id', '=','part.id')
    //  ->join('group', 'group.id', '=', 'category.group_id')
    // ->join('type', 'type.category_id', '=', 'category.id')
    // ->where('type.id',1)
    // ->orderBy('part.id')
    // ->get();}
       
        return $typesub;
    }


    public function store($request)
    {        
        $typesub = new Typesub;
        $typesub->typesubnumber = $request->typesubnumber;
        $typesub->typesubname = $request->typesubname;
        $typesub->part_id = $request->part;
        $typesub->group_id = $request->group;
        $typesub->category_id = $request->category;
        $typesub->type_id = $request->type;
        $typesub->save();
        return true;
    }

    public function update($request, $id)
    {
        $typesub = $this->getById($id);
        if (empty($typesub)) {
            return false;
        }
         $typesub->typesubnumber = $request->typesubnumber;
        $typesub->typesubname = $request->typesubname;
        $typesub->part_id = $request->part;
        $typesub->group_id = $request->group;
        $typesub->category_id = $request->category;
        $typesub->type_id = $request->type;
       
        $typesub->save();
        return true;
    }

    public function getDatatables()
    {
        //$query = Categorysub::select('id', 'typenumber','typename','part_id','group_id','category_id');
    //     $query=Categorysub::select('type.*')
    // ->join('category', 'type.category_id', 'category.id')
    // ->join('group', 'type.group_id', 'group.id')
    // ->join('part', 'type.part_id', 'part.id')
    // ->orderBy('part.id');
    
            $query=DB::table('part')
          ->join('category', 'category.part_id', '=', 'part.id') 
          ->join('group', 'group.id', '=', 'category.group_id')
          ->join('type', 'type.category_id', '=', 'category.id')
          ->join('typesub', 'typesub.type_id', '=', 'type.id') 
      ->orderBy('category.categorynumber','asc')
      ->orderBy('type.typenumber','asc')
    ->get();
    // echo"<pre>";
    //     print_r($query);
        return $query;
    }

    public function delete($id)
    {
        $typesub = $this->getById($id);
        if (empty($typesub)) {
            return false;
        }

        $typesub->delete();
        return true;
    }

}
