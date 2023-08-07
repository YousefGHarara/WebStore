<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <tbody>
        <?php
                    $cnt=1;
                    if(!empty($query_page)){
                        foreach($query_page as $row)
                        { 
                        ?>
        <tr>
            <td class="text-center"><?php echo htmlentities($cnt);?></td>
            <td>
                <img src="productimages/<?php  echo $row['store_photo'];?>" class="mr-2" alt="image">
            </td>


            <td class="text-center"><a href="#" class=" edit_data5"
                    id="<?php echo  ($row['store_id']); ?>"><?php  echo htmlentities($row['store_name']);?></a>
            </td>


            <td class="text-center"><?php  echo htmlentities($row['total_rate']);?></td>

            <td class="text-center"><?php  echo htmlentities($row['number_of_rate']);?></td>

            <td class="text-center"><?php  echo htmlentities($row['store_rate']);?></td>

        </tr>
        <?php 
                        $cnt=$cnt+1;
                        }
                    } ?>
    </tbody>

</body>

</html>