@include('layout.baseCustomer')
<div class="pt-24 flex">
	@include('layout.baseCustomerSide')
	@if ($customer)
		@include('layout.baseCustomerMenu')
	@endif
	<div class="w-full px-20 ml-80 m-16">
		<div class="pt-24">
			@if ($customer)
				<div class="ml-80 pt-32">
					<div class="ml-56">
						<button onClick="location.href='/customer/list'" class=" bg-green-700 text-white font-bold py-3 px-6 rounded">
							<font class="text-lg">会員一覧</font>
						</button>
					</div>
					<div class="ml-56 pt-40">
						<button onClick="location.href='/product/list'" class=" bg-green-700 text-white font-bold py-3 px-6 rounded">
							<font class="text-lg">商品一覧</font>
						</button>
					</div>
				</div>
			@else
				<div class="ml-80 pt-32">
					<div class="ml-56">
						<button onClick="location.href='/customer/new'" class=" bg-green-700 text-white font-bold py-3 px-6 rounded">
							<font class="text-lg">新規登録</font>
						</button>
					</div>
					<div class="ml-56 pt-40">
						<button onClick="location.href='/customer/login'" class=" bg-green-700 text-white font-bold py-3 px-6 rounded">
						<font class="text-lg">ログイン</font>
						</button>
					</div>
				</div>
			@endif
		</div>
	</div>
</div>
</body>
</html>