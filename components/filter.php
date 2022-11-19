<div class="box" id='filterForm'>
    <div class="d-flex flex-row  mb-3">
        <form class="row g-3" method="GET">
            <div class="col-lg-3 col-md-5">

                <select class="form-select form-control filter" name="isHouse" aria-label="Default select example"
                    id="category">
                    <option value="" selected> Būsto tipas </option>
                    <option value="0">Butas</option>
                    <option value="1">Namas</option>
                </select>

            </div>
            <div class="col-lg-2 col-md-5">

                <input type="text" class="form-control filter" placeholder="price: from" name="roomFrom">
            </div>
            <div class="col-lg-2 col-md-5">
                <input type="text" class="form-control filter" placeholder="price: to" name="roomTo">

            </div>

            <div class="col-lg-3 col-md-5">

                <select class="form-select form-control filter" aria-label="Default select example" name="sort">
                    <option selected value="0"> Sort </option>
                    <option value="1"> rooms: low to high </option>
                    <option value="2"> rooms: high to low </option>
                    <option value="3"> address: A-Z </option>
                    <option value="4"> address: Z-A </option>
                </select>

            </div>
            <div class="col-lg-2 col-md-5 filter-input">
                <button type="submit" name="filter" class="btn btn-primary mb-3" id="filterBtn">Filter</button>
            </div>
    </div>
</div>

</form>
</div>