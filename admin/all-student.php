
<h1 class="text-primary"><i class="fa fa-user"></i> All Student <small class='sm'>Shahjalal islamic ideal school</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard </a>/ <i class="fa fa-user"></i> All Student</li>
    </ol>
</nav>
<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll</th>
                <th>City</th>
                <th>Class</th>
                <th>Contract</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM `stuinfo`";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['roll']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['class']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <?php
                        $img = "stdimg/{$row['photo']}";
                        ?>
                    <td><img src="<?php echo $img; ?>" class='img' alt=""></td>
                    <td>
                        <a href="index.php?page=updatestudent&id=<?php echo base64_encode($row['id']); ?>"class ='btn btn-xs btn-warning'><i class="fa fa-pencil"></i> Edit</a>
                        <a href="delete.php?id=<?php echo base64_encode($row['id']); ?>"class ='btn btn-xs btn-danger'><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>