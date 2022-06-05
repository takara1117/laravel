@include('layout.baseCustomer')
<div class="pt-24 flex">
	@include('layout.baseLayoutMenu')
	<div class="w-full px-20 ml-72">
		<div class="flex inline-block  pt-32">
			<button onClick="location.href='/product/list'">
				<img src="{{ asset('storage/images/back.png') }}" class="w-10 mr-3">
			</button>
			<h1 class="font-medium text-4xl">商品詳細</h1>
		</div>
		<div class="pt-24">
			<div class="border px-4 py-2 border-gray-300">
				<div class="text-xl">
					<label for="">ID</label>
					<div>
						<p class="border-b border-gray-300">
							{{$product->id}}
						</p>
					</div>
				</div>
				<div class="text-xl pt-10">
					<label for="">商品名</label>
					<div>
						<p class="border-b border-gray-300">
							{{$product->name}}
						</p>
					</div>
				</div>
				<div class="text-xl pt-10">
					<label for="">商品説明</label>
					<div>
						<p class="border-b border-gray-300">
							{!! nl2br($product->description) !!}
						</p>
					</div>
				</div>
				<div class="text-xl pt-10">
					<label for="">商品画像</label>
					<div>
						<img src="{{ asset('storage/images/' . $product->getImageSrc()) }}" width="200" height="100" class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-150">
					</div>
				</div>
				<div class="text-xl pt-10">
					<label for="">価格</label>
					<div>
						<p class="border-b border-gray-300">
							¥{{ number_format($product->getMinPrice()) }}
						</p>
					</div>
				</div>
				<div class="text-xl pt-10">
					<label for="">在庫</label>
					<div>
						<p class="border-b border-gray-300">
						{{$product->getStock()}}
						</p>
					</div>
				</div>
				<div class="text-xl pt-10">
					<label for="">ステータス</label>
					<div>
						<p class="border-b border-gray-300">
						{{$product->getAvailableStatus()}}
						</p>
					</div>
				</div>
			</div>
			<div class="flex inline-block justify-between pt-3">
				<a onclick="return deleteConfirm()" href="/product/delete/{{$product->id}}" class="bg-red-700 text-white font-bold py-2 px-4 rounded">
					削除
				</a>
				<button onclick="location.href='/product/edit/{{$product->id}}'" class=" bg-green-700 text-white font-bold py-2 px-4 rounded">
					編集
				</button>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('/js/product_detail.js') }}"></script>
</body>
</html>