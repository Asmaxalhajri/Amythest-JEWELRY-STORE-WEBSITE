/* Lama Al-Ghamdi - 2190002418 */

function onDone(id) {
    var conf;
    conf = window.confirm("Are you sure you want to Done this message?");

    if (conf) {
        document.location.href = "Customer Service.php?id=" + id + "&action=done";
    }
}

function onUnDone(id) {
    var conf;
    conf = window.confirm("Are you sure you want to UnDone this message?");

    if (conf) {
        document.location.href = "Customer Service.php?id=" + id + "&action=undone";
    }
}