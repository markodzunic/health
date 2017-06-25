<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Practice;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\MessageBag;

class PracticeAccountController extends Controller {

	protected $sortby;
	protected $orderby;

	protected $messageBag;

	public function __construct(MessageBag $messageBag) {
				$this->middleware('admin');
				$this->messageBag = $messageBag;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$data = $request->all();

		$this->sortby = isset($data['sort']) ? $data['sort'] : 'name';
		$this->orderby = isset($data['order']) ? $data['order'] : 'asc';

		$practiceModel = new Practice;
		$practices = $practiceModel->get_practices($this->sortby, $this->orderby);

		# custom pagination
		$currentPage = LengthAwarePaginator::resolveCurrentPage();
		$col = new Collection($practices);
		$perPage = 5;
		$currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
		$practices = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

		if ($request->ajax()) {
				return view('admin.PracticeAccount.practices.table', [
						'sortby' => $this->sortby,
						'orderby' => $this->orderby,
						'practices' => $practices,
						'pagination' => true,
						'columns' => Practice::$sortColumns,
				])->render();
		} else {
				return view('admin.PracticeAccount.practices.index', [
						'sortby' => $this->sortby,
						'orderby' => $this->orderby,
						'practices' => $practices,
						'pagination' => true,
						'columns' => Practice::$sortColumns,
				])->render();
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = $request->all();

		$this->validate($request, [
			'name' => 'required',
			'address' => 'required',
			'email' => 'required',
	    ]);

		$prectice = new Practice;
		$prectice->user_id = Auth::user()->id;
		$prectice->name = $data['name'];
		$prectice->description = $data['description'];
		$prectice->address = $data['address'];
		$prectice->fax = $data['fax'];
		$prectice->email = $data['email'];
		$prectice->site = $data['site'];
		$prectice->save();
	}

	public function deletePractice(Request $request) {
    if (!$request->isMethod('post')) {
      $data = $request->all();
      $errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

      if ($errors) {
        foreach ($errors as $key => $value) {
          $this->messageBag->add($key, $value);
        }
      }

      return view("admin.PracticeAccount.practices.delete",[
          'data' => $data,
      ])->withErrors($errors);
    } else {
      $data = $request->all();
      $practice = Practice::find($data['id']);

			$practiceUsers = User::where('authorised_user', '=', $practice->id)->get();

			if ($practiceUsers) {
					foreach ($practiceUsers as $key => $value) {
						$value->delete();
					}
			}

      $practice->delete();
      $request->session()->flash('alert-success', 'Practice and its users deleted.');
    }
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
		$data = $request->all();

		$this->validate($request, [
			'name' => 'required',
			'address' => 'required',
			'email' => 'required',
	    ]);

		$prectice = Practice::find($id);
		$prectice->user_id = Auth::user()->id;
		$prectice->name = $data['name'];
		$prectice->description = $data['description'];
		$prectice->address = $data['address'];
		$prectice->fax = $data['fax'];
		$prectice->email = $data['email'];
		$prectice->site = $data['site'];
		$prectice->save();
	}

	public function updatePractice(Request $request) {
    if (!$request->isMethod('post')) {
      $data = $request->all();
      $errors = isset($data['error']) ? json_decode($data['error'],1) : $this->messageBag;

      if ($errors) {
        foreach ($errors as $key => $value) {
          $this->messageBag->add($key, $value);
        }
      }

      $practice = Practice::find($data['id']);

      return view("admin.PracticeAccount.practices.update",[
          'practice' => $practice
      ])->withErrors($errors);
    } else {
      $data = $request->all();

			$this->validate($request, [
				'name' => 'required',
				'address' => 'required',
				'email' => 'required|email',
		  ]);

			$practice = Practice::find($data['id']);

			$practice->name = $data['name'];
			$practice->description = $data['description'];
			$practice->address = $data['address'];
			$practice->fax = $data['fax'];
			$practice->email = $data['email'];
			$practice->site = $data['site'];

			$practice->save();

      $request->session()->flash('alert-success', 'Practice Updated.');
    }
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
