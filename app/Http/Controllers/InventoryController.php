<?php

namespace App\Http\Controllers;
use App\Medicinecat;
use App\Phc;
use App\Medpurchase;
use App\Medicine;
use App\Sale;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
	public function indexMed()
	{
		return view('medicine-dashboard');
	}
	 public function insert(Request $request)
	 {
	

      $item = $request->name;
      $price = $request->price;
	  $qtty = $request->qtty;
      $item_value=$item [0];
      $price_value= $price[0];
      $qtty_value=$qtty[0];
      for($i = 1; $i < count($item); $i++)
      {
		$item_value=$item_value.','.$item[$i];
		$price_value=$price_value.','.$price[$i];
		$qtty_value=$qtty_value.','.$qtty[$i];
      }
	
	 $sale=new Sale();
	 $sale->item=$item_value;
	 $sale->price=$price_value;
	 $sale->qtty=$qtty_value;
	 $sale->user_id=Auth::user()->id;
	 $sale->phc_id=session('phc_id');
	
      if($sale->save()){
     // return response()->json([
      // 'success'  => 'Data Added successfully.'
	  
      //]);
	  
	  return redirect()->route('sales')->with('success','Data created successfully');
	  }
    // }
		 
	 }
	 public function postLoadMedicine(Request $request)
	 {
		 $this->validate($request,[
            'qtty'=>'required',
            'purchase'=>'required',
            'sales'=>'required',
            'expire'=>'required',
           ]);
		 $medpurchase=new Medpurchase();
		 $medpurchase->qtty=$request->qtty;
		 $medpurchase->purchase_price=$request->purchase;
		 $medpurchase->sales_price=$request->sales;
		 $medpurchase->expire=$request->expire;
		 $medpurchase->medicine_id=$request->med_id;
		 $medpurchase->user_id=Auth::user()->id;
		 if( $medpurchase->save())
		 {
			 return response()->json([
        'success'  => 'Data Saved successfully!!!',
       ]);
		 }
		
	 }
    public function postMedicineCat(Request $request)
	{
		$this->validate($request,[
            'category'=>'required',
            'desc'=>'required',
           ]);
		 
		$medicinecat=new Medicinecat();
		$medicinecat->name=$request->category;
		$medicinecat->description=$request->desc;
		$medicinecat->phc_id=session('phc_id');
		if($medicinecat->save())
		{
			return redirect()->route('dashboard')->with('success','Category created successfully');
		}
	}
	
	  public function viewMedCat()
	  {
		  $phc_id=session('phc_id');
		  
		  $cats=Medicinecat::Where('phc_id',$phc_id)->paginate(10);
		 
		  return view('view-medicine-category')->with(['cats'=>$cats,'i'=>1]);
	  }
	  public function  delete_medcat()
	  {
		  $url=url()->current();
		 $tmp = explode('=', $url);
		 $id = end($tmp);
		  
		  
		 Medicinecat::where('id', $id)->delete();
		
		 
		  return redirect()->route('viewMedCat')->with('success','Deleted successfully');	
	  }
	     public function editMedcat(Request $request)
		 {
			 $this->validate($request,[
            'name'=>'required',
            'desc'=>'required',
           ]);
		  $id=$request->id;
		  Medicinecat::where('id', $id)
			->update([
					'name'=>$request->name,
					'description'=>$request->desc,
					]);
		 }
		  public function addMed()
		  {
			   $phc_id=session('phc_id');
			  $cats=Medicinecat::Where('phc_id',$phc_id)->get();
			  return view('add-medicine')->with('cats',$cats);
		  }
		   public function postAddmed(Request $request)
		   {
		    $this->validate($request,[
            'name'=>'required',
            'purchase'=>'required',
            'sales'=>'required',
            'expire'=>'required',
           ]); 
		   $medicine=new Medicine();
		   $medicine->name=$request->name;
		   $medicine->medicinecat_id=$request->cat;
		   $medicine->purchase=$request->purchase;
		   $medicine->sales=$request->sales;
		   $medicine->generic=$request->generic;
		   $medicine->qtty=$request->qtty;
		   $medicine->effect=$request->effect;
		   $medicine->expire=$request->expire;
		   $medicine->phc_id=session('phc_id');
		   if($medicine->save())
		   {
			   return redirect()->route('indexMed');
		   }
		   
		   }
		   public function viewMed()
		   {
			   $phc_id=session('phc_id');
			   $medicines=Medicine::Where('phc_id',$phc_id)->paginate(10);
		
			  return view('medicine-store')->with(['medicines'=>$medicines,'i'=>1]);
		   }
		  public function delete_medicine()
		  {
		 $url=url()->current();
		 $tmp = explode('=', $url);
		 $id = end($tmp);
		 Medicine::where('id', $id)->delete();
		 
		  return redirect()->route('viewMed')->with('success','Deleted successfully');	
		  }
		  public function  sales()
		  {
			  $medicines=Medicine::all();
			  
			  return view('sales')->with(['medicines'=>$medicines,'id'=>1]);
		  }
		   public function  viewSales()
		   {
			   $sale=Sale::Where('phc_id',8)->get();
			  foreach($sale as $sales){
				//dd($sales);
			   $item_unsplitted=$sales->item;
			   $item_array[]=explode(',',$item_unsplitted);
			   $price_unsplitted=$sales->price;
			   $qtty_unsplitted=$sales->qtty;
			   $price_array[]=explode(',',$price_unsplitted);
			   $qtty_array[]=explode(',',$qtty_unsplitted);
			  
			  /* $sales_array=array(
								 $item_array,
								 $price_array,
								 $qtty_array,
								);*/
			 for($count = 0; $count < count($qtty_array); $count++)
			{
			$data = array(
			 'item' => $item_array[$count],
			 'price'  => $price_array[$count],
			 'qtty'  => $qtty_array[$count]
			);
			$sales_data[] = $data; 
			}
			}
			//dd($item_array);
			return view('view-sales')->with(['sales_data'=>$sales_data,
											'i'=>1,
											'sale'=>$sale,
											'item_array'=>$item_array,
											'price_array'=>$price_array,
											'qtty_array'=>$qtty_array,
										]);
			 
		   }
}
