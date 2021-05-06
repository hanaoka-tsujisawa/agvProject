<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>demo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	</head>

	<body>
		<?php
			try {
				// ユーザー名、パスワード
				$username = 'postgres';
				$password = 'admin';

				// データベースに接続
				$PDO = new PDO("mysql:host=testserver;dbname=postgres;charset=utf8;",  $username,  $password );
				// PDOのエラーレポートを表示
				$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				// postの値を取得
				$time_stamping = 'CURRENT_TIMESTAMP(2)';
				$map_name_input = $_POST['map_name_input'];

				// INSERT文を変数に格納
				$sql = "INSERT INTO test_table_map_create VALUES (:time_stamping, :map_name_input)";
				// 挿入する値は空のまま、SQL実行の準備をする
				$stmt = $dbh->prepare($sql);
				// 挿入する値を配列に格納する
				$params = array(':time_stamping' => $time_stamping, ':map_name_input' => $map_name_input, ':description' => $description);
				// 挿入する値が入った変数をexecuteにセットしてSQLを実行
				$stmt->execute($params);

				// 登録完了のメッセージ
				echo "<p>time_stamping: ".$time_stamping."</p>";
				echo "<p>map_name_input: ".$map_name_input."</p>";
				echo '<p>で登録しました。</p>';
			}
			
			catch (PDOException $e) {
				exit('データベースに接続できませんでした。' . $e->getMessage());
			}
		?>
	</body>
</html>