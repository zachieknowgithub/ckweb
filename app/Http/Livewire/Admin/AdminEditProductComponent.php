<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $product_id;
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
    public $newImage;

    public function generatingSlug()
    {
        $this->slug= Str::slug($this->name);
    }

    public function mount($product_id)
    {
        $product = Product::find($product_id);
        $this->product_id= $product->id;
        $this->name=$product->name;
        $this->slug= $product->slug;
        $this->short_description= $product->short_description;
        $this ->description= $product->description;
        $this->regular_price=  $product->regular_price;
        $this->sale_price= $product->sale_price;
        $this->SKU= $product->SKU;
        $this->stock_status=$product->stock_status;
        $this->featured= $product->featured;
        $this->quantity= $product->quantity;
        $this->image = $product->image;
        $this->category_id= $product->category_id;
    }

    public function editProduct()
    {
        $this->validate([
            'product_id'=>'required',
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

        $product = Product::find($this->product_id);
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
        if($this->newImage)
        {
            unlink('assets/img/products/'.$product->image);
            $imageName = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('products',$imageName);
            $product->image= $imageName;
        }

        $product->category_id= $this->category_id;
        $product->save();
        session()->flash('message','product has been added');
    }

    public function render()
    {
        $categories = Category::orderBy('id','ASC')->get();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories]);
    }
}
