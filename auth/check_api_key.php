function verify_api_key($user_id, $input_api_key, $conn) {
    $stmt = $conn->prepare("SELECT api_key FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($hashed_api_key);
    $stmt->fetch();
    $stmt->close();

    if (!$hashed_api_key) {
        // API key belum diset
        return false;
    }

    return password_verify($input_api_key, $hashed_api_key);
}