<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\ItemCompany;
use App\Models\ItemDimension;
use App\Models\ItemGSM;
use App\Models\ProdectMaster;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddItem extends Component
{
    public $mode = 'Insert';
    public $edit_id;
    public $count=1;
    public $form = false;
    public $products,$units,$dimensions,$gsms,$items,$companys;
    public $product,$unit,$dimension,$gsm,$item,$quantity,$price,$item_name,$company;
    public $item_code;
    public $filter_item_name, $filter_item_stock, $filter_item_unit;
    public $alert_msg,$alert_status=false,$alert_type;

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        $this->products   = ProdectMaster::get();
        $this->units      = Unit::get();
        $this->dimensions = ItemDimension::get();
        $this->gsms       = ItemGSM::get();
        $this->items      = Item::select('*');

        if($this->filter_item_name != null){
            $this->items = $this->items->where('item_name','LIKE','%'.$this->filter_item_name.'%');
        }if($this->filter_item_unit != null){
            $this->items = $this->items->where('unit_id',$this->filter_item_unit);
        }if($this->filter_item_stock != null){
            $this->items = $this->items->where('current_stock','LIKE','%'.$this->filter_item_stock.'%');
        }
        $this->items = $this->items->get();

        $this->companys   = ItemCompany::get();

        return view('livewire.add-item');
    }

    public function showAdditemForm()
    {
        if($this->form==true){
            $this->form=false;
        }else{
            $this->edit_id=0;
            $this->mode="Insert";
            $this->item_code=null;
            $this->item_name=null;
            $this->product=null;
            $this->dimension=null;
            $this->unit = null;
            $this->gsm=null;
            $this->company=null;
            $this->quantity=null;
            $this->price=null;
            $this->form=true;
        }
    }

    public function getItemCode()
    {
        $code    = ProdectMaster::where('id',$this->product)->first();
        $dimensn = ItemDimension::where('id',$this->dimension)->first();
        $gsm     = ItemGSM::where('id',$this->gsm)->first();
        $company_code = ItemCompany::where('id',$this->company)->first();
        try{
            $this->item_code=$this->item_name.'('.$code->product_code.'-'.$company_code->company_code.'-'.$dimensn->code.'-'.$gsm->gsm_name.')';
        }catch(\Exception $e){
            $this->item_code=null;
        }

    }

    public function save()
    {
        // dd($this->edit_id);
        DB::beginTransaction();
        try{
            DB::commit();
            $unit_name = Unit::where('id',$this->unit)->first();
            Item::updateOrCreate(
                ['id' => $this->edit_id],
                ['item_code'      => $this->item_code,
                'item_name'       => $this->item_name,
                'product_id'      => $this->product,
                'unit_id'         => $this->unit,
                'unit_name'       => $unit_name->unit,
                'dimension_id'    => $this->dimension,
                'thickess_id'     => $this->gsm,
                'company_id'      => $this->company,
                'opening_quantity'   => $this->quantity,
                'closing_quantity'=> $this->quantity,
                'current_stock'   => $this->quantity,
                'price'           => $this->price,

            ]);
            $this->items = Item::get();
            $this->form=false;
            $this->alert_msg="Successfully Inserted An Item";
            $this->alert_type="success";
            $this->alert_status=true;
        }catch(\Exception $e){
            // dd($e);
            DB::rollBack();
            $this->alert_msg="Oppss!! Somthing Went Wrong..";
            $this->alert_type="danger";
            $this->alert_status=true;
        }
    }

    public function deleteThisItem($id)
    {
        Item::where('id',$id)->delete();
        $this->alert_msg="Successfully Deleted An Item";
        $this->alert_type="danger";
        $this->alert_status=true;
    }

    public function editThisItem($id)
    {
        try{
            $editable= Item::where('id',$id)->first();
            $this->item_code=$editable->item_code;
            $this->item_name=$editable->item_name;
            $this->product=$editable->product_id;
            $this->dimension=$editable->dimension_id;
            $this->unit = $editable->unit_id;
            $this->gsm=$editable->thickess_id;
            $this->company=$editable->company_id;
            $this->quantity=$editable->opening_quantity;
            $this->price=$editable->price;
            $this->mode="Update";
            $this->form=true;
            $this->edit_id=$id;
        }catch(\Exception $e){
            $this->form=false;
        }
    }

    public function exportToExcel()
    {
        $excel    = Item::with('gsmdetails')->get();
    //  dd($excel);
        $fileName = "Itm_list".'.csv';
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0",
        );

        $columns = array(

        'Sl', 'Item Code', 'Item Name', 'Product Cat', 'Dimenssion(lXb)', 'GSM', 'Unit', 'Company Name', 'Opening Quantity', 'Closing Quantity',	'Price'
        );

        $callback = function () use ($excel, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);
        $count = 0;
            foreach ($excel as $key=>$task) {
            $row['SL']       = ++$key;
            $row['Item Code']       = $task->item_code;
            $row['Item Name']       = $task->item_name;
            $row['Product Cat']      = $task->product->product_name;
            $row['Dimenssion(lXb)']    = $task->dimension->code;
            $row['GSM']     = $task->gsmdetails->gsm_name;
            $row['Unit']       = $task->unit->unit;
            $row['Company Name']      = $task->company->company_name;
            $row['Opening Quantity'] = $task->opening_quantity;
            $row['Closing Quantity'] = $task->closing_quantity;
            $row['Price']            = $task->price;


            fputcsv($file, array(
                $row['SL'],
                $row['Item Code'],
                $row['Item Name'],
                $row['Product Cat'],
                $row['Dimenssion(lXb)'],
                $row['GSM'],
                $row['Unit'],
                $row['Company Name'],
                $row['Opening Quantity'],
                $row['Closing Quantity'],
                $row['Price'],
            ));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}
