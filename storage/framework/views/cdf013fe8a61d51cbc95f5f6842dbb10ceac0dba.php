<!DOCTYPE html>
<html>
<body>

<p>Click the button to display a random number.</p>

<button onclick="myFunction()">Try it</button>

<p id="demo"></p>

<script>
    function myFunction() {
        document.getElementById("demo").innerHTML = Math.random();
    }
</script>

</body>
</html>