<div class="container col-lg-4" id="form">
    <form method="post">
        <div class="mb-3">
            <label for="form" class="form-label">Adresas</label>
            <input type="text" name='address' class="form-control" id="form" value=<?=($edit) ? "'$home->address'" : ""
    ?>>
        </div>

        <div class="mb-3">
            <label for="form" class="form-label">Kambarių skaičius</label>
            <input type="number" step="1" name='roomCount' class="form-control" id="form" value=<?=($edit) ? 
    "'$home->roomCount'" : "" ?>>
        </div>

        <!-- <div class="mb-3">
            <label for="form" class="form-label">tipas</label>
            <input type="text" name='isHouse' class="form-control" id="form" value=<?=($edit) ? "'$home->isHouse'" : ""
    ?>>
        </div> -->

        <label for="isHouse">Būsto tipas</label>

        <select name="isHouse" id="isHouse">
            <option selected disabled value=""> Būsto tipas </option>
            <option value="0">Butas</option>
            <option value="1">Namas</option>
        </select>

        <div class="mb-3">
            <label for="price" class="form-label">Aukštas</label>
            <input type="number" name='floor' step="1" class="form-control" id="year" value=<?=($edit) ? $home->floor :
    "" ?>>
        </div>


        <?php if ($edit) { ?>
        <input type="hidden" name="id" value="<?= $home->id ?>">
        <button type="submit" id="updateBtn" name="update" class="btn"> Update</button>
        <?php } else { ?>
        <button type="submit" name="save" class="btn btn-primary mt-3 mb-3" id="saveBtn">Save</button>
        <?php } ?>
    </form>
</div>