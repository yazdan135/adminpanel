<?php
include("./header.php");
include("./connection.php");

$Id = $_GET['id'];
$sql = "select * from authors where id = $Id";
$result = mysqli_query($conn , $sql);
$rows = mysqli_fetch_assoc($result);
?>


  <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span class="ml-1">Element</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

 <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Author Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Author Name</label>
                                                <input value="<?php echo $rows['author_name']?>" type="text" name="author-name" class="form-control" placeholder="enter Author name">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Date of Birth</label>
                                                <input value="<?php echo $rows['dob']?>" type="date" name="dob" class="form-control">
                                            </div>
                                            </div>

                                            <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Location</label>
                                                <input value="<?php echo $rows['location']?>" type="text" name="location" class="form-control" placeholder="give location">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Image:</label>
                                                <span><?php echo $rows['image']?></span>
                                                <input type="file" value="<?php echo $rows['image']?>" name="image" class="form-control">
                                            </div>
                                            </div>

                                         
                              
                                        <button type="submit" name="update" class="btn btn-primary">Update Author</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                     
<?php


if(isset($_POST['update'])){
    $author = $_POST['author-name'];
    $dob = $_POST['dob'];
    $location = $_POST['location'];
    $image = $_FILES['image']['name'];


    $sql = "update authors set author_name = '$author' , dob = '$dob' , location = 
    '$location' , image = '$image' where id = $Id";
    $result = mysqli_query($conn,$sql);

    if(isset($_FILES)){
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];
        $file_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($file_tmp, "images/author/"  .$file_name);
}
echo "<script>
alert('author Updated Successfully');
window.location.href = 'author_show.php'
</script>";

}


include("./footer.php");


?>