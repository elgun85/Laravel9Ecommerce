<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductView extends Component
{
    public $category,$product,$productColorSelectedQuantity,$quantityCount=1;

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1)
        {
            $this->quantityCount--;
        }
    }
    public function icrementQuantity()
    {
        if ($this->quantityCount < 10)
        {
            $this->quantityCount++;
        }

    }

    public function adToWishlist($productId)
    {
        //dd($productId);
        if (Auth::check())
        {
            if (Wishlist::where('user_id',Auth::user()->id)->where('product_id',$productId)->exists())
            {
                session()->flash('message','Already added to wishlist');
            }else{
                Wishlist::create([
                    'user_id'       =>  Auth::user()->id,
                    'product_id'    =>  $productId
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message','Wishlist added saccesfully');
            }

        }
        else
        {
            session()->flash('message','Please login to contunie');
            return false;
        }
    }

    public function addToCard(int $productcardId)
    {
        dd($productcardId);
        /*        if (Auth::check())
                {
        dd('asdfdf');
                }
                else
                {
                    session()->flash('message','Please login to add card');
                }*/
    }


    public function colorSelected($productColorId)
    {
        $productColor=$this->product->productColors()->where('id',$productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->Color_quantity;
      if ($this->productColorSelectedQuantity == 0)
      {
          $this->productColorSelectedQuantity = 'outOfStock';
      }

    }





    public function mount($category,$product)
    {
        $this->category  =   $category;
        $this->product   =   $product;
    }



    public function render()
    {
        return view('livewire.frontend.product.product-view',[
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
