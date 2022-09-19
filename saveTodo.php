<?php include("./db_config.php");
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if($_POST['btn'] === "Add-Todo"){

            print_r($_POST);
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            echo "<br> you have entered ". $_POST['todoTitle']. " to the list";
            
            $sql = "insert into todo_list(`title`) values ('$_POST[todoTitle]')";
            $result = $conn->query($sql);
            
            header('location:./index.php');
        }
        if($_POST['btn'] === "Update"){
            if(isset($_POST['todoId']) && isset($_POST['todoTitle'])){
                $id = $_POST['todoId'];
                $title = $_POST['todoTitle'];
                $sql = "update todo_list set `title` = '$title' where `id`='$id'";
                if($conn->query($sql) === true){
                    header('location:./index.php');
                } else {
                    echo " A todo list failed";
                }
            } else {
                    die("id not exits");
            }
        }
    }
?>