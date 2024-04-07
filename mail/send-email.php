<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCR | Email</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&family=Itim&family=Jacques+Francois+Shadow&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
    <style>
        :root{
            --title-text: "Jacques Francois Shadow", serif;
            --medium-text: "Irish Grover", system-ui;
            --normal-text: "Itim", cursive;
        }
        body{
            /* color: rgb(20, 117, 20); */
        }
        ::selection{
            background: rgb(20, 117, 20);
            color: white;
        }
        form{
            border-radius: 10px;
            background: rgb(20, 117, 20);
            padding: 10px;
            padding-bottom: 20px;
            width: 70%;
        }
        form h2{
            padding: 5px 10px;
            margin: auto;
            -webkit-text-stroke: 2px rgb(240, 240, 240);
            color: transparent;
            letter-spacing: 2px;
        }
        fieldset{
            background: rgb(200, 200, 200);
            border: none;
            margin: 0;
            font-family: var(--medium-text);
        }
        fieldset:nth-child(2) legend{
            padding-top: 30px;
            color: black;
        }
        fieldset:nth-child(5){
            border: 1px solid black;
        }
        fieldset:nth-child(5) legend{
            background: rgb(200, 200, 200);
            text-align: left;
        }
        fieldset:nth-child(5) textarea{
            background: transparent;
            outline: 1px solid transparent;
            resize: none;
            width: 90%;
            height: 150px;
            overflow: auto;
            text-align: left;
            color: rgb(20, 150, 30);
        }
        fieldset label{
            font-style: italic;
            font-family: var(--normal-text);
            color: rgb(20, 150, 30);
        }
        fieldset label:hover{
            cursor: pointer;
        }
        fieldset input[type="text"]{
            padding: 7px 10px;
            width: 70%;
            border: 1px solid black;
            color: rgb(20, 150, 30);
            background: transparent;
            outline: 1px solid transparent;
            border: transparent;
            border-bottom: 1px solid black;
        }
        fieldset input[type="email"]{
            width: 280px;
            background: transparent;
            border: transparent;
            border-bottom: 1px solid black;
            padding: 7px 10px;
            outline: 1px solid transparent;
            color: rgb(20, 150, 30);
        }
        fieldset input[type="email"]:active{
            outline: 1px solid transparent;
        }
        form section{
            border: 2px solid white;
            background: rgb(0, 0, 0, .4);
            padding: 2% 20px;
        }
        form section h4:first-child{
            color: rgb(20, 167, 30);
            font-family: var(--normal-text);
        }
        @media only screen and (max-width:878px){
            fieldset:nth-child(5) textarea{
                width: 100%;
            }
            form{
                min-height: 90vh;
                width: 97%;
            }
        }
        button{
            color: rgb(20, 150, 30);
            letter-spacing: 2px;
            padding: 0 14px;
            font-size: 24px;
            border: 1px solid;
            outline: transparent;
            border-radius: 5px;
            margin-top: 20px;
        }
        button:hover{
            cursor:pointer;
            outline: 2px solid black;
            background: rgb(220, 220, 220);
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>BCR | Email portal</h2>
        <fieldset>
            <legend>Choose email to send from: </legend>
            <input type="radio" name="source-email" id="official" required>
            <label for="official">official@biocharclimateresolution.org</label><br>
            <input type="radio" name="source-email" id="info" required>
            <label for="info">info@biocharclimateresolution.org</label><br>
            <input type="radio" name="source-email" id="admin" required>
            <label for="info">admin@biocharclimateresolution.org</label>
        </fieldset>
        <fieldset>
            Send to:
            <input type="email" name="recepient" placeholder="abcd@email.com" required>
        </fieldset>
        <fieldset>
            Subject:
            <input type="text" name="subject" required>
        </fieldset>
        <fieldset>
            <legend>Content:</legend>
            <?php
                libxml_use_internal_errors(false);
                $htmlContent = file_get_contents("mail-template.html");
                $dom = new DOMDocument();
                try {
                    $dom->loadHTML($htmlContent);
                } catch (Exception $e) {
                    echo "Error loading HTML: " . $e->getMessage();
                }
                // This line removes all comments from the HTML
                $dom->removeChild($dom->doctype);
                
                // You can use various DOM methods to access and modify elements here
                // For example, to get the body content:
                $body = $dom->getElementsByTagName('body')->item(0);
                $renderedContent = $dom->saveHTML($body);
            ?>
            <textarea name="cont" id="txt-cont" placeholder="Type email text here" required></textarea>
            <section>
                <h4>Email Template</h4>
                <?php echo"$renderedContent";?>
            </section>
        </fieldset>
        <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
    </form>
</body>
</html>