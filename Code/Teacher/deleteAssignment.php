<?php
require_once "../DB_Connection.php";

if (isset($_GET['continue'])) {
?><script>window.location.href = "assignmentEditor.php?assign=<?=$_GET['continue'];?>";</script><?php
    exit;
}

$sth = $pdo -> prepare("SELECT * FROM `assignments`");
$sth -> execute();
$row = $sth -> fetch();

do {
    if (isset($_GET['delete' . $row['id']])) {
        $sth = $pdo -> prepare("DELETE FROM `assignments` WHERE id = ?");
        $sth -> execute([$row['id']]);
        echo "deleted assignment with id " . $row['id'] . "<br>";
    } else {
        echo "Assignment with id " . $row['id'] . " was not clicked<br>";
    }
} while ($row = $sth -> fetch());
header("Location: teacherSite.php?selected=2");
exit();