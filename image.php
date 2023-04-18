<?php
$conn = mysqli_connect('localhost', 'root', '', 'placementdb');

if(isset($_POST['upload'])){

    $file = $_FILES['image']['name'];

    $query = "INSERT INTO upload(image) VALUES('$file')";
    $res = mysqli_query($conn,$query);
    if ($res){
        
        move_uploaded_file($_FILES['image']['tmp_name'],"$file");

    }
}


?>


<!DOCTYPE html>
<html>

    <title>Upload Image</title>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css ">

<div class = "container">
    <div class ="col-md-12">
        <div class ="row">
            <div class ="col-md-6">
                <h3 class ="text-cent">UPLOAD IMAGE</h3>
                <form class ="my-5" method="post" enctype="multipart/form-data">
                    <input type ="file" name="image" class="form-control">
                    <input type="submit" name="upload" value="UPLOAD" class="btn btn-success my-3">
                </form>
                </div>
                <div class = "col-md-6">
                    <h3 class ="text-center">Display Image</h3>


<?php 
$conn = mysqli_connect('localhost', 'root', '', 'placementdb'); 
		$sel = "SELECT * from upload";//Select a specific row with the ID
		$que = mysqli_query($conn, $sel);

		$output = "";
		if(mysqli_num_rows($que) < 1)
		{
			$output .= "<h3> No image uploaded</h3>";
		}
		while ($row = mysqli_fetch_array($que)) {
			$output .= "<img src='".$row['image']."' style='width:200px;height:200px;'>";
		}
			echo $output;//Print the Output(This returns the image)
	?>


        </div>
    </div>
</div>


</html>