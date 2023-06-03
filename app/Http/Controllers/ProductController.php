<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view ('products.products',[
            'heading'=> 'Product Catalog',
         'products' => Product::paginate(4)
    ]);   
    }

    public function index2(){
      return view ('products.products2',[
          'heading'=> 'Product Catalog',
       'products' => Product::paginate(4)
  ]);   
  }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $products = Product::where('name', 'LIKE', "%$search%")->paginate(10);

        return view('products.products', [
            'heading' => 'Search Results',
            'products' => $products
        ]);
    }
    public function show(Product $product){
  return view ('products.product',[
    'product'=> $product

  ]);
    }
    public function create(){
      return view ('products.create');
    }

    public function products2(){
      return view('products.products2');
  }
    
    public function store(Request $request){
        $formFields=$request->validate([
       'unit' => 'required',
       'unitPrice'=>'required|decimal:0,2',
       'category'=>'required',
       'name'=>  'required|unique:products',
        ]);

        //set the user_id 
        $formFields['user_id']=auth()->id(); // assign the logged users id to the user_id field

        if($request->hasFile('image_url')){
          $formFields['image_url'] = $request->file('image_url')->store('images', 'public');
      }

        Product::create($formFields);


        return redirect('/')->with('success','A New Product Has been Save');   
        
        }

        public function edit(Product $product){
          if($product->user_id != auth()->id()){
            abort(403, 'unauthorized action');
          }
          return view('products.edit', ['product'=>$product]); //compact ('product')
        }

        public function update(Product $product, Request $request){
          $formFields=$request->validate([
            'unit' => 'required',
            'unitPrice'=>'required|decimal:0,2',
            'category'=>'required',
            'name'=>  'required'
             ]);
             if($request->hasFile('image_url')){
              $formFields['image_url'] = $request->file('image_url')->store('images', 'public');
            }

             $product->update($formFields);
             return redirect('/')->with('success','Product updated successfully!');

        }

        public function destroy(Product $product){
          if($product->user_id != auth()->id()){
            abort(403, 'unauthorized action');
          }
          $product->delete();
          return redirect('/')-> with('success','product deleted');
        }

        public function manage(){
          return view('products.products2',[
            'heading'=> 'Manage Products',
         'products' => auth()->user()->products()->paginate(4)
    ]);

        }
        
}