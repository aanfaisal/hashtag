<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;
use Instagram;
use Session;

class PhotoController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index(Request $request) {
		$keyword = $request->get('search');
		$perPage = 25;

		if (!empty($keyword)) {
			$photo = Photo::where('foto', 'LIKE', "%$keyword%")
				->orWhere('printed', 'LIKE', "%$keyword%")
				->paginate($perPage);
		} else {
			$photo = Photo::paginate($perPage);
		}

		return view('photo.index', compact('photo'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create() {
		return view('photo.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(Request $request) {

		$requestData = $request->all();

		Photo::create($requestData);

		Session::flash('flash_message', 'Photo added!');

		return redirect('photo');
	}

	public function postInsta(Request $request) {
		$requestData = $request->all();
		$username = $_POST['username'];
		$pass = $_POST['pass'];
		$photo = $_POST['foto'];
		// create instance
		$img = Image::make($photo);
		// resize image to fixed size
		$img->resize(853, 480);
		$path = public_path('photos/sendtowa.jpg');
		$img->save($path);
		$srcImage = public_path('photos/sendtowa.jpg');
		$caption = "It's My Photo";
		$debug = false;

		$i = new instagram($username, $pass, $debug);
		try {
			$i->login();
		} catch (InstagramException $e) {
			$e->getMessage();
			exit();
		}
		try {
			$i->uploadPhoto($srcImage, $caption);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		return redirect('thanks');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $photo_id
	 *
	 * @return \Illuminate\View\View
	 */
	public function show($photo_id) {
		$photo = Photo::findOrFail($photo_id);

		return view('photo.show', compact('photo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $photo_id
	 *
	 * @return \Illuminate\View\View
	 */
	public function edit($photo_id) {
		$photo = Photo::findOrFail($photo_id);

		return view('photo.edit', compact('photo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $photo_id
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update($photo_id, Request $request) {

		$requestData = $request->all();

		$photo = Photo::findOrFail($photo_id);
		$photo->update($requestData);

		Session::flash('flash_message', 'Photo updated!');

		return redirect('photo');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $photo_id
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function destroy($photo_id) {
		Photo::destroy($photo_id);

		Session::flash('flash_message', 'Photo deleted!');

		return redirect('photo');
	}
}
