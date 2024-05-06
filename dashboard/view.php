<?php 
    if (isset($_POST['name1'])) {
        // $action = $_POST['action'];
        $first = $_POST['name1'];
        $last = $_POST['name2'];
        $dsn = 'mysql:host=localhost;dbname=biocharc_YmlvY2hhcmRib25l';
        $username = 'biocharc_admin_init';
        $password = 'Bcr<>23@Ng&F';
        
        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM members WHERE firstname='$first' && lastname='$last'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                print_r($row['title']."%&%".$row['email']."%&%".$row['userprofile']."%&%".$row['whatsapp']); // Output each row as an associative array
            }
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
    }

?>