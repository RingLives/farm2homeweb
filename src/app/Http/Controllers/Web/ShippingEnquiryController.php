<?php

namespace App\Http\Controllers\Web;

use Illuminate\Routing\Controller;
use App\Models\Web\ShippingEnquiry;
use App\Models\Web\Languages;
use App\Models\Web\Products;
use Illuminate\Http\Request;
use App\Models\Web\Currency;
use App\Models\Web\Index;
use App\Models\Web\Order;
use App\Models\Web\News;
use Validator;
use Lang;

class ShippingEnquiryController extends Controller
{
	public function __construct(
		                  Index $index,
											News $news,
											Languages $languages,
											Products $products,
											Currency $currency,
											Order $order
											)
	{
		$this->index = $index;
		$this->order = $order;
		$this->news = $news;
		$this->languages = $languages;
		$this->products = $products;
		$this->currencies = $currency;
		$this->theme = new ThemeController();
	}

	public function form()
	{
		$title = array('pageTitle' => Lang::get("website.Contact Us"));
		$result = array();
		$final_theme = $this->theme->theme();
		$result['commonContent'] = $this->index->commonContent();

		return view("form", [
				'title' => $title,
				'final_theme' => $final_theme,
				'result' => $result,
			]);
	}

	public function formStore(Request $request)
	{
		Validator::make($request->all(), [
		            'address' => 'required',
		            'email' => 'required',
		            'zip_code' => 'required',
		        ])->validate();

		$shippingEnquiry = new ShippingEnquiry();
		$shippingEnquiry->fill($request->all());
		$shippingEnquiry->fill(['customer_id' => auth()->user()->id ?? 0]);
		$shippingEnquiry->save();

		return redirect(url()->previous())->withSuccess("Successfully save.");
		print_r($request->all());die();
	}
}