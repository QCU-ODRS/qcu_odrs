<div class="container">
<button class="btn btn-primary" onclick="filterSelection('ShowAll')"></button>
    <button class="btn btn-primary" onclick="filterSelection('RequestsList')"></button>
    <button class="btn btn-primary" onclick="filterSelection('PendingList')"></button>
    <button class="btn btn-primary" onclick="filterSelection('In-ProcessList')"></button>
    <button class="btn btn-primary" onclick="filterSelection('ArchivedList')"></button>
</div>
<div class="container">
    <div class="d-sm-flex">
        <div class="flex-sm-column" id="myBtnContainer">
            <div class="column RequestsList">
                <div class="content">
                    <?php
                        include "RequestsList.php";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>