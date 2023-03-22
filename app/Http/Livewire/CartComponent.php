<?php

namespace App\Http\Livewire;
 
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{

    public function increaseQuantity($rowId)
    {
        $product= Cart::get($rowId);
        $qty = $product->qty +  1;
        Cart::update($rowId,$qty);
    }

    public function decreaseQuantity($rowId)
    {
        $product= Cart::get($rowId);
        $qty = $product->qty -  1;
        Cart::update($rowId,$qty);
    }

    public function destroy($id)
    {
        Cart::remove($id);
        session()->flash('success_message','item has been removed');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }

    public function checkout()
    {
        if(Auth::check())
        {
            redirect()->route('shop.checkout');
        }
        else
        {
            redirect()->route('login');
        }
    }
}
