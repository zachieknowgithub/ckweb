<?php

namespace App\Http\Livewire;

use Livewire\Component;
Use Cart;
Use App\Models\Product;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use WithPagination;
    
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added to cart');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $products = Product::paginate(3);
        return view('livewire.home-component',['products'=>$products]);
    }
}
