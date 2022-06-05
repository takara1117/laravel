@include('layout.baseCustomer')
<div class="pt-24 flex">
	@include('layout.baseLayoutMenu')
	<div class="w-full px-20 ml-72">
		<div class="flex inline-block  pt-32">
			<button onClick="location.href='/product/list'">
				<img src="{{ asset('storage/images/back.png') }}" class="w-10 mr-3">
			</button>
			<h1 class="font-medium text-4xl">商品追加</h1>
		</div>
		<div class="pt-24">
			<form action="/product/create" method="post" enctype="multipart/form-data">
			<div class="border px-4 py-2 border-gray-300">
			@csrf
				<div class="flex flex-row-reverse space-x-4 space-x-reverse p-5">
					<select name="available" id="available" required class="border-solid border-2 border-gray-500 block">
						<option value="">選択してください</option>
						<option value="0">販売停止中</option>
						<option value="1">販売中</option>
					</select>
				</div>
				<div class="text-xl">
					<label for="">商品名</label>
					<div>
						<input type="text"  name="name" id="name" value="{{old('name')}}" class="border-solid border-2 border-gray-500">
					</div>
					@error('name')
					{{ $message }}
					@enderror
				</div>
				<div class="flex inline-block justify-between">
					<div class="text-xl pt-10">
						<label for="">商品説明</label>
						<div>
							<textarea name="description" id="description" cols="30" rows="9"  class="border-solid border-2 border-gray-500 block"></textarea>
						</div>
					</div>
					<div class="text-xl px-32">
						<label for="">商品画像</label>
						<div>
							<input type="file" id="image" name="image" accept="image/jpeg,image/png,image/jpg" class="p-32 border-solid border-2 border-gray-500 block">
						</div>
					</div>
				</div>
				<div class="pt-10">
					<input type="button" value="variant追加" id="addText" class="bg-green-700 text-white font-bold py-2 px-4 rounded">
				</div>

				<div id="variants" class="pt-5">
					<div class="border px-4 py-2 border-gray-300">
						<div class="text-xl">
							<label for="">種類</label>
							<div>
								<input type="text" id="variant" name="variant[0][variant]" class="border-solid border-2 border-gray-500">
							</div>
						</div>
						<div class="text-xl">
							<label for="">種類名</label>
							<div>
								<input type="text" id="value" name="variant[0][value]" class="border-solid border-2 border-gray-500">
							</div>
						</div>
						<div class="text-xl">
							<label for="">価格</label>
							<div>
								<input type="text" id="price" name="variant[0][price]" class="border-solid border-2 border-gray-500">		
							</div>
						</div>
						<div class="text-xl">
							<label for="">在庫</label>
							<div>
								<input type="text" id="stock" name="variant[0][stock]" class="border-solid border-2 border-gray-500">
							</div>
						</div>
						<div class="text-xl">
							<label for="">ステータス</label>
							<select name="variant[0][available]" id="available" required class="border-solid border-2 border-gray-500 block">
								<option value="">選択してください</option>
								<option value="0">販売停止中</option>
								<option value="1">販売中</option>
							</select>
						</div>
						<div class="text-xl">
							<label for="">画像</label>
							<div>
								<input type="file" id="subimage" name="variant[0][subimage]" accept="image/jpeg,image/png,image/jpg">
							</div>
						</div>
						<input type="button" value="variant削除" id="deleteText" class="bg-red-700 text-white font-bold py-2 px-4 rounded mt-3">
					</div>
				</div>
				<div class="flex flex-row-reverse space-x-4 space-x-reverse p-5">
					<button type="submit" class="bg-green-700 text-white font-bold py-2 px-4 rounded">
						登録
					</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('/js/product_create.js') }}"></script>
</body>
</html>