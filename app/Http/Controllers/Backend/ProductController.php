<?php

namespace App\Http\Controllers\Backend;

use to;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use RecursiveArrayIterator;
use Illuminate\Http\Request;
use RecursiveIteratorIterator;
use App\Models\ProductAttribute;
use App\Models\ProductVariantion;
use App\Models\BackendModels\Brand;
use App\Http\Controllers\Controller;
use App\Models\DefineProductVariant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\BackendModels\Product;
use App\Models\BackendModels\Variant;
use App\Models\FrontendModels\Review;
use App\Models\BackendModels\Shipping;
use App\Models\BackendModels\Attribute;
use Illuminate\Support\Facades\Session;
use App\Models\BackendModels\SubCategory;
use Illuminate\Support\Facades\Validator;
use App\Models\BackendModels\MainCategory;
use App\Models\ProductAdditionalAttribute;
use Symfony\Component\Console\Input\Input;
use App\Models\BackendModels\AttributeValue;
use App\Models\BackendModels\ParentCategory;
use Illuminate\Database\Eloquent\Collection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        session()->forget('var_product_id');
        session()->forget('collection');

        return view('admin_dashboard.product.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        session()->forget('collections');
        if (session()->has('var_product_id')) {
            return redirect()->route('edit.product', ['id' => session()->get('var_product_id')]);
        }

        $data = Product::get();
        $brand = Brand::where('status', 1)->get();
        $color = Variant::where('variant', '=', 'Colors')->where('status', '1')->get();
        // return "here";
        // return $color;
        $size = Variant::where('variant', '=', 'Size')->where('status', '1')->get();
        $last_data_object = collect($data)->last();
        $parent_categories = ParentCategory::where('status', 1)->get();
        $shipping_fees = Shipping::whereStatus(1)->get();

        $variants = Variant::where('status', 1)->get();
        if (session()->has('var_product_id')) {
            $product_attributes = Attribute::where('product_id', session()->get('var_product_id'))->with('variants')->get();
            // $product_attributes = Variant::with('get_attr')->get();
            $product = Product::where('id', session()->get('var_product_id'))->with('product_variants.product_attributes')->first();
        } else {
            $product_attributes = '';
        }



        return view('admin_dashboard.product.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        if ($request->product_type == 2) {
            $this->validate($request, [
                'description' => "required",
                'short_description' => "required",
                'tags' => "required|max:100",
                'sub_category' => "required",
                'main_category' => "required",
                'brand_name' => "required",
                'sku' => "required|unique:products,sku|max:100",
                'image' => "required|mimes:png,jpg,jpeg,webp|max:500000",
                'product_name' => "required|unique:products,product_name|max:100",
                'product_type' => "required",


            ]);
        }
        if ($request->product_type == 1) {
            $this->validate($request, [
                'description' => "required",
                'short_description' => "required",
                'shipping' => "required",
                'stock' => "required",
                'tags' => "required|max:100",
                'sub_category' => "required",
                'main_category' => "required",
                'brand_name' => "required",
                'sku' => "required|unique:products,sku|max:100",
                'image' => "required|mimes:png,jpg,jpeg,webp|max:500000",
                'product_name' => "required|unique:products,product_name|max:100",
                'product_type' => "required",
                'regular_price' => "required",
                'quantity' => "required",
            ]);
        }


     
        
        $discount_status = null;
        if($request->product_type == 1){
        
            
        $now = strtotime(now());
        $sale_start = Carbon::create(date('Y', strtotime($request->sale_start)) , date('m', strtotime($request->sale_start)), date('d', strtotime($request->sale_start)));
        $sale_end = Carbon::create(date('Y', strtotime($request->sale_end)) , date('m', strtotime($request->sale_end)), date('d', strtotime($request->sale_end)));


        
        if($sale_end->greaterThan($sale_start)){
            $discount_status = Carbon::create( date('Y', $now) , date('m', $now), date('d', $now) )->between($sale_start, $sale_end);
        }else{
            // $notification = array('message' => 'Date required!, At least date should be one day for discount, make sure date range enter correctly!', 'alert-type' => 'error');
            // return redirect()->back()->with($notification);
        }
        
            // discount forever
            if($request->sale_price != null && ($request->sale_start == '' && $request->sale_end == '')){
                $discount_status = true;
            }
        }


        $product = new Product();
        $product->product_type = $request->product_type;
        $product->parent_category_id = $request->parent_category_id;
        $product->main_category_id = $request->main_category;
        $product->sub_category_id = $request->sub_category;
        $product->product_name = $request->product_name;
        $product->slug = Str::slug($request->product_name, "-");
        $product->price = $request->regular_price;
        $product->sale_price = $request->sale_price;


        if($discount_status == true && $request->sale_price != ''){
            $product->discounted_price = ($request->regular_price - $request->sale_price );
            $product->discount = ($request->regular_price - $request->sale_price );
            $product->discount_percent = number_format((($request->regular_price - $request->sale_price) / $request->regular_price) * 100, 2);
            $product->sale_start = $request->sale_start ?? null;
            $product->sale_end = $request->sale_end ?? null;
            $product->discount_status = 1;
        }else{
           
            $product->sale_price = null;
            $product->discounted_price = null;
            $product->discount = null;
            $product->discount_percent = null;
            $product->discount_status = null;
            $product->sale_start = null;
            $product->sale_end = null;
        }

        // if($discount_status){
        //     $product->discounted_price = ($request->regular_price - $request->sale_price );
        //     $product->discount = ($request->regular_price - $request->sale_price );
        //     $product->discount_percent = number_format((($request->regular_price - $request->sale_price) / $request->regular_price) * 100, 2);
        // }
        
        $product->total_price = $request->regular_price;
        $product->sale_start = $request->sale_start;
        $product->sale_end = $request->sale_end;
        $product->sku = $request->sku;
        $product->brand_id = $request->brand_name;
        $product->quantity = $request->quantity;
        $product->stock = $request->stock;
        $product->shipping = $request->shipping;
        $product->tags = collect([$request->tags])->flatten();
        $product->status = 1;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        if ($request->image) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $filename);
            $product->image = $filename;
        }
        $product->save();


        if($request->product_type == 1){
            // simple product
            $notification = array('message' => 'Product Added Successfully! ', 'alert-type' => 'success');
            return redirect()->route('product.index')->with($notification);
        }else{
            // variable product
            Session::put('var_product_id',  $product->id);
            Session::put('type_id', $product->product_type);
            return redirect()->route('show.product_attributes');
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $products = Product::find($id);
        $parent_categories = ParentCategory::where('status', 1)->get();
        $main_categories = maincategory::where('status', 1)->get();
        $attributes = Attribute::where('product_id', $products->id)->get();
        // return $attributes;
        return view('admin_dashboard.product.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateproduct(Request $request)
    {
        
        $id = $request->edit_data;
        $edit_product = Product::where('id', $id)->first();
        $edit_product->parent_category_id = $request->parent_category_id;
        $edit_product->main_category_id = $request->main_category_id;
        $edit_product->sub_category_id = $request->sub_category_id;
        $edit_product->product_name = $request->product_name;
        $edit_product->slug = Str::slug($request->product_name, "-");
        $edit_product->discount = $request->discount;
        $edit_product->total_price = $request->total_price;
        $edit_product->price = $request->price;
        $edit_product->sku = $request->sku;
        $edit_product->brand_id = $request->brand_id;
        $edit_product->quantity = $request->quantity;
        $edit_product->status = 1;
        $edit_product->short_description = $request->short_description;
        $edit_product->description = $request->full_desc;
        $edit_product->save();

        $first_attribute_value = $request->attribute_value;
        $first_attribute = $request->attribute;


        if ($first_attribute_value && $first_attribute) {
            Attribute::where('product_id', $id)->delete();
        }
        $comma = [];
        $attribute_result = array_combine($first_attribute_value, $first_attribute);
        foreach ($attribute_result as $key => $value) {
            $attributes = new Attribute();
            $attributes->product_id = $id;
            $attributes->attribute = $value;
            $attributes->attribute_value = $key;
            $attributes->save();
            if (Str::contains($key, ',')) {
                array_push($comma, $key);
            }
        }

        $attribut = Attribute::whereIn('attribute_value', $comma)->where('product_id', $id)->get();

        $attribute_result = [];
        for ($i = 0; $i < count($attribut); $i++) {
            Attribute::where('id', $attribut[$i]->id)->delete();
            $key_value = explode(',', $attribut[$i]->attribute_value);
            for ($ia = 0; $ia < count($key_value); $ia++) {
                $attributes = new Attribute();
                $attributes->product_id = $id;
                $attributes->attribute = $attribut[$i]->attribute;
                $attributes->attribute_value = $key_value[$ia];
                $attributes->save();
            }
        }

        // return response()->json([
        //     'get_products_attributes' => $attribute_result,
        // ]);

        $attribute_result =  Attribute::where('product_id', $edit_product->id)->get();
        return response()->json([
            'get_products_attributes' => $attribute_result,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function maincategory(Request $request)
    {
        $maincategory = MainCategory::where('parent_category_id', $request->id)->get();
        if (count($maincategory) > 0) {
            return response()->json([
                'status' => 200,
                'maincategory' => $maincategory
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function subcategory(Request $request)
    {
       
        $subcategory = SubCategory::where('main_category_id', $request->id)->get();
        if (count($subcategory) > 0) {
            return response()->json([
                'status' => 200,
                'subcategory' => $subcategory
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function brand(Request $request)
    {
        
        $brand = Brand::where('parent_category_id', $request->id)->get();
        if (count($brand) > 0) {
            return response()->json([
                'status' => 200,
                'brand' => $brand
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function status(Request $request, $id)
    {
        $user_status = Product::find($id);
        if ($user_status->status == 0) {
            $user_status->status = 1;
        } else {
            $user_status->status = 0;
        }
        $user_status->save();
        $notification = array('message' => 'Product Status Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('product.index')->with($notification);
    }


    // /save stock
    public function savestock(Request $request, $id)
    {
        // dd($request->all());
        $id = $request->id;
        $qunatity = Attribute::where('id', $id)->first();
        $qunatity->stock = $request->stock;
        $qunatity->save();
        return response()->json([
            'status' => 200,
            'message' => 'stock saved'
        ]);
    }

    // save tags
    public function savetags(Request $request, $id)
    {
        // dd($request->all());
        $id = $request->id;
        $product_tags = Product::where('id', $id)->first();
        // $product_tags->tags = $request->tags_value;
        $product_tags->tags = collect([$request->tags_value])->flatten();
        // dd($product_tags);
        $product_tags->save();
        return response()->json([
            'status' => 200,
            'message' => 'Tags saved'
        ]);
        $get_products = Product::latest()->first();
        return response()->json([
            'status' => 201,
            'get_products' => $get_products
        ]);
    }

    //  get last inserted  product id for saving tags
    public function getproduct(Request $request)
    {
        $get_products = Product::latest()->first();
        $get_products->tags = $request->tags;
        $get_products->save();
        return response()->json([
            'status' => 200,
            'get_products' => $get_products
        ]);
    }

    public function multipleimage(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'image' => 'required',
        ]);

        // dd($request->old_multiple);
        $id = $request->multiple_image_id;

        $multiple = Product::where('id', $id)->first();
        if (empty($request->hasfile('image'))) {
            $multiple->multiple_image = $request->old_multiple;
        } else {
            $images = [];
            if ($request->hasfile('image')) {
                foreach ($request->file('image') as $file) {
                    $name = time() . rand(1, 100) . '.' . $file->extension();
                    $file->move(public_path('products'), $name);
                    $images[] = $name;
                }
            }
            $multiple->multiple_image = json_encode($images);
            $multiple->save();
            return response()->json([
                'status' => 200,
                'message' => 'Images saved successfully'
            ]);
        }
    }
    public function singleimage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'single_image' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        } else {
            $id = $request->main_image_id;
            //  dd($id);
            $single = Product::where('id', $id)->first();
            if ($request->single_image) {
                $filename = time() . '.' . $request->single_image->extension();
                $request->single_image->move(public_path('products'), $filename);
                $single->image = $filename;
            }
            $single->save();
            return response()->json([
                'status' => 200,
                'message' => 'Product Main Image saved successfully'
            ]);
        }
    }

    public function destroy(Request $request, $id)
    {
        $delete_product = Product::find($id);
        File::delete(public_path('products/' . $delete_product->multiple_image));
        File::delete(public_path('products/' . $delete_product->image));
        $delete_product->delete();
        $delete_product = Attribute::where('product_id', $delete_product->id)->delete();
        $notification = array('message' => 'Product Deleted Successfully ! ', 'alert-type' => 'success');
        return redirect()->route('product.index')->with($notification);
    }

    public function updatestock(Request $request, $id)
    {
        $id = $request->id;
        $qunatity = Attribute::where('id', $id)->first();
        $qunatity->stock = $request->stock;
        $qunatity->save();
        return response()->json([
            'status' => 200,
            'message' => 'stock saved'
        ]);
    }


    public function rating_filters(Request $request)
    {
        // return request()->all();
        $query = Review::where('status', 1)->where('product_id', $request->product_id);

        if ($request->rating) {
            $query->where('reviews', $request->rating);
        }


        // recent by today
        if ($request->filter == 'recent') {
            $query->whereDate('created_at', Carbon::today());
        }

        // high to low
        if ($request->filter == 'high-to-low') {
            $query->orderBy('reviews', 'desc');
        }


        // low to high
        if ($request->filter == 'low-to-high') {
            $query->orderBy('reviews', 'asc');
        }

        $ratings = $query->get();

        return view('frontend.partials.rating-filters', get_defined_vars());
    }

    public function close_rating_filters(Request $request)
    {

        return view('frontend.partials.rating-filters', get_defined_vars());
    }


    public function getattr(Request $request)
    {

        $color = Variant::where('status', '1')->get();
        // return $color;
        // $size = Variant::where('attribute_name','=','Size')->where('status','1')->get();
        return response()->json([
            'color' => $color,
            'status' => 200,

        ]);


        // return response()->json([
        //     'size' => $size,
        //     'status' => 202,
        // ]);
    }


    public function add_attribute(Request $request)
    {
        $variants = Variant::where('status', 1)->get();
        $id = session()->get('var_product_id') ?? session()->get('edit_product_id');
        if (session()->has('var_product_id') || session()->has('edit_product_id')) {
            // $product_attributes = DefineProductVariant::where('product_id',session()->get('var_product_id'))->with('variants')->get();
            // $product_attributes = Variant::with('get_attr')->get();
            $product_attributes = ProductAttribute::where('product_id', session()->get('var_product_id'))->with('child_attributes')->get();
            $product = Product::find(session()->get('var_product_id'));
        } else {
            $product_attributes = '';
            return redirect()->route('product.index');
        }

        return view('admin_dashboard.product.attribute', get_defined_vars());
    }


    public function edit_product_attr(Request $request, $id)
    {
        $id = $id ?? session()->get('var_product_id');
        $variants = Variant::where('status', 1)->get();

        if (session()->has('var_product_id') || !empty($id)) {
            $product = Product::where('id', $id)->with('product_variants.product_attributes')->first();
            $attributes_values = AttributeValue::where('status', 1)->get();

            $product_attributes_counts = Product::where('id', $id)->with('product_variants.product_attributes')->first();


            // product variations counter
            $product_variations_counter = array();
            if (count($product_attributes_counts->product_variants) > 0) {
                foreach ($product_attributes_counts->product_variants as $product_attributes_count) {

                    foreach ($product_attributes_count->product_attributes as $item) {
                        array_push($product_variations_counter, $item);
                    }
                }
            }

            // check
            $product_variations = Product::where('id', $id)->with('product_variations')->first();
        } else {
            $product_attributes = '';
        }


        return view('admin_dashboard.product.attribute-edit', get_defined_vars());
    }


    public function edit_attribute($id)
    {
        
        if (!empty($id)) {
            session()->put('var_product_id', $id);
        }


        $id = $id ?? session()->get('var_product_id');
        $products = Product::find($id);
        $parent_categories = ParentCategory::where('status', 1)->get();
        $main_categories = maincategory::where('status', 1)->get();
        $attributes = Attribute::where('product_id', $products->id)->get();
        // return $attributes;

        $sub_categories  = SubCategory::where('status', 1)->get();
        $main_categories = MainCategory::where('status', 1)->get();
        $brand = Brand::where('status', 1)->get();
        $shipping_fees = Shipping::whereStatus(1)->get();

        $product = Product::where('id', $id)->with('product_variants.product_attributes')->first();
        return view('admin_dashboard.product.product-edit', get_defined_vars());
    }


    public function product_variation(Request $request)
    {
        if (!session()->has('var_product_id')) {
            return redirect()->route('product.index')->with('create_product', 'Please save the attributes');
        }

        $product_variations = ProductVariantion::where('product_id', session()->get('var_product_id'))->get();
        $product_attributes = ProductAttribute::where('product_id', session()->get('var_product_id'))->with('product_additional_attributes')->get();
        $collections = session()->get('collections');
        // return $exist_in_database_collections = session()->get('exist_in_database_collections');
        $shipping_fees = Shipping::whereStatus(1)->get();




        $id = session()->get('var_product_id');
        $product = Product::where('id', $id)->with('product_variations', 'product_variants.product_attributes')->first();
        $shipping_fees = Shipping::whereStatus(1)->get();

        $product_variations = Product::where('id', $id)->with('product_variations')->first();
        $attribute_values_array = AttributeValue::all()->pluck('id')->toArray();
        // return $attribute_values_array;
        // dd(in_array(5,$attribute_values_array));

        
        // for variations update
        $variation_ids = [];
        if(count($product_variations->product_variations) > 0){
            foreach ($product_variations->product_variations as $item) {
                array_push($variation_ids, $item->id);
            }
        }
        
        return view('admin_dashboard.product.variation', get_defined_vars());
    }

    public function store_product_variation(Request $request)
    {
        // return $request->all();

        $product = Product::where('id', session()->get('var_product_id'))->with('product_variations', 'product_variants.product_attributes')->first();
        $product_attributes = ProductAttribute::where('product_id', session()->get('var_product_id'))->get();
        $arrays =  array_chunk($request->all()['attributes'], count($product_attributes));
        $arrays_values =  array_chunk($request->all()['attributes'], count($product_attributes));


        $product_variation_status = 'add';
        $variations_id = [];
        
        $count_variation_id = count($variations_id);
        
        $edit_variation = !empty($request->edit_variation) ? $request->edit_variation : [];
        
        if(!empty($request->variations_id)){
            $variations_id = count(json_decode($request->variations_id)) > 0 ? json_decode($request->variations_id) : [];
        }

        if(count($variations_id) > 0){
           $product_variation_status = 'edit';
            
           $attr_ids_with_comma_arr = [];
           for ($i=0; $i < count($arrays); $i++) { 
         
            array_push($attr_ids_with_comma_arr, implode(',',$arrays[$i]));
           }

        }

        
        // return $attr_ids_with_comma_arr;
        // return request()->all();
        $images = [];
        $images_arr = [];
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $key => $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('variations'), $name);
                $images[] = $name;
                $images_arr[$key] = $name;
            }
        }
        // dd($images_arr);
        $extract_images = ProductVariantion::where('product_id', session()->get('var_product_id'))->get();
        if($extract_images){
            foreach($extract_images as $image){
                $images[] = $image->image;
            }
        }
        

        // ProductVariantion::where('product_id', session()->get('var_product_id'))->get()->each->delete();
        
        for ($x = 0; $x < count($request->regular_price); $x++) {

            // return $arrays[$x];
            $attr_value = array();
            for ($j = 0; $j < count($arrays[$x]); $j++) {
                $attribute = AttributeValue::find($arrays[$x][$j]);
                array_push($attr_value, $attribute->attribute_value ?? '');
            }




            // discount code 
            $discount_status = null;
            $now = strtotime(now());
            $sale_start = Carbon::create(date('Y', strtotime($request->start_date[$x])) , date('m', strtotime($request->start_date[$x])), date('d', strtotime($request->start_date[$x])));
            $sale_end = Carbon::create(date('Y', strtotime($request->end_date[$x])) , date('m', strtotime($request->end_date[$x])), date('d', strtotime($request->end_date[$x])));
            
            // // discount set
            if($sale_end->greaterThan($sale_start)){
                $discount_status = 1;
            }else{
                $discount_status = null;
            }
            // discount forever
            if($request->sale_price[$x] != null && ($request->start_date[$x] == '' && $request->end_date[$x] == '')){
                $discount_status = 200;
            }
            // discount code .end


            
         
            

            $product_variation = '';

            if(count($variations_id) > 0){
                // variation update here
                // $product_variation = ProductVariantion::find($variations_id[$x]);
                if(!empty($variations_id[$x])){
                    // variation update here
                    $product_variation = ProductVariantion::find($variations_id[$x]);
    
                }else{
                    // variation create here
                    $product_variation = new ProductVariantion();
                }

            }else{
                // variation create here
                $product_variation = new ProductVariantion();
            }


            // return "outside";
            // return $variations_id;
            $product_variation->parent_category_id = $product->parent_category_id;
            $product_variation->main_category_id = $product->main_category_id;
            $product_variation->sub_category_id = $product->sub_category_id;
            $product_variation->product_id = session()->get('var_product_id');
            $product_variation->attribute_id = $request->regular_price[$x] ? implode(',', $arrays[$x]) : null;
            $product_variation->attribute = $request->regular_price[$x] ? implode(',', $attr_value) : null;
            
            if(!empty($images_arr[$x])){
                $product_variation->image = $images_arr[$x] ?? null;
            }

            // ----------- discount related work here -----------------------
            $product_variation->regular_price = $request->regular_price[$x] ?? null;
            $product_variation->sale_price = $request->sale_price[$x] ?? null;

            if($discount_status == 200 && $request->sale_price[$x] != ''){
                $product_variation->discount =  $request->regular_price[$x] - $request->sale_price[$x];
                $product_variation->discount_percent = number_format((($request->regular_price[$x] - $request->sale_price[$x]) / $request->regular_price[$x]) * 100,2);
                $product_variation->start_date = $request->start_date[$x] ?? null;
                $product_variation->end_date = $request->end_date[$x] ?? null;
                $product_variation->discount_status = 1;
            }else{
            
                $product_variation->sale_price = null;
                $product_variation->discount = null;
                $product_variation->discount_percent = null;
                $product_variation->discount_status = null;
                $product_variation->start_date = null;
                $product_variation->end_date = null;
            }
            // ----------- End. discount related work here -----------------------
            
            

            $product_variation->quantity = $request->quantity[$x] ?? null;
            $product_variation->sku = $request->sku[$x] ?? null;
            $product_variation->weight = $request->weight[$x] ?? null;
            $product_variation->length = $request->length[$x] ?? null;
            $product_variation->width = $request->width[$x] ?? null;
            $product_variation->height = $request->height[$x] ?? null;
            $product_variation->stock = $request->stock[$x] ?? null;
            $product_variation->shipping = $request->shipping[$x] ?? null;

            $product_variation->save();

        }


        session()->forget('collections');
        session()->forget('var_product_id');

        // return redirect()->route('edit.product_variation', session()->get('var_product_id'));
        return redirect()->route('product.index')->with('product_added', 'Product added successfully!');
    }


    public function edit_product_variation(Request $request, $id)
    {
        
        $id = session()->has('var_product_id') ? session()->get('var_product_id') : $id;
        $product = Product::where('id', $id)->with('product_variations', 'product_variants.product_attributes')->first();
        $shipping_fees = Shipping::whereStatus(1)->get();

        $product_variations = Product::where('id', $id)->with('product_variations')->first();
        $attribute_values_array = AttributeValue::all()->pluck('id')->toArray();
        // return $attribute_values_array;
        // dd(in_array(5,$attribute_values_array));

        
        // for variations update
        $variation_ids = [];
        if(count($product_variations->product_variations) > 0){
            foreach ($product_variations->product_variations as $item) {
                array_push($variation_ids, $item->id);
            }
        }
        

        return view('admin_dashboard.product.edit-variation', get_defined_vars());
    }

    public function delete_variation(Request $request, $id)
    {
        $delete = ProductVariantion::find($id);
        $delete->delete();
        $notification = array('message' => 'Variation deleted successfully!', 'alert-type' => 'success');
        return redirect()->route('edit.product_variation', ['id' => $delete->id])->with($notification);

    }
    public function remove_session(Request $request, $id)
    {
        
        $collection = session()->get('collections');
        unset($collection[$id]);
        
        session()->put('collections', $collection);
        $notification = array('message' => 'Variation deleted successfully!', 'alert-type' => 'error');
        return redirect()->route('add.product_variation')->with($notification);

    }





    public function product_variants(Request $request)
    {

        $variants = Variant::where('status', 1)->get();

        $attr = new ProductAttribute();
        $attr->product_id = $request->product_id;
        $attr->variant_id = $request->variant;
        if (!empty($request->variant)) {
            $variant = Variant::find($request->variant);
            $attr->variant = $request->variant == 1 ? null : $variant->variant;
        }
        $attr->save();

        session()->put('var_product_id', $request->product_id);

        if (session()->has('var_product_id')) {
            $product_attributes = ProductAttribute::where('product_id', session()->get('var_product_id'))->with('child_attributes')->get();
            // $product_attributes = Variant::with('get_attr')->get();
        } else {
            $product_attributes = '';
        }


        return response()->json([
            'status' => 200,
            'html' => view('admin_dashboard.partial.variant_accordion', get_defined_vars())->render(),
        ]);
    }

    public function remove_product_variants(Request $request)
    {

        //    return $request->variant_id.'---------'.$request->attribute_id;

        $var_product_id = $request->product_id;
        $attr = ProductAttribute::where('product_id', $var_product_id)->where('variant_id', $request->variant_id)->where('id', $request->attribute_id)->first();
        $attr->delete();


        $product_additional_attr = ProductAdditionalAttribute::where('product_attribute_id', $request->attribute_id)->get()->each->delete();
        // dd($product_additional_attr);
        // if(!empty($product_additional_attr)){
        //     foreach($product_additional_attr as $paa){
        //         $product_additional_attr = ProductAdditionalAttribute::find($paa->id)->delete();
        //     }
        // }

        if (session()->has('var_product_id')) {
            $product_attributes = ProductAttribute::where('product_id', $var_product_id)->with('child_attributes')->get();
            // $product_attributes = Variant::with('get_attr')->get();
        } else {
            $product_attributes = '';
        }


        $variants = Variant::where('status', 1)->get();
        return response()->json([
            'status' => 200,
            'html' => view('admin_dashboard.partial.variant_accordion', get_defined_vars())->render(),
        ]);
    }


    public function variant_attributes(Request $request)
    {


        $variants = Variant::where('status', 1)->get();
        if (session()->has('var_product_id')) {
            $product_attributes = Attribute::where('product_id', session()->get('var_product_id'))->with('variants')->get();
            // $product_attributes = Variant::with('get_attr')->get();
        } else {
            $product_attributes = '';
        }


        return view('admin_dashboard.partial.variant_accordion', get_defined_vars())->render();
    }

    public function define_product_variant(Request $request)
    {

        if($request->dpv_id == ''){
            $notification = array('message' => 'Sorry, Attribute not found! ', 'alert-type' => 'error');
            return redirect()->route('show.product_attributes')->with($notification);
        }else{
            // return $attribute->$request->dpv_id[0];
        }


        
        ProductAttribute::where('product_id', session()->get('var_product_id'))->get()->each->delete();


        $product_attributes = array();


        $variation = array();
        $ids_attribute = [];

        // $attribute_signle_array = array();
        $attributes_remaining_array = array('a');
        for ($x = 0; $x < count($request->dpv_id); $x++) {
            $data = array();


            $variant_id = 'variant_id' . $request->dpv_id[$x];
            $visible_product = 'visible_product' . $request->dpv_id[$x];
            $used_for_variation = 'used_for_variation' . $request->dpv_id[$x];
            $cstm_attribute_name = 'cstm_attribute_name' . $request->dpv_id[$x];
            $cstm_attribute_value = 'cstm_attribute_value' . $request->dpv_id[$x];
            $attribute = 'attribute' . $request->dpv_id[$x];
            $cstm_attribute_value = 'cstm_attribute_value' . $request->dpv_id[$x];


            $data['product_id'] = session()->get('var_product_id');

            if (!empty($request->$attribute)) {
                array_push($attributes_remaining_array, $request->$attribute);
            }

            
            if ($request->$variant_id) {
                $data['variant_id'] = $request->$variant_id;
                $variant = Variant::find($request->$variant_id);

                if ($request->$cstm_attribute_name) {
                    $data['variant'] = $request->$cstm_attribute_name;
                } else {
                    $data['variant'] = $variant->variant;
                }
            } else {
                $data['variant_id'] = null;
                $data['variant'] = null;
            }

            if ($request->$visible_product) {
                $data['visible_product'] = $request->$visible_product;
            } else {
                $data['visible_product'] = null;
            }

            if ($request->$used_for_variation) {
                $data['used_for_variation'] = $request->$used_for_variation;
            } else {
                $data['used_for_variation'] = null;
            }







            $product_attributes = ProductAttribute::create($data);

            array_push($ids_attribute, $product_attributes->id);
            if (!empty($request->$attribute)) {
                array_push($variation, count($request->$attribute));
            }
            // dd($request->$attribute);


            if ($product_attributes->used_for_variation != null) {
                if (!empty($request->$attribute)) {
                    for ($j = 0; $j < count($request->$attribute); $j++) {


                        $attribute_value = AttributeValue::find($request->$attribute[$j]);

                        $product_add_attr = new ProductAdditionalAttribute();
                        $product_add_attr->product_attribute_id = $product_attributes->id;
                        $product_add_attr->attribute_id = $attribute_value->id;
                        $product_add_attr->attribute = $attribute_value->attribute_value;
                        $product_add_attr->save();
                    }
                }
            }



            if ($product_attributes->used_for_variation != null) {
                if (!empty($request->$cstm_attribute_value)) {

                    $cstm_attr_value = explode("|", $request->$cstm_attribute_value);

                    $cstm_values = array();
                    for ($i = 0; $i < count($cstm_attr_value); $i++) {
                        $attribute_value = new AttributeValue();
                        $attribute_value->variant_id = 1;
                        $attribute_value->attribute_value = $cstm_attr_value[$i];
                        $attribute_value->slug = Str::slug($cstm_attr_value[$i],'-');
                        $attribute_value->status = 1;
                        $attribute_value->save();

                        // $product_add_attr = new ProductAdditionalAttribute();
                        // $product_add_attr->product_attribute_id = $product_attributes->id;
                        // $product_add_attr->attribute_id = $product_attributes->id;
                        // $product_add_attr->attribute = $cstm_attr_value[$i];
                        // $product_add_attr->save();

                        $product_add_attr = new ProductAdditionalAttribute();
                        $product_add_attr->product_attribute_id = $product_attributes->id;
                        $product_add_attr->attribute_id = $attribute_value->id;
                        $product_add_attr->attribute = $attribute_value->attribute_value;
                        $product_add_attr->save();


                        array_push($cstm_values, $cstm_attr_value[$i]);
                    }
                    array_push($attributes_remaining_array, $cstm_values);
                }
            }
            

            // array_push($product_attributes, $data);
        }


        $attr = json_encode($attributes_remaining_array);

        foreach ($attributes_remaining_array as $key => $val) {

            if ($val == 'a') {
                unset($attributes_remaining_array[$key]);
                continue;
            } else {
            }
        }


        //  return $attributes_remaining_array; 


        function array_filter_recursive($array, $callback = null)
        {
            foreach ($array as $key => &$value) {
                if (is_array($value)) {
                    $value = array_filter_recursive($value, $callback);
                } else {
                    if (!is_null($callback)) {
                        if (!$callback($value)) {
                            unset($array[$key]);
                        }
                    } else {
                        if (!(bool) $value) {
                            unset($array[$key]);
                        }
                    }
                }
            }
            unset($value);

            return $array;
        }

        $attributes_remaining_array = array_filter_recursive($attributes_remaining_array);

        $attributes_remaining_array = array_values($attributes_remaining_array);

        //  return $attributes_remaining_array;

        //   $attributes_remaining_array;
        //   $options = [];

        //   foreach ($attributes_remaining_array as $key => $option) {
        //     array_push($options, $attributes_remaining_array[$key]);
        //   }
        //   array_push($options,session::get('attribute_signle_array'));


        $start = array_shift($attributes_remaining_array);
        //  return $start;
        //  return $attributes_remaining_array;


        if (count($attributes_remaining_array) > 0) {
            //  return $start;
            //  return $attributes_remaining_array;
            $collections =  collect($start)->crossJoin(...$attributes_remaining_array);
            session()->put('collections', $collections);
            $collections = session()->get('collections');
        } else {
            $collections =  $start;
            session()->put('collections', $collections);
            $collections = session()->get('collections');
        }

        // return $collections;

        return redirect()->route('add.product_variation');
    }


    // dileep work here and last day mine
    public function define_product_variant_edit(Request $request, $id)
    {
        // return request()->all();
        // return $id;

        $attr_attr_arr = [];
        if(count($request->dpv_id) > 0){
            for ($x = 0; $x < count($request->dpv_id); $x++) {
                $attribute = 'attribute'.$request->dpv_id[$x];
                array_push($attr_attr_arr, $request->$attribute);
            }
        }


        $attr_attr_arr = array_values($attr_attr_arr);

        $start = array_shift($attr_attr_arr);
        $product_varia = ProductVariantion::where('product_id', $id)->get()->pluck('attribute_id')->toArray();

        if (count($attr_attr_arr) > 0) {
            //  return $start;
            //  return $attr_attr_arr;
            $collections = collect($start)->crossJoin(...$attr_attr_arr);
            // dd($collections);
            $arrayImplode = array('a');
            foreach ($collections as $key => $keysImplode) {
                array_push($arrayImplode, $keysImplode);
            }
            foreach ($arrayImplode as $key => $val) {

                if ($val == 'a') {
                    unset($arrayImplode[$key]);
                    continue;
                } else {

                }
            }
            // foreach($arrayImplode)
            //  str_replace(":","",json_encode($arrayImplode));

            $arrayImplode_exist = [];
            foreach ($arrayImplode as $key => $val) {
                $OriginalString = $val;
                // echo  implode(',',$val)."<br>";
                array_push($arrayImplode_exist,implode(',',$val));
            }
            
            ProductVariantion::where('product_id', $id)->get()->pluck('attribute_id')->toArray();
            // dd($arrayImplode_exist,$product_varia,array_diff($arrayImplode_exist,$product_varia));
            // array_diff($arrayImplode_exist,$product_varia)

            

            $newDiffAttr = [];
            $newDiffAttrCount = count(array_diff($arrayImplode_exist,$product_varia)) ?? 0;
            $diff_old_arr = array_values(array_diff($arrayImplode_exist,$product_varia));
            
            if($newDiffAttrCount == 0){
                $notification = array('message' => 'Already variation exists, for change it. Add or remove new attributes ! ', 'alert-type' => 'warning');
                return redirect()->route('edit.product_attributes', ['id' => $id])->with($notification);
            }
            
        } 
        // else {
        //     $collections = $start;
        //     session()->put('collections', $collections);
        //     $collections = session()->get('collections');
        // }

        // return $attr_attr_arr;
        

        if ($request->dpv_id[0]) {



            $variant_id = 'variant_id' . $request->dpv_id[0];
            $visible_product = 'visible_product' . $request->dpv_id[0];
            $used_for_variation = 'used_for_variation' . $request->dpv_id[0];
            $cstm_attribute_name = 'cstm_attribute_name' . $request->dpv_id[0];
            $cstm_attribute_value = 'cstm_attribute_value' . $request->dpv_id[0];
            $attribute = 'attribute' . $request->dpv_id[0];



            // validation for al least one attribute requirements validated
            // if($request->$cstm_attribute_name == null){
            //     return redirect()->back()->withErrors(['define_attr_error' => 'Attribute name is required', 'product_id' => session()->put('edit_product_id', $id)]);
            // }
            // if(empty($request->$cstm_attribute_value)){
            //     return redirect()->back()->withErrors(['define_attr_error' => 'Custom attribute value(s) required', 'product_id' => session()->put('edit_product_id', $id)]);
            // }
            // if(empty($request->$visible_product)){
            //     return redirect()->back()->withErrors(['define_attr_error' => 'Product visible should be checked', 'product_id' => session()->put('edit_product_id', $id)]);
            // }



        }

        // return "here";



        // ProductAttribute::where('product_id', session()->get('var_product_id'))->get()->each->delete();

        $id = session()->has('var_product_id') ? session()->get('var_product_id') : $id;
        //  delete and update new
        if (session()->has('var_product_id')) {
            $p_attr = ProductAttribute::where('product_id', $id)->get();
            if (!empty($p_attr)) {
                $ids = $p_attr->pluck('id')->toArray();
                if (!empty($ids)) {
                    for ($x = 0; $x < count($ids); $x++) {
                        ProductAdditionalAttribute::where('product_attribute_id', $ids[$x])->get()->each->delete();
                    }
                }
                ProductAttribute::whereIn('id', $ids)->delete();
            }
        }

        //  return "outside";


        $product_attributes = array();


        $variation = array();
        $ids_attribute = [];

        // $attribute_signle_array = array();
        $attributes_remaining_array = array('a');

        for ($x = 0; $x < count($request->dpv_id); $x++) {


            $data = array();

            $dpv_id = $request->dpv_id[$x];
            $variant_id = 'variant_id' . $request->dpv_id[$x];
            $visible_product = 'visible_product' . $request->dpv_id[$x];
            $used_for_variation = 'used_for_variation' . $request->dpv_id[$x];
            $cstm_attribute_ids = 'cstm_attribute_ids' . $request->dpv_id[$x];
            $cstm_attribute_name = 'cstm_attribute_name' . $request->dpv_id[$x];
            $cstm_attribute_value = 'cstm_attribute_value' . $request->dpv_id[$x];
            $attribute = 'attribute' . $request->dpv_id[$x];
            //  $cstm_attribute_value = 'cstm_attribute_value'.$request->dp_vid[$x];

            $data['product_id'] = $id;

            // return $request->$attribute;
            // if($x == 0){
            //     array_push($attribute_signle_array, $request->$attribute);
            //     session::put('attribute_signle_array', $request->$attribute);

            // }else{

            if (!empty($request->$attribute)) {
                array_push($attributes_remaining_array, $request->$attribute);
            }

            // array_push($attributes_remaining_array, $dpv_id);

            // }

            // array_push($attributes_array, $attribute[$x]);


            if ($request->$variant_id) {
                $data['variant_id'] = $request->$variant_id;
                $variant = Variant::find($request->$variant_id);

                if ($request->$cstm_attribute_name) {
                    $data['variant'] = $request->$cstm_attribute_name;
                } else {
                    $data['variant'] = $variant->variant;
                }
            } else {
                $data['variant_id'] = null;
                $data['variant'] = null;
            }

            if ($request->$visible_product) {
                $data['visible_product'] = $request->$visible_product;

                // delete custom attribute and then create -> to see create custom attribute go down
                if ($request->$cstm_attribute_ids) {
                    $attr_ids = $request->$cstm_attribute_ids ? json_decode($request->$cstm_attribute_ids) : [];
                    if (count($attr_ids) > 0) {
                        AttributeValue::whereIn('id', json_decode($request->$cstm_attribute_ids))->delete();
                    }
                }

            } else {
                $data['visible_product'] = null;
            }

            if ($request->$used_for_variation) {
                $data['used_for_variation'] = $request->$used_for_variation;
            } else {
                $data['used_for_variation'] = null;
            }





            $product_attributes = ProductAttribute::create($data);

            array_push($ids_attribute, $product_attributes->id);
            //  array_push($attributes_remaining_array, $product_attributes->id);
            // dd($request->$attribute);

            if (!empty($request->$attribute)) {
                array_push($variation, count($request->$attribute));
            }


            if ($product_attributes->used_for_variation != null) {
                if (!empty($request->$attribute)) {
                    for ($j = 0; $j < count($request->$attribute); $j++) {


                        $attribute_value = AttributeValue::find($request->$attribute[$j]);

                        $product_add_attr = new ProductAdditionalAttribute();
                        $product_add_attr->product_attribute_id = $product_attributes->id;
                        $product_add_attr->attribute_id = $attribute_value->id;
                        $product_add_attr->attribute = $attribute_value->attribute_value;
                        // $product_add_attr->cstm_attribute_value = $attribute_value->attribute_value;
                        $product_add_attr->save();
                    }
                }
            }


            // return $request->all();
            // return $request->$cstm_attribute_value;

            if ($product_attributes->used_for_variation != null) {
                if (!empty($request->$cstm_attribute_value)) {

                    $cstm_attr_value = explode("|", $request->$cstm_attribute_value);

                    $cstm_values = array();
                    for ($i = 0; $i < count($cstm_attr_value); $i++) {
                        $attribute_value = new AttributeValue();
                        $attribute_value->variant_id = 1;
                        $attribute_value->attribute_value = $cstm_attr_value[$i];
                        $attribute_value->slug = Str::slug($cstm_attr_value[$i], '-');
                        $attribute_value->status = 1;
                        $attribute_value->save();

                        $product_add_attr = new ProductAdditionalAttribute();
                        $product_add_attr->product_attribute_id = $product_attributes->id;
                        $product_add_attr->attribute_id = $attribute_value->id;
                        $product_add_attr->attribute = $attribute_value->attribute_value;
                        // $product_add_attr->attribute_id = $product_attributes->id;
                        // $product_add_attr->attribute = $cstm_attr_value[$i];
                        $product_add_attr->save();


                        array_push($cstm_values, $cstm_attr_value[$i]);
                    }
                    array_push($attributes_remaining_array, $cstm_values);
                }
            }


            // array_push($product_attributes, $data);
        }


        // dd($attributes_remaining_array);

        $attr = json_encode($attributes_remaining_array);

        foreach ($attributes_remaining_array as $key => $val) {

            if ($val == 'a') {
                unset($attributes_remaining_array[$key]);
                continue;
            } else {
            }
        }


        //  return $attributes_remaining_array;


        function array_filter_recursive($array, $callback = null)
        {
            foreach ($array as $key => &$value) {
                if (is_array($value)) {
                    $value = array_filter_recursive($value, $callback);
                } else {
                    if (!is_null($callback)) {
                        if (!$callback($value)) {
                            unset($array[$key]);
                        }
                    } else {
                        if (!(bool) $value) {
                            unset($array[$key]);
                        }
                    }
                }
            }
            unset($value);

            return $array;
        }

        $attributes_remaining_array = array_filter_recursive($attributes_remaining_array);

        $attributes_remaining_array = array_values($attributes_remaining_array);

        //  return $attributes_remaining_array;

        //   $attributes_remaining_array;
        //   $options = [];

        //   foreach ($attributes_remaining_array as $key => $option) {
        //     array_push($options, $attributes_remaining_array[$key]);
        //   }
        //   array_push($options,session::get('attribute_signle_array'));


        $start = array_shift($attributes_remaining_array);
        //  return $start;
        //  return $attributes_remaining_array;

        $product_varia = ProductVariantion::where('product_id', $id)->get()->pluck('attribute_id')->toArray();

        if (count($attributes_remaining_array) > 0) {
            //  return $start;
            //  return $attributes_remaining_array;
            $collections = collect($start)->crossJoin(...$attributes_remaining_array);
            // dd($collections);
            $arrayImplode = array('a');
            foreach ($collections as $key => $keysImplode) {
                array_push($arrayImplode, $keysImplode);
            }
            foreach ($arrayImplode as $key => $val) {

                if ($val == 'a') {
                    unset($arrayImplode[$key]);
                    continue;
                } else {

                }
            }
            // foreach($arrayImplode)
            //  str_replace(":","",json_encode($arrayImplode));

            $arrayImplode_exist = [];
            foreach ($arrayImplode as $key => $val) {
                $OriginalString = $val;
                // echo  implode(',',$val)."<br>";
                array_push($arrayImplode_exist,implode(',',$val));
            }
            
            ProductVariantion::where('product_id', $id)->get()->pluck('attribute_id')->toArray();
            // dd($arrayImplode_exist,$product_varia,array_diff($arrayImplode_exist,$product_varia));
            // array_diff($arrayImplode_exist,$product_varia)

            

            $newDiffAttr = [];
            $newDiffAttrCount = count(array_diff($arrayImplode_exist,$product_varia)) ?? 0;
            $diff_old_arr = array_values(array_diff($arrayImplode_exist,$product_varia));
            
            // if($newDiffAttrCount == 0){
            //     $notification = array('message' => 'Already variation exists, for change add or remove attributes ! ', 'alert-type' => 'warning');
            //     return redirect()->route('edit.product_attributes', ['id' => $id])->with($notification);
            // }

            if($newDiffAttrCount > 0){
                for ($i=0; $i < $newDiffAttrCount; $i++) { 
                    // echo "yes exist";
                    ProductVariantion::where('product_id', $id)->where('attribute_id', $diff_old_arr[$i])->first();
                    array_push($newDiffAttr, explode(',',$diff_old_arr[$i]));
                }
            }

        
            
            if(count($newDiffAttr) > 0){
                $new_diff_attr = session()->put('collections', $newDiffAttr);
            }else{

                // return $collections;
                session()->put('collections', $collections);
                $collections = session()->get('collections');
            }
        
            // return session()->get('collections', $newDiffAttr);
            // $exist_in_database = array_values($arrayImplode);
            $exist_in_database = $arrayImplode;
            session()->put('exist_in_database_collections', $exist_in_database);
            
            
            
        } else {
            $collections = $start;
            session()->put('collections', $collections);
            $collections = session()->get('collections');
        }

        

        // dd(session()->get('collections'));
        // $product = Product::find(session()->get('var_product_id'));
        // if($product->product_type == 1){
        //     session()->forget('collections');
        //     session()->forget('var_product_id');
        //     return redirect()->route('product.index')->with('product_added', 'Product added successfully!');
        // }
        session()->put('edit_product_id', $id);
        return redirect()->route('add.product_variation');
    }

    // public function define_product_variant_edit(Request $request, $id)
    // {
    //     // return request()->all();
    //     // return $id;
    //     if ($request->dpv_id[0]) {

            

    //         $variant_id = 'variant_id' . $request->dpv_id[0];
    //         $visible_product = 'visible_product' . $request->dpv_id[0];
    //         $used_for_variation = 'used_for_variation' . $request->dpv_id[0];
    //         $cstm_attribute_name = 'cstm_attribute_name' . $request->dpv_id[0];
    //         $cstm_attribute_value = 'cstm_attribute_value' . $request->dpv_id[0];
    //         $attribute = 'attribute' . $request->dpv_id[0];
            

            
    //         // validation for al least one attribute requirements validated
    //         // if($request->$cstm_attribute_name == null){
    //         //     return redirect()->back()->withErrors(['define_attr_error' => 'Attribute name is required', 'product_id' => session()->put('edit_product_id', $id)]);
    //         // }
    //         // if(empty($request->$cstm_attribute_value)){
    //         //     return redirect()->back()->withErrors(['define_attr_error' => 'Custom attribute value(s) required', 'product_id' => session()->put('edit_product_id', $id)]);
    //         // }
    //         // if(empty($request->$visible_product)){
    //         //     return redirect()->back()->withErrors(['define_attr_error' => 'Product visible should be checked', 'product_id' => session()->put('edit_product_id', $id)]);
    //         // }
            
            
            
    //     }

    //     // return "here";



    //     // ProductAttribute::where('product_id', session()->get('var_product_id'))->get()->each->delete();

    //     $id = session()->has('var_product_id') ? session()->get('var_product_id') : $id;
    //     //  delete and update new
    //     if (session()->has('var_product_id')) {
    //         $p_attr = ProductAttribute::where('product_id', $id)->get();
    //         if (!empty($p_attr)) {
    //             $ids = $p_attr->pluck('id')->toArray();
    //             if (!empty($ids)) {
    //                 for ($x = 0; $x < count($ids); $x++) {
    //                     ProductAdditionalAttribute::where('product_attribute_id', $ids[$x])->get()->each->delete();
    //                 }
    //             }
    //             ProductAttribute::whereIn('id', $ids)->delete();
    //         }
    //     }

    //     //  return "outside";


    //     $product_attributes = array();


    //     $variation = array();
    //     $ids_attribute = [];

    //     // $attribute_signle_array = array();
    //     $attributes_remaining_array = array('a');

    //     for ($x = 0; $x < count($request->dpv_id); $x++) {


    //         $data = array();

    //         $dpv_id = $request->dpv_id[$x];
    //         $variant_id = 'variant_id' . $request->dpv_id[$x];
    //         $visible_product = 'visible_product' . $request->dpv_id[$x];
    //         $used_for_variation = 'used_for_variation' . $request->dpv_id[$x];
    //         $cstm_attribute_ids = 'cstm_attribute_ids' . $request->dpv_id[$x];
    //         $cstm_attribute_name = 'cstm_attribute_name' . $request->dpv_id[$x];
    //         $cstm_attribute_value = 'cstm_attribute_value' . $request->dpv_id[$x];
    //         $attribute = 'attribute' . $request->dpv_id[$x];
    //         //  $cstm_attribute_value = 'cstm_attribute_value'.$request->dp_vid[$x];

    //         $data['product_id'] = $id;

    //         // return $request->$attribute;
    //         // if($x == 0){
    //         //     array_push($attribute_signle_array, $request->$attribute);
    //         //     session::put('attribute_signle_array', $request->$attribute);

    //         // }else{

    //         if (!empty($request->$attribute)) {
    //             array_push($attributes_remaining_array, $request->$attribute);
    //         }

    //         // array_push($attributes_remaining_array, $dpv_id);

    //         // }

    //         // array_push($attributes_array, $attribute[$x]);


    //         if ($request->$variant_id) {
    //             $data['variant_id'] = $request->$variant_id;
    //             $variant = Variant::find($request->$variant_id);

    //             if ($request->$cstm_attribute_name) {
    //                 $data['variant'] = $request->$cstm_attribute_name;
    //             } else {
    //                 $data['variant'] = $variant->variant;
    //             }
    //         } else {
    //             $data['variant_id'] = null;
    //             $data['variant'] = null;
    //         }

    //         if ($request->$visible_product) {
    //             $data['visible_product'] = $request->$visible_product;

    //             // delete custom attribute and then create -> to see create custom attribute go down 
    //             if($request->$cstm_attribute_ids){
    //                 $attr_ids = $request->$cstm_attribute_ids ? json_decode($request->$cstm_attribute_ids) : [];
    //                 if(count($attr_ids) > 0){
    //                     AttributeValue::whereIn('id', json_decode($request->$cstm_attribute_ids))->delete();
    //                 }
    //             }

    //         } else {
    //             $data['visible_product'] = null;
    //         }

    //         if ($request->$used_for_variation) {
    //             $data['used_for_variation'] = $request->$used_for_variation;
    //         } else {
    //             $data['used_for_variation'] = null;
    //         }


            


    //         $product_attributes = ProductAttribute::create($data);

    //         array_push($ids_attribute, $product_attributes->id);
    //         //  array_push($attributes_remaining_array, $product_attributes->id);
    //         // dd($request->$attribute);

    //         if (!empty($request->$attribute)) {
    //             array_push($variation, count($request->$attribute));
    //         }


    //         if ($product_attributes->used_for_variation != null) {
    //             if (!empty($request->$attribute)) {
    //                 for ($j = 0; $j < count($request->$attribute); $j++) {


    //                     $attribute_value = AttributeValue::find($request->$attribute[$j]);

    //                     $product_add_attr = new ProductAdditionalAttribute();
    //                     $product_add_attr->product_attribute_id = $product_attributes->id;
    //                     $product_add_attr->attribute_id = $attribute_value->id;
    //                     $product_add_attr->attribute = $attribute_value->attribute_value;
    //                     // $product_add_attr->cstm_attribute_value = $attribute_value->attribute_value;
    //                     $product_add_attr->save();
    //                 }
    //             }
    //         }


    //         // return $request->all();
    //         // return $request->$cstm_attribute_value;

    //         if ($product_attributes->used_for_variation != null) {
    //             if (!empty($request->$cstm_attribute_value)) {

    //                 $cstm_attr_value = explode("|", $request->$cstm_attribute_value);

    //                 $cstm_values = array();
    //                 for ($i = 0; $i < count($cstm_attr_value); $i++) {
    //                     $attribute_value = new AttributeValue();
    //                     $attribute_value->variant_id = 1;
    //                     $attribute_value->attribute_value = $cstm_attr_value[$i];
    //                     $attribute_value->slug = Str::slug($cstm_attr_value[$i],'-');
    //                     $attribute_value->status = 1;
    //                     $attribute_value->save();

    //                     $product_add_attr = new ProductAdditionalAttribute();
    //                     $product_add_attr->product_attribute_id = $product_attributes->id;
    //                     $product_add_attr->attribute_id = $attribute_value->id;
    //                     $product_add_attr->attribute = $attribute_value->attribute_value;
    //                     // $product_add_attr->attribute_id = $product_attributes->id;
    //                     // $product_add_attr->attribute = $cstm_attr_value[$i];
    //                     $product_add_attr->save();


    //                     array_push($cstm_values, $cstm_attr_value[$i]);
    //                 }
    //                 array_push($attributes_remaining_array, $cstm_values);
    //             }
    //         }


    //         // array_push($product_attributes, $data);
    //     }


    //     $attr = json_encode($attributes_remaining_array);

    //     foreach ($attributes_remaining_array as $key => $val) {

    //         if ($val == 'a') {
    //             unset($attributes_remaining_array[$key]);
    //             continue;
    //         } else {
    //         }
    //     }


    //     //  return $attributes_remaining_array; 


    //     function array_filter_recursive($array, $callback = null)
    //     {
    //         foreach ($array as $key => &$value) {
    //             if (is_array($value)) {
    //                 $value = array_filter_recursive($value, $callback);
    //             } else {
    //                 if (!is_null($callback)) {
    //                     if (!$callback($value)) {
    //                         unset($array[$key]);
    //                     }
    //                 } else {
    //                     if (!(bool) $value) {
    //                         unset($array[$key]);
    //                     }
    //                 }
    //             }
    //         }
    //         unset($value);

    //         return $array;
    //     }

    //     $attributes_remaining_array = array_filter_recursive($attributes_remaining_array);

    //     $attributes_remaining_array = array_values($attributes_remaining_array);

    //     //  return $attributes_remaining_array;

    //     //   $attributes_remaining_array;
    //     //   $options = [];

    //     //   foreach ($attributes_remaining_array as $key => $option) {
    //     //     array_push($options, $attributes_remaining_array[$key]);
    //     //   }
    //     //   array_push($options,session::get('attribute_signle_array'));


    //     $start = array_shift($attributes_remaining_array);
    //     //  return $start;
    //     //  return $attributes_remaining_array;


    //     if (count($attributes_remaining_array) > 0) {
    //         //  return $start;
    //         //  return $attributes_remaining_array;
    //         $collections =  collect($start)->crossJoin(...$attributes_remaining_array);
    //         session()->put('collections', $collections);
    //         $collections = session()->get('collections');
    //     } else {
    //         $collections =  $start;
    //         session()->put('collections', $collections);
    //         $collections = session()->get('collections');
    //     }

    //     // return session()->get('collections');


    //     // $collection->crossJoin($attribute_signle_array);




    //     // $product = Product::find(session()->get('var_product_id'));

    //     // if($product->product_type == 1){
    //     //     session()->forget('collections');
    //     //     session()->forget('var_product_id');
    //     //     return redirect()->route('product.index')->with('product_added', 'Product added successfully!');
    //     // }

    //     session()->put('edit_product_id', $id);
    //     return redirect()->route('add.product_variation');
    // }


    public function get_detail_variable_product(Request $request)
    {
      


        $product_variation =  ProductVariantion::where('product_id', $request->product_id)->where('attribute_id', $request->attributes_ids)->first();

        $html = view('frontend.partials.get-variant-details', get_defined_vars())->render();
        return response()->json([
            'html' => $html,
            'stock' => $product_variation->stock ?? 0,
            'is_login' => Auth::check() ? 1 : 0,
        ]);
    }


    public function updateproductdata(Request $request, $id)
    {
        
        // return request()->all();
        // ProductAttribute::where('product_id',$id)->get()->each->delete();
        // ProductVariantion::where('product_id',$id)->get()->each->delete();
        
        
        $discount_status = null;
        if($request->product_type == 1){
            
        $now = strtotime(now());
        
        if(!empty($request->sale_start) && !empty($request->sale_end)){
            $sale_start = Carbon::create(date('Y', strtotime($request->sale_start)) , date('m', strtotime($request->sale_start)), date('d', strtotime($request->sale_start)));
            $sale_end = Carbon::create(date('Y', strtotime($request->sale_end)) , date('m', strtotime($request->sale_end)), date('d', strtotime($request->sale_end)));


                // // dd($request->sale_start);
                // if(empty($request->sale_start)){
                //     if(!empty($request->sale_end)){
                //         $notification = array('message' => 'if you want to set discount, then both date should be set!', 'alert-type' => 'error');
                //         return redirect()->route('edit.product',['id' => $id])->with($notification);
                //     }
                // }

                // if(empty($request->sale_end)){
                //     if(!empty($request->sale_start)){
                //         $notification = array('message' => 'if you want to set discount, then both date should be set!', 'alert-type' => 'error');
                //         return redirect()->route('edit.product',['id' => $id])->with($notification);
                //     }
                // }
                
                // if($request->sale_price == null && ($request->sale_start != '' && $request->sale_end != '')){
                //     $notification = array('message' => 'Please set sale price if you want to set discount!', 'alert-type' => 'error');
                //     return redirect()->route('edit.product',['id' => $id])->with($notification);
                // }




                // // discount set
                if($sale_end->greaterThan($sale_start)){
                    $discount_status = Carbon::create( date('Y', $now) , date('m', $now), date('d', $now) )->between($sale_start, $sale_end);
                }else{
                    $notification = array('message' => 'At least date should be one day for discount, make sure date range enter correctly!', 'alert-type' => 'error');
                    return redirect()->route('edit.product',['id' => $id])->with($notification);
                }
            
                // discount forever
                if($request->sale_price != null && ($request->sale_start == '' && $request->sale_end == '')){
                    $discount_status = true;
                }

            }else{
                $discount_status = false;
            }
        }


        
        $product = Product::find($id);
        $product->product_type = $request->product_type;
        $product->parent_category_id = $request->parent_category_id;
        $product->main_category_id = $request->main_category;
        $product->sub_category_id = $request->sub_category;
        $product->product_name = $request->product_name;
        $product->slug = Str::slug($request->product_name, "-");
        $product->price = $request->regular_price;
        $product->sale_price = $request->sale_price;

        if($discount_status == true && $request->sale_price != ''){
            $product->discounted_price = ($request->regular_price - $request->sale_price );
            $product->discount = ($request->regular_price - $request->sale_price );
            $product->discount_percent = number_format((($request->regular_price - $request->sale_price) / $request->regular_price) * 100, 2);
            $product->sale_start = $request->sale_start ?? null;
            $product->sale_end = $request->sale_end ?? null;
            $product->discount_status = 1;
        }else{
           
            $product->sale_price = null;
            $product->discounted_price = null;
            $product->discount = null;
            $product->discount_percent = null;
            $product->discount_status = null;
            $product->sale_start = null;
            $product->sale_end = null;
        }

        $product->total_price = $request->regular_price;
        
        
        $product->sku = $request->sku;
        $product->brand_id = $request->brand_id;
        $product->stock = $request->stock;
        $product->shipping = $request->shipping;
        $product->quantity = $request->quantity;
        $product->tags = collect([$request->tags])->flatten();
        $product->status = 1;
        $product->description = $request->description;
        if ($request->image) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $filename);
            $product->image = $filename;
        }
        $product->save();

        


        
        if($request->product_type == 1){
            $notification = array('message' => 'Product Updated Successfully! ', 'alert-type' => 'success');
            Session::forget('var_product_id',  $product->id);
            Session::forget('type_id', $product->product_type);
            return redirect()->route('product.index')->with($notification);
        }else{

            Session::put('var_product_id',  $product->id);
            Session::put('type_id', $product->product_type);
            return redirect()->route('edit.product_attributes', ['id' => $id]);
        }
        
    }
}
