<?php

if(count($_POST)>0){
    /*
    debug:
    print_r($_POST);
    */

    $error='';
    //make sure name is not already in the file
    if(file_exists('../Data/authors.csv')){
        $fh=fopen('../Data/authors.csv','r');
        while($line=fgets($fh)){
            if($_POST['name']==trim($line))
            $error='The author already exists'; //name found already
        }
        fclose($fh);
    }

    if(strlen($error)>0) echo $error;
    else{
        $fh=fopen('../Data/authors.csv','a');
        fputs($fh,$_POST['name'].PHP_EOL);
        fclose($fh);
        echo 'Thanks for adding '.$_POST['name'].' to our amazing website!';
    }
}
?>
<form method="POST">
    Enter author's name<br />
    <input type="text" name="name" /><br/>
    <button type="submit">Add Author </button>
</form>
</br>
<a href="index.php"> Index Page </a>