<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>登録ありがとうございます</title>
</head>
<body>
  <h1>登録ありがとうございます</h1>

  <p>
    以下のリンクをクリックすると本登録が完成されました：
    <a href="{{ route('confirm_email', $user->activation_token) }}">
      {{ route('confirm_email', $user->activation_token) }}
    </a>
  </p>

  <p>
    本人ではない場合は本メールを無視してください。。
  </p>
</body>
</html>
