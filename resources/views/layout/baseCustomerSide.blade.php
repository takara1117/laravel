<nav class="p-10 pt-32 border-r border-gray-300 bg-gray-50 w-72 h-full fixed font-sans">
	<div class="flex items-center">
		<button onClick="location.href='{{ '/' }}'">
			<img src="{{ asset('storage/images/HOME.png') }}" class="w-14 mr-3">
		</button>
		<p class="text-2xl">TOP</p>
	</div>
	<div class="flex items-center pt-5">
		<button onClick="location.href='{{ '/customer/new' }}'">
			<img src="{{ asset('storage/images/user.png') }}" class="w-14 mr-3">
		</button>
		<p class="text-2xl">新規登録</p>
	</div>
	<div class="flex items-center pt-5">
		<button onClick="location.href='{{ '/customer/login' }}'">
			<img src="{{ asset('storage/images/login.png') }}" class="w-14 mr-3">
		</button>
		<p class="text-2xl">ログイン</p>
	</div>
</nav>