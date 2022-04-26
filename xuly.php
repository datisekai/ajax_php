
<?php
require_once('./classes/User.php');
$user = new User();
$results = $user->getAll();
function loadData($results)
{
    while ($row = $results->fetch_assoc()) {
        echo '<tr>
        <th scope="row">' . $row["taikhoan_id"] . '</th>
        <td>' . $row["taikhoan_email"] . '</td>
        <td>' . $row["taikhoan_password"] . '</td>
        <td>' . $row["taikhoan_phone"] . '</td>
        <td>' . $row["taikhoan_quyenhan"] . '</td>
        <td>' . $row["taikhoan_khxau"] . '</td>
        <td>' . $row["maquyen"] . '</td>
        <td class="d-flex">
            <button data-id=' . $row["taikhoan_id"] . ' class="edit">EDIT</button>
            <button class="delete" data-id=' . $row["taikhoan_id"] . '>DELETE</button>
        </td>
    </tr>';
    }
}

// khi vừa gọi tới xulyphp. => gọi load data -> echo...

if (isset($_GET['act']) && $_GET['act'] == 'add') {
    $user->addUser($_GET['email'], $_GET['password'], $_GET['phone'], $_GET['quyenhan'], $_GET['khxau'], $_GET['maquyen']);
    loadData($results);
}


loadData($results);

?>

