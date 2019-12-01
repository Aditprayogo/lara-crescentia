<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest;
use Illuminate\Http\Request;
use App\TravelPackage;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		$items = TravelPackage::all();

        return view('pages.admin.travel-package.index', [
			'items' => $items,
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
    {
		$new_package = new TravelPackage();
		$new_package->title = $request->input('title');
		$new_package->location = $request->input('location');
		$new_package->featured_event = $request->input('featured_event');
		$new_package->foods = $request->input('foods');
		$new_package->language = $request->input('language');
		$new_package->about = $request->input('about');
		$new_package->price = $request->input('price');
		$new_package->duration = $request->input('duration');
		$new_package->type = $request->input('type');
		$new_package->departure_date = $request->input('departure_date');
		$new_package->slug = \Str::slug($request->input('title'), '-');

		$new_package->save();

		return redirect()->route('travel-package.index')->with('success', 'The Package has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$item = TravelPackage::findOrFail($id);

		return view('pages.admin.travel-package.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPackageRequest $request, $id)
    {
		$travel = TravelPackage::findOrFail($id);

		$data = $request->all();

		$data['slug'] = \Str::slug($data['title'], "-");

		$travel->update($data);

		return redirect()->route('travel-package.index')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$item = TravelPackage::findOrFail($id);
		
		$item->delete();

		return redirect()->back()->with('success', 'Data Has Been Deleted');
    }
}
