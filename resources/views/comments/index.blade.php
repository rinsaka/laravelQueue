<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Laravel</title>
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>
<body>
  <h1>
    コメント一覧
  </h1>

  {{ $comments->links() }}
  <p>
    登録件数： {{ $cnt }}
  </p>
  <hr>

  <ol>
    @foreach ($comments as $comment)
      <li>
        {{ $comment->created_at }}
        {{ $comment->title }}
      </li>
    @endforeach
  </ol>
</body>
</html>