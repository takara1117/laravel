@include('layout.baseCustomer')
<div class="pt-24 flex">
	@include('layout.baseLayoutMenu')
	<div class="w-full px-20 ml-72">
		<div class="flex inline-block justify-between pt-32">
			<h1 class=" font-medium text-4xl">商品一覧</h1>
			<button onClick="location.href='/product/new'" class=" bg-green-700 text-white font-bold py-2 px-4 rounded">
				商品を追加する
			</button>
		</div>
		<div class="justify-center pt-10">
			<table class="w-full">
				<tr>
					<th>ID</th>
					<th>商品名</th>
					<th>商品画像</th>
					<th>ステータス</th>
					<th>価格</th>
					<th colspan="1">詳細</th>
				</tr>	
				@foreach ($products as $product)
					<tr>
						<td class="border px-4 py-2 border-gray-300 text-center">
							{{$product->id}}
						</td>
						<td class="border px-4 py-2 border-gray-300 text-center">
							{{$product->name}}
						</td>
						<td class="border px-4 py-2 border-gray-300">
							<img src="{{ asset('storage/images/' . $product->getImageSrc()) }}" width="100" height="100" class="mx-auto w-24 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-150">
						</td>
						<td class="border px-4 py-2 border-gray-300 text-center {{$product->getAvailableColor()}}">
							{{$product->getAvailableStatus()}}
						</td>
						<td class="border px-4 py-2 border-gray-300">
							¥{{ number_format($product->getMinPrice()) }}
							&nbsp;~&nbsp;
							¥{{ number_format($product->getMaxPrice()) }}
						</td>
						<td class="border px-4 py-2 border-gray-300 text-center">
							<button onClick="location.href='/product/detail/{{$product->id}}'" class="bg-green-700 text-white font-bold py-2 px-4 rounded">
							詳細
							</button>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
		<div>
			<span class="font-medium flex justify-center pt-10">
				{{ $products->links() }}
			</span>	
		</div>
	</div>
</div>
</body>
</html>