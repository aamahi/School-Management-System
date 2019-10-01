
<h1 class="text-primary"><i class="fa fa-user"></i> All User <small class='sm'>Shahjalal islamic ideal school</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard </a>/ <i class="fa fa-user"></i> All User</li>
    </ol>
</nav>
<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>User Name</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM `users`";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <?php
                        $img = "imge/{$row['photo']}";
                        ?>
                    <td><img src="<?php echo $img; ?>" class='img' alt=""></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>