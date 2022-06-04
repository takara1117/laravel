@include('layout.baseCustomer')
<div class="pt-24 flex">
	@include('layout.baseCustomerSide')
	<div class="w-full px-20 ml-80 m-16">
		<div class="pt-24">
			<div class="ml-80 pt-24">
				<p class="text-2xl ml-40">{{$name}} 様</p>
				<p class="text-2xl ml-24 pt-1">登録ありがとうございます</p>
				<div class="ml-40 pt-10">
					<button onClick="location.href='/customer/login'" class=" bg-green-700 text-white font-bold py-2 px-4 rounded">
						ログイン画面へ
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>