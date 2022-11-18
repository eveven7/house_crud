<table class="table">
            <thead class="table-primary">
                <tr>
                <th scope="col">id</th>
      <th scope="col">adress</th>
      <th scope="col">rooms</th>
      <th scope="col">house/flat</th>
      <th scope="col">floor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($houses as $house) { ?>
                <tr>
                <td><?=$house->id?></td>
            <td><?=$house->address?></td>
            <td><?=$house->roomCount?></td>
            <td><?=($house->isHouse)?"house":"flat"?></td>
            <td><?=$house->floor?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value=" <?=$house->id?>">
                                <button type="submit" name="edit" class="btn btn-outline-primary">edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value=" <?=$house->id?>">
                                <button type="submit" name="destroy" class="btn btn-outline-danger">delete</button>
                            </form>
                        </td>

                </tr>
                <?php  } ?>
            </tbody>
        </table>