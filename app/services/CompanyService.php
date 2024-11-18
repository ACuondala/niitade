<?php

namespace App\services;

use Exception;
use App\Models\Post;
use App\Models\User;
use App\Models\Company;
use App\Models\Category;
use App\Models\Products;
use App\Models\KindCompany;
use App\Models\KindProduct;
use App\traits\UploadFiles;
use App\Models\DeliveryMode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyService{

    use UploadFiles;
    public function createCompany(){

        $kind_companies=KindCompany::get();
        $categories=Category::get();
    }

    public function storeCompany($request){
        //dd($request->all());
        if(Auth::user()->company->count() < 2){
            DB::beginTransaction();

                if(Auth::user()->company->count()!=0){

                    $ccompany=Company::find(Auth::user()->id);
                    $ccompany->update(["status"=>"inactive"]);
                }

                $companyImage=$this->uploadFile($request,$request->images, "/nitade/companyLogo");
                $companyAlvara=$this->uploadFile($request,$request->alvara, '/nitade/company/Document');
                $companyNif=$this->uploadFile($request,$request->nif, '/nitade/company/Document');
                $companyDiario=$this->uploadFile($request,$request->diario, '/nitade/company/Document');
                $companyCertidao=$this->uploadFile($request,$request->certidao, '/nitade/company/Document');




                $company = Company::create([
                    "companyName" => $request->nome,
                    "companySlogna" => $request->slogan,
                    "address" => $request->endereco,
                    "companyImage" => $companyImage,
                    "companyAlvara" => $companyAlvara,
                    "companyDiario" => $companyDiario,
                    "companyNif" => $companyNif,
                    "companyCertidao" => $companyCertidao,
                    "user_id" => Auth::user()->id,
                    "neighbor_id" => $request->bairro_id,
                    "category_id" => $request->categoria_id,
                    "kind_company_id" => $request->tipo_empresa_id,
                ]);

                if(isset($request->other)){
                    //dd($request->other);
                    foreach($request->other as $files){
                        $file=$this->uploadFile($request,$files, '/nitade/company/OtherDocument');
                    }
                    $company->documentCompany->attach(['companyOtherDocument'=>$file]);
                }

            DB::commit();
                return redirect()->route('companies.index');

        }else{
          throw new Exception();
        }

    }

    public function changeCompany($request){
        $company=Company::where(['user_id'=>Auth::user()->id])->find($request->active);
        //dd($company);
        if($company){
            $company->update(["status"=>"inactive"]);
        }

        $compani=Company::where(['user_id'=>Auth::user()->id])->find($request->inactive);
        if($compani){
            $compani->update(["status"=>"active"]);
        }
        return response()->json([
            'status'=>200,
            'company'=>Company::get(),
            'Company'=>$company,
            'Compani'=>$compani,
        ]);
    }

    public function seeProfile($name){


        $companies=Company::where("companyName",$name)->first();

        $follow_count=User::whereIn('id', function($query) use($companies){
            $query->select('followers.user_id');
            $query->from('followers');
            $query->where('followers.company_id',$companies->id);

        })->count();

       $follow_buttom=User::whereIn('id', function($query) use($companies){
            $query->select('followers.user_id');
            $query->from('followers');
            $query->where('followers.company_id',$companies->id);

        })->where('users.id',Auth::user()->id)->first();


        return view('company.profile.profile',[
            'companies'=>$companies,
            'kindProducts'=>KindProduct::get(),
            'deliveryMode'=>DeliveryMode::get(),
            'posts'=>Post::where('company_id',$companies->id)->count(),
            'products'=>Products::with('company')->where('company_id',$companies->id)->get(),
            'follow_count'=>$follow_count,
            'follow_buttom'=>$follow_buttom,
        ]);
    }

    public function countCompanyViewProfile(Request $request){

        $company=Company::find($request->company);

        if($company->user_id == $request->profile){
            $company->visitor()->sync($request->profile);

        }
        return response()->json([
            'status'=>Response::HTTP_OK,
            'message'=>'view'
        ]);
    }

}
