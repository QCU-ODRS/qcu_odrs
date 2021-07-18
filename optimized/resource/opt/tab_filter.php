<div class="container">
    <button class="btn btn-primary showall" onclick="filterSelection('ShowAll')">Show All</button>
    <button class="btn btn-primary rlist" onclick="filterSelection('RequestsList')"> Request List</button>
    <button class="btn btn-primary plist" onclick="filterSelection('PendingList')">Pending List</button>
    <button class="btn btn-primary iplist" onclick="filterSelection('In-ProcessList')">In-Process List</button>
    <button class="btn btn-primary alist" onclick="filterSelection('ArchivedList')">Archived List</button>
</div>
<div class="container">
    <div class="d-sm-flex">
        <div class="flex-sm-column" id="myBtnContainer">
            <div class="column RequestsList">
                <div class="content">
                    <?php
                        include_once "requestlist_table.php";
                    ?>
                </div>
            </div>
            <div class="column PendingList">
                <div class="content">
                    <?php
                        include_once "pendinglist_table.php";
                    ?>
                </div>
            </div>
            <div class="column In-ProcessList">
                <div class="content">
                    <?php
                        include_once "in-processlist_table.php";
                    ?>
                </div>
            </div>
            <div class="column ArchivedList">
                <div class="content">
                    <?php
                        include_once "archivedlist_table.php";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    filterSelection("ShowAll")
    function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("column");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
        w3RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
    }

    function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
    }
    }

    function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);     
        }
    }
    element.className = arr1.join(" ");
    }


    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function(){
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
    }
</script>