<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    DB::table('comments')->insert([
      'title' => '1つ目のコメント',
      'body' => 'コメントの本文',
      'created_at' => '2020-02-24 18:05:00',
      'updated_at' => '2020-02-24 18:05:00'
    ]);

    DB::table('comments')->insert([
        'title' => '2個目',
        'body' => 'コメントのbody',
        'created_at' => '2020-02-24 18:07:00',
        'updated_at' => '2020-02-24 18:07:00'
    ]);

    DB::table('comments')->insert([
        'title' => '三個目のタイトル',
        'body' => '本文',
        'created_at' => '2020-02-24 18:09:00',
        'updated_at' => '2020-02-24 18:09:00'
    ]);
  }
}
