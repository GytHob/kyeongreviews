<?php
			$servername =  getenv('mysql_server_address');
			$username = getenv('mysql_username');
			$password = getenv('mysql_password');
			$dbname = getenv('mysql_dbname');

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
?>