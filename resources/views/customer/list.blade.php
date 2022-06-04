@include('layout.baseCustomer')
<div class="pt-24 flex">
	@include('layout.baseLayoutMenu')
	<div class="w-full px-20 ml-72 pt-32">
		<div>
			<h1 class=" font-medium text-4xl">会員一覧</h1>
		</div>
		<div class="justify-center pt-10">
			<table class="w-full">
				<tr>
					<th>ID</th>
					<th>氏名</th>
					<th>メールアドレス</th>
				</tr>
				@foreach($customers as $customer)
					<tr>
						<td class="border px-4 py-2 border-gray-300 text-center">
							{{$customer->id}}
						</td>
						<td class="border px-4 py-2 border-gray-300 text-center">
							{{$customer->name}}
						</td>
						<td class="border px-4 py-2 border-gray-300 text-center">
							{{$customer->email}}
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
</body>
</html>