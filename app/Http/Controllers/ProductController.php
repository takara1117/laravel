<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	use App\Http\Controllers\Controller;
	use App\Models\Product;
	use App\Models\ProductVariant;
	use App\Models\Customer;

	class ProductController extends Controller
	{
		//商品一覧
		public function list(Request $request)
		{
			//session確認
			if (session()->has('customer_id')) {
				$customer = Customer::find(session()->get('customer_id'));
			} else {
				$customer = null;
			}

			//ページャー機能
			$limit = $request->limit ?? 5;

			$products = Product::query()->paginate($limit);
			
			return view('product.list', [
				'products' => $products,
				'customer' => $customer
			]);
		}

		//商品追加
		public function new(Request $request)
		{
			//session確認
			if (session()->has('customer_id')) {
				$customer = Customer::find(session()->get('customer_id'));
			} else {
				$customer = null;
			}

			return view('product.new', [
				'customer' => $customer
			]);
		}

		public function create(Request $request)
		{
			$validated = $request->validate([
				'name' => ['required'],
				'available' => ['required']
			]);

			if(request('image')){
				$filename = request()->file('image')->getClientOriginalName();
				request('image')->storeAs('public/images', $filename);
			}

			$product = Product::create([
				'name' => $request->name,
				'description' => $request->description,
				'image' => $filename ?? '',
				'available' => $request->available
			]);

			$lastInsertId = $product->id;

			$variants = $request->variant;

			foreach ($request->variant as $variant_id => $variant) {

				if (isset($variant['subimage']) and $variantImage = $variant['subimage'] ) {
					$subfilename = $variantImage->getClientOriginalName();
					$variantImage->storeAs('public/images', $subfilename);
				}

				//variantのcreate
				$variant_attributes = [
					'product_id' => $lastInsertId,
					'variant'    => $variant['variant'] ?? '',
					'value'      => $variant['value'] ?? '',
					'price'      => $variant['price'] ?? 0,
					'stock'      => $variant['stock'] ?? 0,
					'image'      => $subfilename ?? '',
					'available'  => $variant['available'] ?? 0,
				];

				($request->variant);
				ProductVariant::create($variant_attributes);
			}
			
			return redirect('/product/detail/'.$lastInsertId);
		}

		//商品詳細
		public function detail(Request $request)
		{
			//session確認
			if (session()->has('customer_id')) {
				$customer = Customer::find(session()->get('customer_id'));
			} else {
				$customer = null;
			}

			$product = Product::find($request->id);

			return view('product.detail', [
				'product'  => $product,
				'customer' => $customer
			]);
		}

		//商品編集
		public function edit(Request $request)
		{
			//session確認
			if (session()->has('customer_id')) {
				$customer = Customer::find(session()->get('customer_id'));
			} else {
				$customer = null;
			}

			$product = Product::find($request->id);

			return view('product.edit', [
				'product'  => $product,
				'customer' => $customer
			]);
		}

		public function update(Request $request)
		{
			$validated = $request->validate([
				'name' => ['required'],
				'available' => ['required']
			]);	

			$product_id = $request->product_id;

			$product = Product::find($product_id);

			$attributes = $request->only(['name', 'description', 'available', 'image']);

			if(isset($attributes['image'])){
				$filename = $attributes['image']->getClientOriginalName();
				$attributes['image'] = $attributes['image']->storeAs('/', $filename);
			}
			
			$product->update($attributes);

			$ids = [];
			if ( isset($request['variant'])) {
				foreach ($request->variant as $variant_id => $variant) {

				if (isset($variant['subimage']) and $variantImage = $variant['subimage'] ) {
					$subfilename = $variantImage->getClientOriginalName();
					$variantImage->storeAs('public/images', $subfilename);
				}

				$variant_attributes = [
					'product_id' => $product->id,
					'variant'    => $variant['variant'] ?? '',
					'value'      => $variant['value'] ?? '',
					'price'      => $variant['price'] ?? 0,
					'stock'      => $variant['stock'] ?? 0,
					'image'      => $subfilename ?? '',
					'available'  => $variant['available'] ?? 0,
				];
				
				$product_variant = ProductVariant::updateOrCreate(
					['id' => $variant_id],
					$variant_attributes,
				);

				$ids[] = $product_variant->id;
			}		
			}

			foreach ($product->product_variants as $product_variant) {
				if (! in_array($product_variant->id, $ids)) {
					$product_variant->delete();
				}
			}
			return redirect('/product/detail/'.$product_id);
		}

		//商品削除
		public function delete(Request $request)
		{
			$product = Product::find($request->id);
			$product->delete();

			return redirect('product/list');
		}
	}