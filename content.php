<div class="content">
<div id="id01" class="modal">
     <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
     <form class="modal-content animate" method="post" action="authentication.php">
       <div class="container">
         <label><b>Email</b></label>
         <input type="text" placeholder="Enter Email" name="email" required>

         <label><b>Password</b></label>
         <input type="password" placeholder="Enter Password" name="psw" required>

         <label><b>Repeat Password</b></label>
         <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
         <input type="checkbox" checked="checked"> Remember me
         <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

         <div class="clearfix">
           <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn1"><strong style="font-size:15px;">Cancel</strong></button>
           <button type="submit" class="signupbtn" name="signup"><strong style="font-size:15px;">Sign Up</strong></button>
         </div>
       </div>
     </form>
</div>

<div id="id02" class="modal">
  
     <form class="modal-content animate" method="post" action="authentication.php">
       <div class="imgcontainer">
         <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
       </div>

       <div class="container">
         <label><b>Email</b></label>
         <input type="text" placeholder="Enter Username" name="email" required>

         <label><b>Password</b></label>
         <input type="password" placeholder="Enter Password" name="psw" required>
        
         <button type="submit" name="signin" style="padding:15px;"><strong style="font-size:20px;">Login</strong></button>
         <input type="checkbox" checked="checked"> Remember me
       </div>

       <div class="container" style="background-color:#f1f1f1">
         <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn2">Cancel</button>
         <span class="psw">Forgot <a href="forgot_password.php">password?</a></span>
       </div>
     </form>
</div>
</div>