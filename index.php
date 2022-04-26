<?php
require_once('./classes/User.php');
$user = new User();
$results = $user->getAll();

?>

<?php
if (isset($_GET["id"])) {
    $user->deleteUser($_GET["id"]);
}
?>


<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>


<body>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody id="table">
                <script>
                    $(document).ready(function() {
                        $.each($(".delete"), (function(i, item) {
                            item.addEventListener('click', () => {
                                $.ajax({
                                    type: 'GET',
                                    url: 'index.php',
                                    data: {
                                        id: item.dataset.id
                                    },
                                    success: function(response) {
                                        location.reload();
                                    }
                                })
                            })

                        }))
                    })
                </script>

            </tbody>
        </table>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($_GET['dataId'])) echo '1' ?>" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone</label>
            <input type="password" class="form-control" id="phone" name="phone">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Quyenhan</label>
            <input type="password" class="form-control" id="quyenhan" name="quyenhan">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">KHXAU</label>
            <input type="password" class="form-control" id="khxau" name="khxau">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">MAQUYEN</label>
            <input type="password" class="form-control" id="maquyen" name="maquyen">
        </div>

        <button id="adduser" class="btn btn-primary">ADD</button>
        <button id="edituser" class="btn btn-primary">EDIT</button>

        <script>
            $(document).ready(function() {

                const initData = () => {
                    $.ajax({
                        type: 'GET',
                        url: 'xuly.php',
                        success: function(data) {
                            $('#table').html(data);

                        }
                    })
                }
                initData()
                $("#adduser").click(() => {
                        const email = document.getElementById('email').value;
                        const password = document.getElementById('password').value;
                        const phone = document.getElementById('phone').value;
                        const quyenhan = document.getElementById('quyenhan').value;
                        const khxau = document.getElementById('khxau').value;
                        const maquyen = document.getElementById('maquyen').value;

                        $.ajax({
                            type: 'GET',
                            url: 'xuly.php',
                            data: {
                                email: email,
                                password: password,
                                phone: phone,
                                quyenhan,
                                khxau,
                                maquyen,
                                act: 'add'
                            },
                            success: function(data) {
                                initData()
                            }
                        })
                    }),
                    $.each($(".edit"), (function(i, item) {
                        item.addEventListener('click', () => {
                            $.ajax({
                                type: 'GET',
                                url: 'index.php',
                                data: {
                                    dataId: item.dataset.id
                                }

                            })
                        })

                    }))

            })
        </script>
    </div>
</body>

</html>