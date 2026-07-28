<?php
require_once "config.php";
header("Content-Type: application/json; charset=utf-8");

$id = isset($_POST["id"]) ? intval($_POST["id"]) : 0;

if ($id <= 0) {
    echo json_encode(["success" => false, "message" => "معرّف غير صالح"]);
    exit;
}

// جلب الحالة الحالية
$stmt = $conn->prepare("SELECT status FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($currentStatus);
$stmt->fetch();
$stmt->close();

if ($currentStatus === null) {
    echo json_encode(["success" => false, "message" => "السجل غير موجود"]);
    exit;
}

// عكس القيمة (0 -> 1 أو 1 -> 0)
$newStatus = $currentStatus == 1 ? 0 : 1;

$update = $conn->prepare("UPDATE users SET status = ? WHERE id = ?");
$update->bind_param("ii", $newStatus, $id);
$update->execute();
$update->close();

echo json_encode(["success" => true, "id" => $id, "status" => $newStatus]);
?>
