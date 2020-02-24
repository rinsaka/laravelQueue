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
}
