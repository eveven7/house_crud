<form action="" method="post" class="col-10 border border-primary rounded">

                <div class="form-group">
                    <label for="f1">Adress:</label>
                    <input type="text"  style="background-color: #F9FBFC" name="address" id="f1" class="form-control" value="<?= ($edit)? $house->address : "" ?>">
                </div>
               <div class="form-group">
                    <label for="f2">Room Count:</label>
                    <input type="text" style="background-color: #F9FBFC" name="roomCount" id="f2" class="form-control"  value="<?= ($edit)? $house->roomCount : "" ?>">
                </div>
                         


  </p>
            <label class="mb-2">Building type</label>
        <div>
            <select class="form-select" name="type">
                <option disabled selected value="0"></option>
                <option value="0">Flat</option>
                <option value="1">House</option>
            </select>
        </div>
   
                <div class="form-group">
                    <label for="f4">Floor:</label>
                    <textarea name="floor" cols="40" rows="3" id="f4" class="form-control" > <?= ($edit)? $house->floor : "" ?> </textarea>
                </div>
                <?php if($edit){ ?>
                    <input type="hidden" name="id" value="<?=$house->id?>">
                    <button type="submit" name="update" class="btn btn-outline-success mt-3 mb-3">Atnaujinti</button>
                <?php } else { ?>
                    <button type="submit" name="save" class="btn btn-outline-primary mt-3 mb-3">Išsaugoti</button>
                <?php } ?>
            </form>



            <script>

    function checkType() {
        isHouse = document.getElementById("type").value;
        floor = document.getElementById("floor");

        if (buildingType == 0) {
            floor.disabled = "";
        }
        if (buildingType == 1) {
            floor.disabled = "disabled";
        }
    }
</script>