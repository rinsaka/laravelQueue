<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

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

    for ($i = 1; $i <= $request->numberOfComments; $i++) {
      usleep(1330000);  // 1.33 秒スリープする
      $comment = new Comment();
      $comment->title = $i . '件目のコメント';
      $comment->body = 'コメント' . $i . 'の本文';
      $comment->save();
    }

    return redirect('/comments');
  }
}
