<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>table</title>
</head>
<style>
table
{width:100%}
.col td
{background-color:#0b462d; color:#fff; font-size:16px;}
table td{font-size:14px; padding:0.5%; border:1px solid#097b4d;}
</style>

<body>
<div class="inner">
<div class="row">Employee Attendance</div><hr />
</div>
<div class="outer">
<div class="row">Date: <input type="date" name="date";/></div>
</div>
<table>
<tr class="col">
<td>Emp id</td><td>Employee name</td><td>Attendance</td><td>Time in</td><td>Time out</td>
</tr>
<td><input type="text" name="dps1" value="DPS1" id="dps1" read only /></td>
<td><input type="text" name="abc" value="Mr ANIL KUMAR-principal" id="abc" read only /></td>
<td><select>
<option value="P">P</option>
<option value="A">A</option>
<option value="L">L</option>
</select>
</td>
<td><input type="time" name="time" id="time" />
</td>
<td><input type="time" name"time" id="time" />
</td>
</table>
</body>
</html>
