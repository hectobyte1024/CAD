<?php
require_once '../db.php';

$sql = "SELECT * FROM chat_messages ORDER BY timestamp DESC LIMIT 50";
$result = $conn->query($sql);
$mensajes = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];

foreach (array_reverse($mensajes) as $msg) {
    echo '<div class="message">';
    echo '<strong>' . htmlspecialchars($msg['username']) . '</strong>: ';
    echo htmlspecialchars($msg['message']) . '<br>';
    echo '<span class="timestamp">' . date('d/m/Y H:i', strtotime($msg['timestamp'])) . '</span>';
    echo '</div>';
}
?>
