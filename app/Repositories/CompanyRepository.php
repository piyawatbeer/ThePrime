<?php
namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{

    public function castData()
    {
        $data = [
            'id' => null,
            'comname' => null,
            'email' => null,
            'line' => null,
            'tel' => null,
            'facebook' => null,
            'mname' => null,
            'address' => null,
            'idcard' => null
        ];
        return (object) $data;
    }

    public function getAll()
    {
        $companys = Company::all();
        return $companys;
    }
    public function getById($id)
    {
        $company = Company::find($id);
        return $company;
    }
   

    public function store($request)
    {
       
    }

     public function update($request, $id)
    {
        $company = $this->getById($id);
        if (empty($company)) {
            return false;
        }

        $company->comname = $request->comname;
        $company->mname = $request->mname;
        $company->email = $request->email;
        $company->idcard = $request->idcard;
        $company->line = $request->line;
        $company->tel = $request->tel;
        $company->facebook = $request->facebook;
        $company->address = $request->address;
        $company->save();
        return true;
    }

}
