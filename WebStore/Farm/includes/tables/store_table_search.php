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
                    $filter = $_POST['filter'];
                    $result = $repoStore->searchStore($filter);
                    $cnt=1;

                    if(!empty($result))
                    {
                        foreach($result as $row){ 
                        ?>
        <tr>
            <td class="text-center"><?php echo htmlentities($cnt);?></td>
            <td>
                <img src="productimages/<?php  echo $row['store_photo'];?>" class="mr-2" alt="image">
            </td>


            <td class="text-center"><a href="#" class=" edit_data5"
                    id="<?php echo  ($row['store_id']); ?>"><?php  echo htmlentities($row['store_name']);?></a>
            </td>


            <td class="text-center"><?php  echo htmlentities($row['category_name']);?></td>

            <td class="text-center"><?php  echo htmlentities($row['store_phone']);?></td>

            <td class="text-center"><?php  echo htmlentities($row['store_address']);?></td>



            <td class=" text-center">
                <a href="edit_store.php?editid=<?=$row['store_id']?>" class=" edit_data4"
                    id="<?php echo ($row['store_id']); ?>" title="click to edit"><i class="mdi mdi-pencil-box-outline"
                        aria-hidden="true"></i></a>
                <a href="delete_store.php?del=<?= $row['store_id']; ?>" data-toggle="tooltip"
                    data-original-title="Delete" class="btn-del"> <i class="mdi mdi-delete"></i> </a>
            </td>
        </tr>
        <?php 
                        $cnt=$cnt+1;
                      }
                    } ?>
    </tbody>


</body>

</html>