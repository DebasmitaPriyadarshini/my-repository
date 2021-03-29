<?php
include 'config.php';
$record_per_page= 5;
$page = '';
$output = '';

if(isset($_POST["page"])){
    $page= $_POST["page"];
}
else{
    $page = 1;
    }
    
$start_from = ($page-1) * $record_per_page;
$page_query = "select * from mastercity order by id";
$page_result = mysqli_query($db, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records/$record_per_page);

$query= "select * from mastercity order by id LIMIT $start_from, $record_per_page";
$result= mysqli_query($db, $query);
$output = "
            <table class= 'table table-bordered'>
            <tr>
                <th width='25%'> ID </th>
                <th width='25%'> City </th>
                <th width='25%'> Edit </th>
                <th width='25%'> Delete </th>
                
            </tr>
            ";
while ($row = mysqli_fetch_array($result)) {
        $output .= '
            <tr>
                <td>'.$row ["id"].'</td>
                <td>'.$row ["cityname"].'</td>
                <td><button type="submit" name="edit" class="cls_update" id="id1">Edit</button></td>
                <td><button type="submit" name="delete" class="cls_delete" id="id2">Delete</button></td>
            </tr>';
}
$output .= '</table> <br/><div align = "center">';


for ($i = 1; $i<=$total_pages; $i++) {
    $output .= "<span class ='pagination_link' style= 'cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>" .$i."</span>";
}
    echo $output;
?>