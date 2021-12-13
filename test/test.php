<?php  
// include("config.php");
$connect = mysqli_connect("localhost", "root", "", "sample");//databse connectivity
if(isset($_POST["submit"]))
{
	// print_r($_POST);
    // die();
    if($_FILES['file']['name'])
    {
    $filename = explode(".", $_FILES['file']['name']);
    if($filename[1] == 'csv')
    {
    $handle = fopen($_FILES['file']['tmp_name'], "r");
    while($data = fgetcsv($handle))//handling csv file 
    {
    $item1 = mysqli_real_escape_string($connect, $data[0]);  
    $item2 = mysqli_real_escape_string($connect, $data[1]);
    //insert data from CSV file 
    
    $query = "INSERT into ts_excel(ts_name, ts_email) values('$item1','$item2')";
    mysqli_query($connect, $query);
    }
    fclose($handle);    
    echo "File sucessfully imported";
    }
    }
}
?>

    <!DOCTYPE html>  
    <html>  
    <head>  
    <title>Techno Smarter Tutorials</title>
    </head> 
    <body> 
    <form method="post" enctype="multipart/form-data">
    <label>Select CSV File:</label>
    <input type="file" name="file">
    <br>
    <input type="submit" name="submit" value="Import">
    </form>
    </body>  
    </html>