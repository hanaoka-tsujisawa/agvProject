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
				$db = new PDO (
					"pgsql:dbname=postgres;host=127.0.0.1;port=5432;options='--client_encoding=UTF8'",
					"postgres",		// username
					"admin"			// password
				);

				$map_name_input = $_POST['map_name_input'];
				$sql = "INSERT INTO test_table_map_create (map_name) VALUES ('.$map_name_input.')";
				$res = $db->query($sql);

				echo "<p>map_name: ".$map_name_input."</p>";
				echo '<p>で登録しました。</p>';
			}
			
			catch(PDOException $e) {
				$map_name_input = $_POST['map_name_input'];

				echo "<p>map_name: ".$map_name_input."</p>";
				echo "<p>データベースに接続できませんでした。</p>";
				
				exit($e->getMessage());
			}
		?>
	</body>
</html>