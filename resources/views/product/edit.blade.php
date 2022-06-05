@include('layout.baseCustomer')
<div class="pt-24 flex">
	@include('layout.baseLayoutMenu')
	<div class="w-full px-20 ml-72">
		<div class="flex inline-block  pt-32">
			<button onClick="location.href='/product/detail/{{$product->id}}'">
				<img src="{{ asset('storage/images/back.png') }}" class="w-10 mr-3">
			</button>
			<h1 class="font-medium text-4xl">編集</h1>
		</div>
		<div class="pt-24">
			<form action="/product/update" method="post" enctype="multipart/form-data">
			<div class="border px-4 py-2 border-gray-300">
			@csrf
				<div class="flex flex-row-reverse space-x-4 space-x-reverse p-5">	
					<select name="available" id="available" required class="border-solid border-2 border-gray-500 block">
						<option value="">選択してください</option>
						<option value="0" @if ($product->available == false) selected @endif>販売停止中</option>
						<option value="1" @if ($product->available == true) selected @endif>販売中</option>
					</select>
				</div>
				<div class="text-xl">
					<label for="">ID：</label>
					{{$product->id}}
					<input type="hidden" name="product_id" value="{{ $product->id }}">		
				</div>
				<div class="text-xl">
					<label for="">商品名</label>
					<div>
						<input type="text"  name="name" id="name" value="{{ $product->name }}"class="border-solid border-2 border-gray-500">
					</div>
					@error('name')
					{{ $message }}
					@enderror
				</div>
				<div class="flex inline-block justify-between">
					<div class="text-xl pt-10">
						<label for="">商品説明</label>
						<div>
							<textarea name="description" id="description" cols="30" rows="10" class="border-solid border-2 border-gray-500 block">{{$product->description}}</textarea>
						</div>
					</div>
					<div class="text-xl px-32">
						<label for="file">商品画像</label>
						<div>
							<img src="{{ asset('storage/images/' . $product->getImageSrc()) }}" width="350" height="100" class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-150">
							<input type="file" id="image" name="image" accept="image/jpeg,image/png,image/jpg" class="p-4 ">
						</div>
					</div>
				</div>
				<div class="pt-10">
					<input type="button" value="variant追加" id="addText" class="bg-green-700 text-white font-bold py-2 px-4 rounded">
				</div>

				<div id="variants" class="pt-5">
				@foreach ($product->product_variants as $variant)
				<div class="border px-4 py-2 border-gray-300">
					<div class="text-xl">
						<label for="">種類</label>
						<div>
							<input type="text" id="variant" name="variant[{{ $variant->id }}][variant]" value="{{$variant->variant}}" class="border-solid border-2 border-gray-500">
						</div>
					</div>
					<div class="text-xl">
						<label for="">種類名</label>
						<div>
							<input type="text" id="value" name="variant[{{ $variant->id }}][value]" value="{{$variant->value}}" class="border-solid border-2 border-gray-500">
						</div>
					</div>
					<div class="text-xl">
						<label for="">価格</label>
						<div>
							<input type="text" id="price" name="variant[{{ $variant->id }}][price]" value="{{ $variant->price }}" class="border-solid border-2 border-gray-500">
						</div>
					</div>
					<div class="text-xl">
						<label for="">在庫</label>
						<div>
							<input type="text" id="stock" name="variant[{{ $variant->id }}][stock]" value="{{$variant->stock }}" class="border-solid border-2 border-gray-500">
						</div>
					</div>
					<div class="text-xl">
						<label for="">ステータス</label>
						<select name="variant[{{ $variant->id }}][available]" id="available" required class="border-solid border-2 border-gray-500 block">
							<option value="">選択してください</option>
							<option value="0" @if ($variant->available == false) selected @endif>販売停止中</option>
							<option value="1" @if ($variant->available == true) selected @endif>販売中</option>
						</select>
					</div>
					<div class="text-xl">
						<label for="">画像</label>
						<img src="{{ asset('storage/images/' . $variant->image) }}" width="150" height="100" class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-150">
						<input type="file" id="subimage" name="variant[{{ $variant->id }}][subimage]" accept="image/jpeg,image/png,image/jpg">
					</div>
					<input type="button" value="variant削除" id="deleteText" class="bg-red-700 text-white font-bold py-2 px-4 rounded mt-3">
				</div>
				@endforeach
				</div>
				<div class="flex flex-row-reverse space-x-4 space-x-reverse p-5">
					<button type="submit" class="bg-green-700 text-white font-bold py-2 px-4 rounded">更新</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('/js/product_edit.js') }}"></script>
</body>
</html>