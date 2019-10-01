<div class="content">
    <h1 class="text-primary "><i class='fa fa-dashboard'></i> Dashboard <small class='sm'>Shahjalal islamic ideal school</small></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>
    </nav>

    <?php 
    $count_std = mysqli_query($connection,"SELECT * FROM `stuinfo`");
    $total_std = mysqli_num_rows($count_std);
    
    $count_user = mysqli_query($connection,"SELECT * FROM `users`");
    $total_user = mysqli_num_rows($count_user);
    ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                            <div class="float-right f10"><?php echo $total_std;?></div>
                            <div class="clearfix"></div>
                            <div class="allstd">All Student</div>
                        </div>
                    </div>
                </div>
                <a href="index.php?page=all-student">
                    <div class="panel-footer">
                        <span style="float:left">All Student</span>
                        <span class="allstd"><i class="fa fa-arrow-circle-o-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                            <div class="float-right f10"><?php echo $total_user;?></div>
                            <div class="clearfix"></div>
                            <div class="allstd">All Users</div>
                        </div>
                    </div>
                </div>
                <a href="index.php?page=all-user">
                    <div class="panel-footer">
                        <span style="float:left">All Users</span>
                        <span class="allstd"><i class="fa fa-arrow-circle-o-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

    </div>
    <hr>
    <h3>All Student</h3>
    <div class="table-responsive">
        <table id="data" class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>City</th>
                    <th>Contract</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `stuinfo` ORDER BY `class`";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['roll']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <?php
                            $img = "stdimg/{$row['photo']}";
                            ?>
                        <td><img src="<?php echo $img; ?>" class='img' alt=""></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>