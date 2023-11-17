var rows = 5;
var columns = 5;

var currentTile;
var emptyTile;

var turns = 0;
var end = true;

const desiredOrder = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24"];
var bufferOrder = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "24", "23"];
var randomOrder = bufferOrder.slice();

do {
    var inversions = 0;
    randomOrder.sort(() => Math.random() - 0.5);
    var big = randomOrder[0];
    for (i = 1; i < bufferOrder.length; i++){
        for (j = 0; j < i; j++){
            if (randomOrder[i] < randomOrder[j] && randomOrder[i] != 24 && randomOrder[j] != 24){
                inversions++;
            }
        }
    }
    console.log(inversions);
} while (inversions % 2 != 0);


console.log(randomOrder);
var imgOrder = randomOrder.slice();

window.onload = function() {
    for (let r = 0; r < rows; r++) {
        for (let c = 0; c < columns; c++) {

            let tile = document.createElement("img");
            tile.id = r.toString() + "-" + c.toString();
            tile.src = imgOrder.shift() + ".jpg";

            tile.addEventListener("dragstart", dragStart);
            tile.addEventListener("dragover", dragOver);
            tile.addEventListener("dragenter", dragEnter);
            tile.addEventListener("dragleave", dragLeave);
            tile.addEventListener("drop", dragDrop);
            tile.addEventListener("dragend", dragEnd);

            document.getElementById("board").append(tile);
        }
    }
    imgOrder = randomOrder.slice();
}


function done() {
    let isCompleted = true;

    if (imgOrder.length !== desiredOrder.length) {
        isCompleted = false;
    }
    else {
        for (let i = 0; i < imgOrder.length; i++) {
            if (imgOrder[i] !== desiredOrder[i]) {
                isCompleted = false;
                break;
            }
        }
    }
    return isCompleted;
}

function checkIfPuzzleCompleted() {
    if (done()) {
        alert("Congratulations! Puzzle Completed.");
        end = false;
    }
}

function dragStart() {

    currentTile = this;
}

function dragOver(e) {
    if (end){
        e.preventDefault();
    }
}

function dragEnter(e) {
    if (end){
        e.preventDefault();
    }
}

function dragLeave() {

}

function dragDrop() {
    emptyTile = this;
}

function dragEnd() {
    if (!emptyTile.src.includes("24.jpg")) {
        return;
    }

    let currentCoordinates = currentTile.id.split("-");
    let r1 = parseInt(currentCoordinates[0]);
    let c1 = parseInt(currentCoordinates[1]);

    let emptyCoordinates = emptyTile.id.split("-");
    let r2 = parseInt(emptyCoordinates[0]);
    let c2 = parseInt(emptyCoordinates[1]);

    let moveLeft = r1 == r2 && c2 == c1 - 1;
    let moveRight = r1 == r2 && c2 == c1 + 1;

    let moveUp = c1 == c2 && r2 == r1 - 1;
    let moveDown = c1 == c2 && r2 == r1 + 1;

    let isAdjacent = moveLeft || moveRight || moveUp || moveDown;

    if (isAdjacent) {
        imgOrder[r2*columns + c2] = imgOrder[r1*columns + c1];
        imgOrder[r1*columns + c1] = "24";
        
        let currentImage = currentTile.src;
        let emptyImage = emptyTile.src;
    
        currentTile.src = emptyImage;
        emptyTile.src = currentImage;

        turns += 1;
        document.getElementById("turns").innerText = turns;

        setTimeout(checkIfPuzzleCompleted, 1);
    }
}