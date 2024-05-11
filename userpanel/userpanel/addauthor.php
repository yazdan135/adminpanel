<?php
include("./header.php");
?>
<h2 class="h2">Featured Author</h2>
<section class="tiles">

<?php
$sql = "select * from authors order by id asc";
$result = mysqli_query($conn , $sql);
while($rows = mysqli_fetch_assoc($result)){

?>
    <article class="style1">
        <span class="image">
        <?php echo "<img src=\" ../../admin/images/author/{$rows['image']}\"height=300px; width=300px>"?>

        </span>
        <a href="product-details.html">
            <h2><?php echo $rows['author_name']?></h2>
            
            <p><strong><?php echo $rows['location']?></strong></p>
            <p><strong><?php echo $rows['dob']?></strong></p>


            <p>Vestibulum id est eu felis vulputate hendrerit uspendisse dapibus turpis in </p>
        </a>
    </article>
    <?php } ?>
</section>
<?php
include("./footer.php");
?>