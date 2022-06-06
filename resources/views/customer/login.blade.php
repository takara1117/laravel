@include('layout.baseCustomer')
<div class="pt-24 flex">
	@include('layout.baseCustomerSide')
	<div class="w-full px-20 ml-80 m-16">
		<p class="text-2xl">ログイン</p>
		<div class="pt-24">
			<form action="/customer/authenticate" method="post">
			@csrf
			<div class="ml-80">
				<div class="ml-32 text-xl">
					<label for="">メールアドレス</label>
					<div>
						<input type="mail" id="email" name="email" value="{{old('email')}}" class="border-solid border-2 border-gray-500">
					</div>
					@error('email')
					{{ $message }}
					@enderror
				</div>
				<div class="ml-32 pt-10 text-xl">
					<label for="">パスワード</label>
					<div>
						<input type="password" id="password" name="password" class="border-solid border-2 border-gray-500">
					</div>
					@error('password')
					{{ $message }}
					@enderror
				</div>
				<div class="ml-48 pt-10">
					<button type="submit" class="bg-green-700 text-white font-bold py-3 px-5 rounded">
						ログイン
					</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>