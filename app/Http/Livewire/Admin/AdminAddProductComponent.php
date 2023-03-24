<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $imageName;

    public function generatingSlug()
    {
        $this->slug= Str::slug($this->name);
    }

    public function addProduct()
    {
        $this->validate([
            'name' => 'required' ,
            'slug' => 'required',
            'short_description'=>'required',
            'description'=>'required',
            'regular_price'=>'required',
            'sale_price'=>'required',
            'SKU'=>'required',
            'stock_status'=>'required',
            'featured'=>'required',
            'quantity'=>'required',
            'image'=>'required',
            'category_id'=>'required'
        ]);

        $product = new Product;
        $product->name= $this->name;
        $product->slug= $this->slug;
        $product->short_description= $this->short_description;
        $product->description= $this->description;
        $product->regular_price= $this->regular_price;
        $product->sale_price= $this->sale_price;
        $product->SKU= $this->SKU;
        $product->stock_status= $this->stock_status;
        $product->featured= $this->featured;
        $product->quantity= $this->quantity;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image= $imageName;
        $product->category_id= $this->category_id;
        $product->save();
        session()->flash('message','product has been added');
    }

    public function render()
    {
        $categories = Category::orderBy('id','ASC')->get();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories]);
    }
}
