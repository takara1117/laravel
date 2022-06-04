<nav class="p-10 pt-32 border-r border-gray-300 bg-gray-50 w-72 h-full fixed font-sans">
	<div class="flex items-center">
		<button onClick="location.href='{{ '/' }}'">
			<img src="{{ asset('storage/images/HOME.png') }}" class="w-14 mr-3">
		</button>
		<p class="text-2xl">TOP</p>
	</div>
	<div class="flex items-center pt-5">
		<button onClick="location.href='{{ '/customer/list' }}'">
			<img src="{{ asset('storage/images/user.png') }}" class="w-14 mr-3">
		</button>
		<p class="text-2xl">顧客管理</p>
	</div>
	<div class="flex items-center pt-5">
		<button onClick="location.href='{{ '/product/list' }}'">
			<img src="{{ asset('storage/images/merchandise.png') }}" class="w-14 mr-3">
		</button>
		<p class="text-2xl">商品管理</p>
	</div>

	<div class="absolute bottom-32 left-20">
		<button onClick="location.href='/customer/logout'" class=" bg-red-700 text-white font-bold py-2 px-4 rounded">
		ログアウト
		</button>
	</div>
</nav>