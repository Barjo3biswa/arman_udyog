<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemCompany;
use App\Models\ItemDimension;
use App\Models\ItemGSM;
use App\Models\ItemGsmType;
use App\Models\ProdectMaster;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class itemController extends Controller
{
    public function indexItem()
    {
        $item=Item::get();
        return view('admin.item.list-item',compact('item'));
    }

    public function addItem()
    {
        return view('admin.item.add-item');
    }

    public function company(Request $request)
    {
        $companys=ItemCompany::get();
        return view('admin.item.company-list',compact('companys'));
        // dd("ok");
    }

    public function saveCompany(Request $request)
    {
        try{
            ItemCompany::create([
                  'company_name' => $request->company_name,
                  'company_code' => $request->company_code,
            ]);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
        }

        return redirect()->route('admin.item.item-company')->with('success','Item Dimension Successfully Saved');
    }

    public function addCompany()
    {
        return view('admin.item.add-company');
    }

    public function product()
    {
        $products = ProdectMaster::get();
        return view('admin.item.product-list',compact('products'));
    }

    public function dimension()
    {
        $dimension=ItemDimension::get();
        return view('admin.item.dimension-list',compact('dimension'));
    }

    public function thickness()
    {
        $thickness=ItemGSM::get();
        return view('admin.item.thickness-list',compact('thickness'));
    }

    public function addDimension()
    {
        return view('admin.item.add-dimension');
    }

    public function saveDimension(Request $request)
    {
        DB::beginTransaction();
        try{
            $validate=ItemDimension::where('code',$request->code)->first();
            // dd($validate);
            if($validate && $validate->id!=$request->id){
                return redirect()->back()->withInput()->with('error','Dimensions Already exists');
            }
            ItemDimension::updateOrCreate(
                ['id' => $request->id??0],
                ['length'  =>	$request->length,
                 'breadth' =>	$request->breadth,
                 'code'    =>   $request->code,
                ]);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
        }
        return redirect()->route('admin.item.item-dimension')->with('success','Item Dimension Successfully Saved');
    }

    public function addThickness()
    {
        $gsm_types=ItemGsmType::get();
        return view('admin.item.add-thickness',compact('gsm_types'));
    }

    public function saveThickness(Request $request)
    {
        // dd($request->all());
        // $validated = $request->validate([
        //     'gsm' => 'required|unique:item_g_s_m_s|max:255',
        // ]);
        DB::beginTransaction();
        try{
            $gsm_name=ItemGsmType::where('id',$request->gsm_types)->first();
            ItemGSM::updateOrCreate(
                ['id'       => $request->id??0],
                ['gsm'      => $request->gsm,
                 'gsm_type_id' =>$request->gsm_types,
                 'gsm_name' => $request->gsm.$gsm_name->name,
                 'unit'     => "NA",
                ]);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
        }
        return redirect()->route('admin.item.item-thickness')->with('success','Item Dimension Successfully Saved');
    }
}
