<?php 

$conn = mysqli_connect('localhost', 'root', '', 'vroomcarrental');

if(isset($_POST['checking_edit']))
{
    $CarId = $_POST['CarID']; 
    $result_array = [];

    $query = "SELECT * FROM cardatabase WHERE CarID='$CarId' ";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else
    {
        echo $return = "No Record Found.!";
    }
}

if(isset($_POST['checking_update']))
{
    $CarId = $_POST['car_id'];
    $Name = $_POST['Name'];
    $Seats = $_POST['Seats'];
    $Capacity = $_POST['Capacity'];
    $Transmission = $_POST['Transmission'];
    $StartLocation = $_POST['StartLocation'];
    $EndLocation = $_POST['EndLocation'];
    $FromToPrice = $_POST['FromToPrice'];
    $PricePerKm = $_POST['PricePerKm'];
    $Type = $_POST['Type'];

    $query = "UPDATE cardatabase SET Name='$Name', Seats='$Seats', Capacity='$Capacity', Transmission='$Transmission', StartLocation='$StartLocation', EndLocation='$EndLocation', FromToPrice='$FromToPrice', PricePerKm='$PricePerKm', Type='$Type' WHERE CarID='$CarId'";

    $query_run = mysqli_query($conn, $query);
    if($query_run){
        echo $return = "Successfully Updated !";
    }else{
        echo $return = "Something Went Wrong!";
    }
    
}

if(isset($_POST['checking_delete']))
{
    $CarId = $_POST['car_id'];

    $query = "DELETE FROM cardatabase WHERE CarID='$CarId'";

    $query_run = mysqli_query($conn, $query);
    if($query_run){
        echo $return = "Successfully Updated !";
    }else{
        // If delete operation fails, log the error
        echo $return = "Something Went Wrong!";
        echo "Delete query error: " . mysqli_error($conn);
    }
}
?>