<?php
$conn = new mysqli("localhost", "root", "", "sport_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT id, username, email FROM users");

if ($result->num_rows > 0) {
    echo "<h2>Liste des utilisateurs enregistrés</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>Nom d'utilisateur</th><th>Email</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["username"] . "</td>
                <td>" . $row["email"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Aucun utilisateur trouvé.";
}

$conn->close();
?>
