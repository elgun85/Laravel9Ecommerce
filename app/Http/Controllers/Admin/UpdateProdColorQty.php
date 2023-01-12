<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class UpdateProdColorQty extends Controller
{
    public function updateProdColorQty(Request $request,$id){
        $productColorData=Product::findOrFail($request->product_id)
            ->productColors()
            ->where('id',$id)
            ->first();
        $productColorData->update([
            'Color_quantity'=>$request->qty
        ]);
        return response()->json(['message'=>'Product Color Qty updated']);
    }
}
