var index, tbl = document.getElementById("table-1");
var array;
var orderID = document.getElementById("inputOrderID").value;
function select() {

    for (var i = 1; i < tbl.rows.length; i++) {

        tbl.rows[i] = function () {
            index = this.rowIndex;
            var code = this.cells[1].innerHTML;
            var qty = this.cells[2].innerHTML;
            var total = this.cells[3].innerHTML;

        }

    }
    select();
}