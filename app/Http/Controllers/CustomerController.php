<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Hash;

	use App\Http\Controllers\Controller;
	use App\Models\Customer;

	class CustomerController extends Controller
	{	
		//TOP処理
		public function index()
		{
			if (session()->has('customer_id')) {
				$customer = Customer::find(session()->get('customer_id'));
			} else {
				$customer = null;
			}

			return view('customer.index', [
				'customer' => $customer
			]);
		}	

		//新規登録処理
		public function create(Request $request) 
		{
			$validated = $request->validate([
				'name' => ['required'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
				'password' => ['required']
			]);	

			$customer = Customer::create([
				'name' => $request->name,
				'email' => $request->email,
				'password' => Hash::make($request->password),
			]);
			
			return redirect('/customer/finish')->with('name', $request->name);
		}

		//新規登録完了処理
		public function finish() 
		{
			$name = session('name');
			
			return view('customer.finish', [
				'name' => $name
			]);
		}

		//ログイン処理
		public function login()
		{
			return view('customer.login');
		}	

		public function authenticate(Request $request)
		{
			$validated = $request->validate([
				'email' => ['required', 'string', 'email', 'max:255', 'exists:customers'],
				'password' => ['required'],
			]);

			$customer = Customer::where('email', $request->email)->first();

			if (! Hash::check($request->password, $customer->password)) {
				return redirect()
					->back();
			}

			$request->session()->put('customer_id', $customer->id);
			
			return redirect('/');
		}

		//ログアウト処理
		public function logout()
		{
			session()->forget('customer_id');

			return redirect('/');
		}

		public function new() 
		{
			return view('customer.new');
		}

		//一覧表示処理
		public function list(Request $request) 
		{

			if (session()->has('customer_id')) {
				$customer = Customer::find(session()->get('customer_id'));
			} else {
				$customer = null;
			}

			$customers = Customer::all();

			return view('customer.list', [
				'customers' => $customers,
				'customer'  => $customer,
			]);
		}
	} 