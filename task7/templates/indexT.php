<html>
<head>
	<title>%TITLE%</title>
</head>
<body>
<div><h2>%TITLE%</h2></div>
<div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS%</strong></div>
<form action="" method="post">
    <input type="text" name="name" required> &nbsp your FistLastName<br><br>
    <div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS%</strong></div>
    <input type="email" name="email" > &nbsp your email<br><br>
    <select name="select" required>
        <option value="selected" disabled selected>please choose</option>
        <option value="php">php</option>
        <option value="js">js</option>
    </select> your subject<br><br>
    <div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS%</strong></div>
    <textarea name="text" cols="30" rows="5" size="50" ></textarea><br>
    <input type="submit" value="send">
</form>

</body>
</html>
