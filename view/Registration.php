    <!DOCTYPE html>
    <html>
    <head>
    	<title>CBC</title>
    <center>
    	<h1>Classroom Booking System</h1>
    </center>
    <script type="text/javascript" src="../js/ValidateRegistration.js"></script>
<!--
<center><noscript>Your browser does not support JavaScript!</noscript></center>
-->
<noscript>
  <META HTTP-EQUIV="Refresh" CONTENT="0;URL=NoJs.html">
</noscript>
    </head>
    <body>
    	<center><h2>Registration</h2></center>
    	<center>
    <form action="../controller/Registration.php" method="POST" onsubmit="return validateRegistrationForm()">
      
      
      <input id="name" type="text" name="name" placeholder="NAME">
      <br><span id="nameSpan"></span><br></br>

      <input id="id" type="text" name="id" placeholder="ID" onblur="checkUserID(this.value)">
      <br><span id="idSpan"></span><br></br>

      <input id="phone" type="text" name="phone" placeholder="PHONE NUMBER" >
      <br><span id="phoneSpan"></span><br></br>

      <input id="email" type="text" name="email" placeholder="EMAIL" onblur="checkEmail(this.value)" >
      <br><span id="emailSpan"></span><br></br>
      
      <select  id="department" name="department">
        <option value="select">SELECT</option>
<?php
                            include('../controller/FetchList.php');
                            $dept = getDeptName();
                            foreach($dept as $d) {
                                if($d['name']!="ADMIN"){?>
                                <option value="<?php echo $d['name']?>"><?php echo $d['name']?></option>
                            <?php }}?>
                            </select>
      <br>
        <span id="departmentSpan"></span>
      <br></br>

      <input id="password" type="Password" name="password" placeholder="PASSWORD">
      <br><span id="passwordSpan"></span><br></br>

      <input id="rePassword" type="Password" name="rePassword" placeholder="RETYPE PASSWORD" >
      <br><span id="rePasswordSpan"></span><br></br>

      <button type="submit" value="submit">Sign In</button>
      <button type="reset" value="reset">Reset</button>
      <br></br>
    </form> 
    <form action="Index.html">
    		<button >Back To Login Page</button>
    	</form>
    </center>
    </body>
    </html>