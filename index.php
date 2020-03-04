<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
    }
</style>

<body>
<?php
$mysqli = new mysqli("localhost", "dropdown", "dropdown", "dropdown");
if ($mysqli->connect_error) {
    exit('Could not connect');
}
?>
    <form action="">
        <select name="customers" onchange="showCustomer(this.value)">
            <option value="">Select a customer:</option>
            <?php
            $sql = "SELECT megnevezes FROM auto_tipusok ";
            $result = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_array($result)) { ?>
            <option value="<?=$row['megnevezes']?>"><?=$row['megnevezes']?></option>
            <?php } ?>
        </select>
    </form>
    <br>
     <form action="">
        <select id="txtHint">
            <option  value="">Select a customer:</option>
            <option  value=""></option>
        </select>
    </form>
                
    <script>
        function showCustomer(str) {
            var xhttp;
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "modellek.php?q="+str, true);
            xhttp.send();
        }
    </script>

</body>

</html>