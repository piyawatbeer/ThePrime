<?php namespace App\Repositories;
use App\Models\Categorysub;
// use App\Models\Part;
// use App\Models\Group;
// use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use DB;
class CategorysubRepository
{
    public function castData()
    {
        $data = [
            'id' => null,
            'typenumber' => null,
            'typename' => null,
            'part_id'=> null,
             'group_id'=> null,
             'category_id'=> null
        ];
        return (object) $data;
    }

    public function getAll()
    {
        $category = Categorysub::all();
     
        return $category;
    }

    public function getById($id)
    {
        $category = Categorysub::find($id);
    //    if(empty($id)){ $category = Categorysub::find($id);}
    //     elseif($id){
    //        $category=DB::table('part')
    // ->join('category', 'category.part_id', '=','part.id')
    //  ->join('group', 'group.id', '=', 'category.group_id')
    // ->join('type', 'type.category_id', '=', 'category.id')
    // ->where('type.id',1)
    // ->orderBy('part.id')
    // ->get();}
       
        return $category;
    }


    public function store($request)
    {        
        $category = new Categorysub;
        $category->typenumber = $request->typenumber;
        $category->typename = $request->typename;
        $category->part_id = $request->part;
        $category->group_id = $request->group;
        $category->category_id = $request->category;
        $category->save();
        return true;
    }

    public function update($request, $id)
    {
        $category = $this->getById($id);
        if (empty($category)) {
            return false;
        }
        $category->typenumber = $request->typenumber;
        $category->typename = $request->typename;
        $category->part_id = $request->part;
        $category->group_id = $request->group;
        $category->category_id = $request->category;
       
        $category->save();
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
    ->join('category', 'category.part_id', '=','part.id')
     ->join('group', 'group.id', '=', 'category.group_id')
    ->join('type', 'type.category_id', '=', 'category.id')
    ->orderBy('category.categorynumber','asc')
    ->get();
    // echo"<pre>";
    //     print_r($query);
        return $query;
    }

    public function delete($id)
    {
        $category = $this->getById($id);
        if (empty($category)) {
            return false;
        }

        $category->delete();
        return true;
    }

}
