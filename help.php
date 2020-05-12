<!DOCTYPE html>
<html>
<body>


<button onclick="myFunction()">Hírdetés törlése</button>

<script>
    function myFunction() {
        var r = confirm("Biztos törli a hírdetést?");
        if (r == true) {
            location.href = "index.php";
        }
    }
</script>

</body>
</html>