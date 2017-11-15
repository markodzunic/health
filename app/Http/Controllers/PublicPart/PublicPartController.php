<?php
namespace App\Http\Controllers\PublicPart;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Http\Request;

class PublicPartController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('public.home.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$data = $request->all();

		$this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'position' => 'required',
			'practice_name' => 'required',
			'phone' => 'required',
			'email' => 'required|email',
	    ]);

		$request->session()->flash('alert-success', 'Message Sent.');

		Mail::send('admin.emails.download', ['contact' => $data], function ($m) use ($data) {
        $m->from($data['email'], 'Imedical');
        $m->to('imedical.ie@gmail.com', $data['first_name'])->subject('Download Message');
    });

		$headers = array(
       'Content-Type: application/octet-stream',
    );
    return response()->download(storage_path().'/iMedicalBrochure2017.pdf', '', $headers);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
