<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Comment;

class StoreComments implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  protected $n_comments;    // ここの記述を忘れないように！

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct($n_comments)
  {
    $this->n_comments = (int) $n_comments;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    for ($i = 1; $i <= $this->n_comments; $i++) {
      usleep(1330000);  // 1.33 秒スリープする
      $comment = new Comment();
      $comment->title = $i . '件目のコメント';
      $comment->body = 'コメント' . $i . 'の本文';
      $comment->save();
    }
  }
}
