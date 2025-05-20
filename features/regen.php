<?php
require_once '/home/famkiewe/public_html/auth/db.php'; // path sesuaikan!

// Update semua player
$conn->query("
    UPDATE users 
    SET 
        energy_current = LEAST(energy_max, energy_current + 5),
        nerve_current = LEAST(nerve_max, nerve_current + 1),
        happy_current = LEAST(happy_max, happy_current + 55)
    WHERE
        1=1
");
?>