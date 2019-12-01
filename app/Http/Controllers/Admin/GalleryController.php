<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Gallery;
use App\TravelPackage;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$items = Gallery::with(['travel_package'])->get();
		
		return view('pages.admin.gallery.index', [
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
		$travel_packages = TravelPackage::all();
		
		return view('pages.admin.gallery.create', [
			'travel_packages' => $travel_packages
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
		$data = $request->all();
		$data['image'] = $request->file('image')->store('assets/gallery', 'public');

		Gallery::create($data);

		return redirect()->route('gallery.index')->with('success', 'Gallery Has Been Created');
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

		$gallery = Gallery::findOrFail($id);
		$travel_packages = TravelPackage::all();
		
		return view('pages.admin.gallery.edit', [
			'travel_packages' => $travel_packages,
			'gallery' => $gallery
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
		$gallery = Gallery::findOrFail($id);
		
		$data = $request->all();

		if ($request->file('image')) {
			# code...
			if ($gallery->image && file_exists(storage_path('app/public/assets/gallery/' . $gallery->image))) {
				# code...
				\Storage::delete('app/public/assets/gallery/' . $gallery->image);
			}

			$data['image'] = $request->file('image')->store('assets/gallery', 'public');
		}

		$gallery->update($data);

		return redirect()->route('gallery.index')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$gallery = Gallery::findOrFail($id);
		
		$gallery->delete();

		return redirect()->route('gallery.index')->with('success', 'Data has been deleted');
    }
}
