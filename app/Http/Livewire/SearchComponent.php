<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class SearchComponent extends Component
{
    use WithPagination;

    public $key;
    public $search_term;

    public function mount()
    {
        $this->fill(request()->only('key'));
        $this->search_term = '%'.$this->key. '%';
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added to cart');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $products = Product::where('name','like',$this->search_term)->paginate(12);


        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.search-component',['products'=>$products,'categories'=>$categories]);
    }
}
