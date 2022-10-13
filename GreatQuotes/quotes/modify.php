<?php
include 'csv_util.php';
$author_array = read_authors();

$line_counter=0;
$fh=fopen('../Data/quotes.csv','r');
while ($data = fgetcsv($fh, 1000, ";")) {
    if($line_counter==$_GET['index']){
        $array = $data;
        $quote=$array[1];
        $author_name = $author_array[$array[0]];
    }
$line_counter++;
}

if(count($_POST)>0){
    if(file_exists('../Data/quotes.csv')){
        mod_content($_GET['index'],$array[0],$author_array,$_POST['quote']);
        echo ' You modified an quote';
        echo '<p><a href="index.php">Index Page</a></p>';
        die();
    }
}
else{
    $quote='';
    $line_counter=0;
    $fh=fopen("../data/quotes.csv", "r");
    while ($data = fgetcsv($fh, 1000, ";")) {
        if($line_counter==$_GET['index']){
            $array = $data;
            $quote=$array[1];
            $author_name = $author_array[$array[0]];
        }
    $line_counter++;
    }
}

?>
<form method="POST">
    Modify <?=$author_name?>'s quote<br />
    <input type="text" name="quote" value="<?=$quote?>" /><br/>
    <button type="submit">Modify Quote </button>
</form>

<?php