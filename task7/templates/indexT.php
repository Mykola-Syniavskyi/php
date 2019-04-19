<html>
<head>
	<title>%TITLE%</title>
</head>
<body>
<div><h2>%TITLE%</h2></div>

<form action="" method="post">
    <div style="color: blue; font-size: 18px; text-align:center;"><strong>%SACCESS%</strong></div>
    <div style="color: #FF0000; font-size: 15px;"><strong>%ERROR_NAME%</strong></div>
    <input type="text" name="name" value="%NAME%"> &nbsp your FistLastName<br><br>
    <div style="color: #FF0000; font-size: 15px;"><strong>%ERROR_EMAIL%</strong></div>
    <input type="email" name="email" value="%EMAIL%"> &nbsp your email<br><br>
    <div style="color: #FF0000; font-size: 15px;"><strong>%ERROR_SELECT%</strong></div>    
    <select name="select" required>
        <option value="nothing" selected >please choose</option>
        <option value="%SELECT_PHP%" %SELECTED_PHP%>%SELECT_PHP%</option>
        <option value="%SELECT_JS%" %SELECTED_JS%>%SELECT_JS%</option>
    </select> your subject<br><br>
    <div style="color: #FF0000; font-size: 15px;"><strong>%ERROR_TEXT%</strong></div>    
    <textarea name="text" cols="30" rows="5" size="50" placeholder="%PROMPT_TEXT%" >%TEXT%</textarea><br>
    <input type="submit" value="send">
</form>

</body>
</html>
