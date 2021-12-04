<?php

namespace App\Http\Controllers;
// use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\Catagoriy;
use Illuminate\Http\Request;
// use Gloudemans\Shoppingcart\Facades\Cart;
// use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
// use Gloudema;

use function GuzzleHttp\Promise\all;

class Product_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd(Product::find(9)->oneto);
        $res=Product::paginate(3);
        // dd($res);
        return view("products" ,compact('res'));
    }
    public  function add_products()
    {
        $all_product=Product::all();
        $return=array();
        foreach($all_product as $product)
        {
            $im=explode("|",$product->image);
        $return[]=[
            'id'=>$product->id,
            "name"=>$product->name,
            "price"=>$product->price,
            "amount"=>$product->amount,
            "image"=>$im[0]


        ];

        }
        $c=Catagoriy::all();



        return view("add_product",compact('return','c'));

    }
    public function delete_product(Request $r){
        $id=$r->id;
        Product::where("id","=",$id)->delete();
        return redirect()->back()->with("success","product successfully deleted");
    }
    public function update_product(Request $r){


        $id=$r->id;
        $res=Product::find($id)->first();
         $name=$r->has("name")?$r->get("name"):" ";
         $price=$r->has("name")?$r->get("price"):" ";
         $amount=$r->has("name")?$r->get("amount"):" ";
         if(!isset($name) || $name==null){
            return redirect()->back()->with("error","please enter a product name");

         }
         if(!isset($amount) || $amount==null){
            return redirect()->back()->with("error","please enter a product amount");

         }
         if(!isset($name) || $price==null){
            return redirect()->back()->with("error","please enter a product price");

         }
         else{


if(($res->name==$name) && ($res->price==$price) && ($res->amount==$amount)){
    return redirect()->back()->with("error","nothing to upgradre");

}
else{
if($res->name==$name ){
    if($res->price==$price){
        Product::where("id","=",$id)->update([


            'amount'=> $amount,
            ]);

        return redirect()->back()->with("error","name and price can not be updated beacuse its same other thing is updated successfully");
    }
    if($res->amount==$amount){
        Product::where("id","=",$id)->update([


            'price'=> $price,
            ]);

        return redirect()->back()->with("error","name and quantity can not be updated beacuse its same other thing is updated successfully");
    }
    else{
        Product::where("id","=",$id)->update([

            'amount'=> $amount,
            'price'=> $price,
            ]);

        return redirect()->back()->with("error","name  can not be updated beacuse its same other thing is updated successfully");
    }

}
if($res->price==$price ){

    if($res->name==$name){
        Product::where("id","=",$id)->update([


            'amount'=> $amount,
            ]);

        return redirect()->back()->with("error","name and price can not be updated beacuse its same other thing is updated successfully");
    }
    if($res->amount==$amount){
        Product::where("id","=",$id)->update([


            'name'=> $name,
            ]);

        return redirect()->back()->with("error","price and quantity can not be updated beacuse its same other thing is updated successfully");
    }

    else{
        Product::where("id","=",$id)->update([


            'name'=> $name,
            'amount'=> $amount,
            ]);

        return redirect()->back()->with("error","price can not be updated beacuse its same other thing is updated successfully");
    }

}
if($res->amount==$amount ){
    if($res->name==$name){
        Product::where("id","=",$id)->update([


            'price'=> $price,
            ]);

        return redirect()->back()->with("error","name and amount can not be updated beacuse its same other thing is updated successfully");
    }
    if($res->price==$amount){
        Product::where("id","=",$id)->update([


            'name'=> $name,
            ]);

        return redirect()->back()->with("error","price and amount can not be updated beacuse its same other thing is updated successfully");
    }
    else{    Product::where("id","=",$id)->update([

        'name'=> $name,
        'price'=> $price,

        ]);

    return redirect()->back()->with("error","amount can not be updated beacuse its same other thing is updated successfully");}

}

else{
         Product::where("id","=",$id)->update([

         'name'=> $name,
         'price'=> $price,
         'amount'=> $amount,
         ]);

    return redirect()->back()->with("success","product successfully updateted");
        }
    }

         }
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function valid(Request $r){

     $qan=Product::find($r->id)->amount;
     if(isset($qan) && $qan!=null){
         if($qan< $r->qty){

           return json_encode([
             'success'=>true,
             'message'=>"invalid quantity and  quantity should be less than or equal to ".$qan


           ]);

        }
        else{
            return json_encode([
                'success'=>false

              ]);
        }
     }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $prod=new Product();
        $prod->name=$request->has('name')?$request->get('name'):" ";
        $prod->amount=$request->has('amount')?$request->get('amount'):" ";
        $prod->price=$request->has('price')?$request->get('price'):" ";
        $prod->is_available=1;
        $prod->cat_id=$request->get("cat");
        $prod->details=$request->get("des");


        if($request->hasFile("images")){

   $imagelocation=array();
            $img=$request->file("images");
            $i=0;

   foreach($img as $im){


    $extension=$im->getClientOriginalExtension();
    $image_name='product_'.time().++$i.".". $extension;
    $location='/images/upload/';
    $im->move(public_path().$location,$image_name);
    $imagelocation[]=$location.$image_name;
    $prod->image=implode('|', $imagelocation);

   }

   $prod->save();
   return redirect()->back()->with("success",'product added');
        }
        else{
            return redirect()->back()->with('error',"product is not save");
        }


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        $rlt=Product::where('cat_id','=',$product->cat_id)->where('id','!=',$product->id)->limit(3)->get();
        $image=explode('|',$product->image);
       return view("product_details",compact('product', 'image','rlt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function view_cart(){
     $cart=Cart::content();

    //  dd($cart);
     $total_price=Cart::subtotal();
     return view('cart',compact('cart','total_price'));
    }
    public function destroy(Product $product)
    {
        //
    }
    public function home()
    {
        $latest=Product::orderby("price",'desc')->limit(4)->get();
        $feat=Product::orderby("created_at",'desc')->limit(2)->get();

      return view('welcome',compact('latest','feat'));
    }





    public function add_cart(Request $request){
        $id= $request->has('p_id')? $request->get('p_id'): '';
        $name= $request->has('p_name')? $request->get('p_name'): '';
        $quantity= $request->has('amount')? $request->get('amount'): '';
        $size= $request->has('size')? $request->get('size'): '';
        $price= $request->has('price')? $request->get('price'): '';

        $images= Product::find($id)->image;
        $image= explode('|', $images)[0];

        $cart=Cart::content()->where("id","=","$id")->first();



      if(isset($cart) && $cart!=null){



        $quantity=((int)$quantity+(int)$cart->qty);
        $total=((int)$quantity*(int)$price);
        Cart::update( $cart->rowId,[

       'qty'=> $quantity,
       'options'=>[
        'size' =>$size,
        'total' =>$total,
        'image' =>$image,








]


        ]);
      }
        else{
            $total=((int)$quantity*(int)$price);
            Cart::add( $id,    $name,$quantity,$price, [
                'size' =>$size,
                'total' =>$total,
                'image' =>$image,








        ]);

        }

 return redirect("/products")->with("success","product successfully added");

}

public function remove_cart(Request $r){

    Cart::remove($r->rowid);
    return redirect()->back()->with("success","product remove succesfully");
}
}
