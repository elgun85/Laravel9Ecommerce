<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\card;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductView extends Component
{
    public $category,$product,$productColorSelectedQuantity,$quantityCount=1,$productColorId;

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
           //     session()->flash('message','Already added to wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already added to wishlist',
                    'type' => 'error',
                    'status' => 500
                ]);
            }else{
                Wishlist::create([
                    'user_id'       =>  Auth::user()->id,
                    'product_id'    =>  $productId
                ]);
                $this->emit('wishlistAddedUpdated');
            //    session()->flash('message','Wishlist added saccesfully');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Wishlist added saccesfully',
                    'type' => 'error',
                    'status' => 500
                ]);
            }

        }
        else
        {
            session()->flash('message','Please login to contunie');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to contunie',
                'type' => 'error',
                'status' => 500
            ]);
            return false;
        }
    }

    public function addToCard(int $productcardId)
    {

       if (Auth::check())
       {
           if ($this->product->where('id',$productcardId)->where('status',0)->exists())
           {
               //Check for color quantity and add to card
               if ($this->product->productColors()->count()>1)
               {
                   if ( $this->productColorSelectedQuantity !=NULL)
                   {
                       if (card::where('user_id',Auth::user()->id)
                           ->where('product_id',$productcardId)
                           ->where('product_color_id',$this->productColorId)
                           ->exists())
                       {
                         //  session()->flash('message','Product already added');
                           $this->dispatchBrowserEvent('message', [
                               'text' => 'Product already added',
                               'type' => 'error',
                               'status' => 500

                           ]);

                       }
                       else
                       {
                           $productColor=$this->product->productColors()->where('id',$this->productColorId)->first();
                           if ($productColor->Color_quantity>0)
                           {
                               if ($productColor->Color_quantity > $this->quantityCount)
                               {
                                   //add product card
                                   card::create([
                                       'user_id'           =>  Auth::user()->id,
                                       'product_id'        =>  $productcardId,
                                       'product_color_id'  =>  $this->productColorId,
                                       'quantity'          =>  $this->quantityCount
                                   ]);
                                   $this->emit('CartAddedUpdated');
                             //      session()->flash('message','Product added to Card');
                                   $this->dispatchBrowserEvent('message', [
                                       'text' => 'Product added to Card',
                                       'type' => 'success',
                                       'status' => 200
                                   ]);
                               }
                               else
                               {
                                 //  session()->flash('message','Only '. $productColor->Color_quantity  .' Quantity avialable');
                                   $this->dispatchBrowserEvent('message', [
                                       'text' => 'Only '. $productColor->Color_quantity  .' Quantity avialable',
                                       'type' => 'error',
                                       'status' => 500
                                   ]);
                               }
                           }
                           else
                           {
                         //      session()->flash('message','Out Off Stock');
                               $this->dispatchBrowserEvent('message', [
                                   'text' => 'Out Off Stock',
                                   'type' => 'error',
                                   'status' => 500
                               ]);
                           }
                       }

                   }
                   else
                   {
                  //     session()->flash('message','Select Your Product Color');
                       $this->dispatchBrowserEvent('message', [
                           'text' => 'Select Your Product Color',
                           'type' => 'error',
                           'status' => 500
                       ]);
                   }
               }






               else
               {
                   if (card::where('user_id',Auth::user()->id)
                       ->where('product_id',$productcardId)
                       ->exists())
                   {
                   //    session()->flash('message','Product already added');
                       $this->dispatchBrowserEvent('message', [
                           'text' => 'Product already added',
                           'type' => 'info',
                           'status' => 401
                       ]);
                   }
                   else
                   {
                       if ($this->product->quantity>0)
                       {
                           if ($this->product->quantity > $this->quantityCount)
                           {
                               //add product card

                              // dd($this->productColorId);
                               card::create([
                                   'user_id'           =>  Auth::user()->id,
                                   'product_id'        =>  $productcardId,
                                   'product_color_id'  =>  $this->productColorId,
                                   'quantity'          =>  $this->quantityCount
                               ]);
                               $this->emit('CartAddedUpdated');
                        //       session()->flash('message','Product added to Card');
                               $this->dispatchBrowserEvent('message', [
                                   'text' => 'Product added to Card',
                                   'type' => 'success',
                                   'status' => 200
                               ]);


                           }
                           else
                           {
                          //     session()->flash('message','Only'.$this->product->quantity .'Quantity avialable');
                               $this->dispatchBrowserEvent('message', [
                                   'text' => 'Only'.$this->product->quantity .'Quantity avialable',
                                   'type' => 'error',
                                   'status' => 500
                               ]);
                           }
                       }
                       else
                       {
                      //     session()->flash('message','Out off  stock');
                           $this->dispatchBrowserEvent('message', [
                               'text' => 'Out off  stock',
                               'type' => 'error',
                               'status' => 500
                           ]);
                       }
                   }
               }
           }
           else
           {
             //  session()->flash('message','Product does not exists');
               $this->dispatchBrowserEvent('message', [
                   'text' => 'Product does not exists',
                   'type' => 'error',
                   'status' => 500
               ]);
           }
       }
       else
       {
       //    session()->flash('message','Please login to add card');
           $this->dispatchBrowserEvent('message', [
               'text' => 'Please login to add card',
               'type' => 'error',
               'status' => 500
           ]);
       }
    }


    public function colorSelected($productColorId)
    {
       // dd($productColorId);
        $this->productColorId=$productColorId;
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
