<html>
    <body style="background: rgb(0, 50, 50);color: red;">
        <?php
        $id = $_GET['id'];

        $con = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
 
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $sql = "delete from members where memberId=$id";
    

        if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully";
        ?>
        <meta http-equiv="refresh" content="2;url=https://admin.biocharclimateresolution.org/">
        <?php
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        mysqli_close($con);

        ?>
    </body>
</html>