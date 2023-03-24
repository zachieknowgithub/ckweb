<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{

    public $product_id;
    use WithPagination;

    public function deleteProduct()
    {
        $category = Product::find($this->product_id);
        $category->delete();
        session()->flash('message','Product has been deleted');
    }

    public function render()
    {
        $products = Product::orderBy('id','ASC')->paginate(5); 
        return view('livewire.admin.admin-product-component',['products'=>$products]);
    }
}
