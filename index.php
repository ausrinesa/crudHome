<?php

include "./components/head.php"

    ?>

<h1>
    Home sweet home
</h1>
<?php
include "./components/navbar.php";
?>

<body>

    <?php include "./components/form.php";
    include "./components/filter.php"; ?>

    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>adresas</th>
                    <th>Kambarių skaičius</th>
                    <th>Namas/butas?</th>
                    <th>Aukštas</th>
                    <th>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($homes as $home) { ?>
                <tr>
                    <td>
                        <?= $home->id ?>
                    </td>
                    <td>
                        <?= $home->address ?>
                    </td>
                    <td>
                        <?= $home->roomCount; ?>
                    </td>
                    <td>
                        <?php if (($home->isHouse) == 0) {
                        echo "Butas";
                    } else {
                        echo "Namas";
                    }
                        ?>
                    </td>
                    <td>
                        <?= $home->floor ?>
                    </td>

                    <td>
                        <div class="d-flex flex-row  mb-3">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $home->id ?>">
                                <button id="editBtn" class="btn btn-outline-success" type="submit" name="edit"
                                    id="editBtn">
                                    edit
                                </button>
                            </form>

                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $home->id ?>">
                                <button id="deleteBtn" class="btn btn-outline-danger" type="submit" name="destroy"
                                    id="deleteBtn">
                                    delete
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>