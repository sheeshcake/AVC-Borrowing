<div class="container">  
  <form id="contact" action="controller/register.php" method="post">
    <h3>Register</h3>
    <h4>Register a new Student Staff</h4>
    <?php
      if(isset($_SESSION['message'])){
        if($_SESSION['message'] == 'success'){
          echo "<center>";
          echo '<p style="color:green">Register Success!</p>';
          echo "</center>";
        }
        if($_SESSION['message'] == 'failed'){
          echo "<center>";
          echo '<p style="color:red">An error occured! Register Unsuccessful!</p>';
          echo "</center>";
        }
        if($_SESSION['message'] == 'already'){
          echo "<center>";
          echo '<p style="color:red">This ID-Number is Already Taken!</p>';
          echo "</center>";
        }
        unset($_SESSION['message']);
      }
    ?>
    <fieldset>
      <input placeholder="Student Name" type="text" tabindex="1" name="name" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="ID-Number" type="text" tabindex="2" name="id-number" required>
    </fieldset>
    <fieldset>
      <select name="user-type">
        <option disabled selected>Select User Type</option>
        <option value="student">Student</option>
        <option value="student-assistant">Student Assistant</option>
      </select>
    </fieldset>
    <fieldset>    
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>

</div>