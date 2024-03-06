<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | Details Update</title>
    <meta name="theme-color" content="rgb(0, 50, 50)">
    <link rel="icon" href="logo5.jpg">
    <style>
                :root{
                    --primary-background: rgb(255, 255, 197);
                    --secondary-background: rgb(0, 50, 50);
                    --secondary-background-with-opacity: rgb(0, 50, 50, .5);
                    --title-text: "Jacques Francois Shadow", serif;
                    --medium-text: "Irish Grover", system-ui;
                    --normal-text: "Itim", cursive;
                    --footer-background: rgb(31, 36, 45, .8);
                    --footer-color: rgb(153, 153, 153);
                }
                body{
                    background: rgb(0, 50, 50);
                    color: rgb(255, 255, 197);
                }
                h3{
                    font-family: var(--title-text);
                    color: rgb(0, 50, 50);
                    text-decoration: underline;
                }
                form{
                    width: fit-content;
                    padding: 20px 50px;
                    margin: auto;
                    background: rgb(255, 255, 197, .6);
                    border: 2px solid rgb(255, 197, 155);
                    user-select: none;
                }
                form label{
                    display: flex;
                    gap: 20px;
                    margin: 10px auto;
                    font-family: var(--medium-text);
                    letter-spacing: 3px;
                }
                form label input{
                    outline: transparent;
                    padding: 5px 10px;
                    width: 250px;
                    color: rgb(255, 255, 255, .8);
                    background: transparent;
                    border: transparent;
                    border-bottom: 2px solid rgb(0, 50, 50);
                    font-family: var(--normal-text);
                }
                form textarea{
                    resize: none;
                    width: 370px;
                    height: 210px;
                    background: rgb(0, 0, 0, .8);
                    color: rgb(0, 155, 155);
                    font-family: var(--normal-text);
                }
                form  button{
                    padding: 5px 25px;
                    margin: auto;
                    width: fit-content;
                    font-family: var(--medium-text);
                }
                form  button:hover{
                    background: rgb(255, 197, 155);
                    color: rgb(0, 50, 50);
                    cursor: pointer;
                    outline: 2px solid: rgb(0, 0, 0, .8);
                    border: 2px solid: rgb(0, 0, 0, .8);
                }
            </style>
</head>
<body>
<?php
$id = $_GET["id"];
if(isset($_POST['submit'])){
    $last = $_POST['lastname'];
    $ftitle = $_POST['title'];
    $fprofile = $_POST['profile'];
    $email = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];
    $linkedIn = $_POST['linkedIn'];
    $gender = $_POST['gender'];
    $con = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
    $sql = "update members set lastname='$last', title='$ftitle', userprofile='$fprofile', email='$email', whatsapp='$whatsapp', linkedIn='$linkedIn', gender='$gender'  where memberId=$id";
    if (mysqli_query($con, $sql)) {
        echo "Updated successfully!<br>";
        echo "Redirecting to Admin...";
        ?>
        <meta http-equiv="refresh" content="2;url=https://www.admin.biocharclimateresolution.org/">
        <?php
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
else{
    $con = mysqli_connect('localhost','biocharc_admin_init','Bcr<>23@Ng&F','biocharc_YmlvY2hhcmRib25l');
    $sql2 = "SELECT firstname, lastname, title, userprofile, email, whatsapp, linkedIn, gender FROM members WHERE memberId=$id";
    $result = mysqli_query($con, $sql2);
    
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="container">
                <div class="comp_name">
                </div>

                <div class="details">
                    <form action="" method="POST">
                        <h1>Change Details:</h1>
                        <label>Firstname:
                            <input value ="<?php echo ($row['firstname']);?>" required disabled>
                        </label>
                        <label>
                            Surname:
                            <input type="text" name="lastname" value ="<?php echo ($row['lastname']);?>">
                        </label>               
                        
                        <label>
                            Title:
                            <input type="text" name="title" value ="<?php echo ($row['title']);?>" required>
                        </label>

                        <label>
                            Email:
                            <input type="text" name="email" value ="<?php echo ($row['email']);?>">
                        </label>

                        <label>
                            Whatsapp no:
                            <input type="tel" name="whatsapp" pattern="\+\d{3}\d{9}" min="13" max="13" value ="<?php echo($row['whatsapp']);?>">
                        </label>
                        
                        <label>
                            LinkedIn url:
                            <input type="url" name="linkedIn" value ="<?php echo ($row['linkedIn']);?>">
                        </label>

                        <label>
                            Gender:
                            <select name="gender" required>
                                <option value="<?php echo ($row['gender']);?>"><?php echo ($row['gender']);?></option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                                <option value="N">Rather not say</option>
                            </select>
                        </label>

                        <label>
                            User profile details:
                            <textarea name="profile" required><?php echo ($row['userprofile']);?></textarea>
                        </label>

                        <input type="hidden"  value = "<?php echo $id; ?>" >
                        
                        <button type="submit" name="submit">CONFIRM AND SUBMIT</button>
                    </form>
                </div>
            </div>
            <?php
        }
    }
    else{
        ?>
        <h3 style="color: red;font-weight: bold;">
            <?php
                echo"Unable to update";
            ?>
        </h3>
    <?php
    }
}
?>
</body>
</html>