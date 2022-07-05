<style>
h1, h2, h3, h4, h5, h6  {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif ;
  font-size: 40px;
}
</style>
<style>
body  {
  font-family: Arial, Helvetica, sans-serif ;
  font-size: 16px;
}
</style>
<head>
<style>
body {
  padding: 16px;
  background-color: white;
  color: black;
  font-size: 16px;
}
<head>
<style>
body {
  padding: 16px;
  background-color: white;
  color: black;
  font-size: 16px;
}

.dark-mode {
  background-color: #373737;
  color: white;
}
</style>
</head>
<body>
    <h1>test dark</h1>

    <button onclick = "myFunction()">dark mode</button>

<script>
    function myFunction () {
        var element = document.body;
        element.classList.toggle("dark-mode");
    }
</script>
</body>
