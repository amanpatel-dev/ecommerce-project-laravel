<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1;


    //wishlist start 
    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {

                session()->flash('message', 'Product already Added to whislist');

                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product already Added to Whislist',
                    'type' => 'info',
                    'status' => 409
                ]);
                return false;
            } else {
                $wishlist = Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Added to Whislist Succesfully',
                    'type' => 'info',
                    'status' => 200
                ]);
                session()->flash('message', 'Product Added  to Whislist Succesfully');
                //this is an livewire event for updating the wishlist count instantaly
                $this->emit('wishlistAddedUpdated');
            }
        } else {
            session()->flash('message', 'Please Login to Continue');

            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login To Continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }


    public function colorSelected($productColorId)
    {
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity == 'outOfStock';
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }


    //mount is a livewire function 
    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
