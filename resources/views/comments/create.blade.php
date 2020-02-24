<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Laravel</title>
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>
<body>
  <h1>
    コメントの一気登録
  </h1>

  <div>
    <form method="post" action="{{ url('/comments') }}">
      @csrf
      <p>
        <label for="numberOfComments">コメント数: </label>
        <input type="number" name="numberOfComments" id="numberOfComments" value="5" placeholder="登録したいコメント件数を入力" required>
        @if ($errors->has('numberOfComments'))
          <span class="error">{{ $errors->first('numberOfComments') }}</span>
        @endif
      </p>

      <p>
        <input type="submit" value="コメントの追加">
      </p>
    </form>
  </div>

</body>
</html>