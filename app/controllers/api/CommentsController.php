<?php namespace controllers\api;

use Comment;
use Auth;
use Input;
use Request;

class CommentsController extends \BaseController {

	/**
	 * Return a listing of the resource as JSON.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Comment::with('user', 'job')->get();
	}

	/**
	 * Return the specified resource as JSON.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// TODO: Error handling if resource isn't found
		return Comment::find($id);
	}

	/**
	 * Return a listing of the resource as JSON.
	 *
	 * @return Response
	 */
	public function getComments($jobId)
	{
		return Comment::with('user')->where('job_id','=',$jobId)->get();
	}

	public function postComment($id)
	{
		$text = Input::get('text');
		$userid = Auth::user()->id;
		Comment::create(array('job_id' => $id, 'user_id' => $userid, 'text' => $text));

		return Comment::with('user')->where('job_id','=',$id)->get();
	}

}