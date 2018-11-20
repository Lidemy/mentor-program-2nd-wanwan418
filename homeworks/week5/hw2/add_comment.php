<?

include_once("conn.php");
print_r($_POST);

$user_id = $_COOKIE['user_id'];
$nickname = $_POST['nickname'];
$content = $_POST['content'];
$parent_id = $_POST['parent_id'];

$sql = "INSERT INTO wanwan418_comments (user_id, content, parent_id) VALUES ($user_id, '$content', $parent_id)";

$conn->query($sql); 
$conn->close();
header('Location: index.php');
?>
