// copied before drag n drop
var rows = 3;
var columns = 3;

var currentTile;
var emptyTile;

var turns = 0;

//var imgOrder = ["3by3/0", "3by3/1", "3by3/2", "3by3/3", "3by3/4", "3by3/5", "3by3/6", "3by3/7", "3by3/8"];
var imgOrder = ["3by3/3", "3by3/1", "3by3/7", "3by3/4", "3by3/0", "3by3/5", "3by3/6", "3by3/8", "3by3/2"];

window.onload = function() {
    for (let r = 0; r < rows; r++) {
        for (let c = 0; c < columns; c++) {

            //<img id = "0-0" src="3by3\3by3_og - Copy (0).jpg">
            let tile = document.createElement("img");
            tile.id = r.toString() + "-" + c.toString();
            tile.src = imgOrder.shift() + ".jpg";

            document.getElementById("board").append(tile);

        }
    }


}