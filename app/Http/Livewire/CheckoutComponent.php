<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutComponent extends Component
{

    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $address;
    public $city;
    public $province;
    public $country;
    public $zipcode;

    public $paymentmode;
    public $thankyou;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'firstname' =>'required',
            'lastname' =>'required',
            'mobile' =>'required|numberic',
            'email' =>'required|email',
            'address' =>'required',
            'city' =>'required',
            'province' =>'required',
            'country' =>'required',
            'zipcode' =>'required',
            'paymentmode' => 'required'
            ]);
    }

    public function placeOrder()
    {
        $this->validate([
        'firstname' =>'required',
        'lastname' =>'required',
        'mobile' =>'required|numberic',
        'email' =>'required|email',
        'address' =>'required',
        'city' =>'required',
        'province' =>'required',
        'country' =>'required',
        'zipcode' =>'required',
        'paymentmode' => 'required'
        ]);

        $order = new Order();
        $order ->user_id = Auth::user()->id;
        $order ->subtotal =session()->get('checkout')['subtotal'];
        $order ->tax =session()->get('checkout')['tax'];
        $order ->total =session()->get('checkout')['total'];
        $order ->firstname = $this->firstname;
        $order ->lastname = $this->lastname;
        $order ->email = $this->email;
        $order ->mobile = $this->mobile;
        $order ->address = $this->address;
        $order ->city = $this->city;
        $order ->province = $this->province;
        $order ->country = $this->country;
        $order ->zipcode = $this->zipcode;
        $order ->status = 'ordered';
        $order->save();
    

        foreach(Cart::content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem -> product_id = $item->id;
            $orderItem -> order_id = $order->id;
            $orderItem -> price = $item->regular_price;
            $orderItem -> quantity = $item->quantity;
            $orderItem -> save();

        }

        if($this->paymentmode == 'cod')
        {
            $transaction = new Transaction();
            $transaction -> user_id = Auth::user()->id;
            $transaction -> order_id = $order -> id;
            $transaction -> mode = 'cod' ;
            $transaction -> status = 'pending';
            $transaction ->save();
        }

        $this->thankyou=1;
        Cart::destroy();
        session() -> forget('checkout');
    }

    public function verifyCheckOut()
    {
        if(Auth::check())
        {
            return redirect() -> route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->redirect('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect() -> route('product.cart');
        }
    }

    public function render()
    {
        $this->verifyCheckOut();
        return view('livewire.checkout-component');
    }
}
