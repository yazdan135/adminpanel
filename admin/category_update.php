 <?php
 include("./header.php");
 include("./connection.php");

 $Id = $_GET['id'];
 $sql = "select * from category where id = $Id";
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
                                <h4 class="card-title">category Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>category Name</label>
                                                <input type="text" value="<?php echo $rows['category'] ?>" name="category-name" class="form-control" placeholder="enter category name">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>category image</label>
                                                <input type="file" value="<?php echo $rows['category_image'] ?>" name="image" class="form-control">
                                            </div>
                                         
                              
                                        <button type="submit" name="update" class="btn btn-primary">update category</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>

        

<?php

if(isset($_POST['update'])){
        $category = $_POST['category-name'];
        $image = $_FILES['image']['name'];


        $sql = "update category set category = '$category', category_image = '$image' where id = $Id";
        $result = mysqli_query($conn,$sql);
        echo "<script>
        alert('Category Updated Successfully');
        window.location.href = 'category_show.php'
        </script>";

}
include("./footer.php");
?>