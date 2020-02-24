<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

use App\Jobs\StoreComments;

class CommentsController extends Controller
{
  public function index()
  {
    $comments = Comment::orderBy('created_at', 'DESC')
                          ->paginate(10);
    $cnt = Comment::count();
    return view('comments.index')
          ->with('cnt', $cnt)
          ->with('comments', $comments);
  }

  public function create()
  {
    return view('comments.create');
  }

  public function store(Request $request)
  {
    //dd($request);

    $this->validate($request, [
      'numberOfComments' => 'required|integer|min:1|max:1000'
    ]);

    // キューに入れる
    StoreComments::dispatch($request->numberOfComments);

    return redirect('/comments');
  }
}
