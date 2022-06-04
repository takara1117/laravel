<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<title>商品一覧</title>
</head>
<body class="font-sans">
	<header class="flex p-4 border-b border-gray-300 fixed w-full bg-gray-50 h-24">
		{{-- <button onClick="location.href=' {{ '/' }} '">
			<img src="{{ asset('storage/images/KOSHIKI.png') }}" class="w-56">
		</button> --}}
		@if (isset($customer))
			<div class="absolute top-16 right-20">
				<p class="text-xl">
				{{ $customer->name }} 様
				</p>
			</div>
		@endif
	</header>
