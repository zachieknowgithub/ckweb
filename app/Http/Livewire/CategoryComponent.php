<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;

class CategoryComponent extends Component
{
    use WithPagination;

    public $orderBy = "Default Sorting";
    public $slug;

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added to cart');
        return redirect()->route('shop.cart');
    }

    public function mount($slug)
    {
        $this->slug  =$slug;
    }

    public function render()
    {
        $category = Category::where('slug',$this->slug)->first();
        $category_id = $category->id;
        $category_name = $category ->name;
        $categories = Category::orderBy('name','ASC')->get();

        $products = Product::where('category_id',$category_id)->paginate(12);

        return view('livewire.category-component',['products'=>$products,'categories'=>$categories,'category_name'=>$category_name]);
    }
}