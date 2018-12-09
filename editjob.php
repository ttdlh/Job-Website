<div class="addjob">
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
      <input type="hidden" name='id' value=<?php echo $_POST['id']; ?>>
      <div class="form-group row" id="editerr" style="display: none; color: red;">
        <label class="form-control-label col-12 text-center"><?php echo $iError; ?></label>
      </div>
      <div class="form-group row">
        <label class="form-control-label col-3">Job Title</label>
        <input class="form-control col-9" type="text" name="job_title" placeholder="Enter the job Title here" value='<?php echo $title; ?>'>
      </div>
      <div class="form-group row">
        <label class="form-control-label col-3">Company</label>
        <input class="form-control col-9" type="text" name="company" placeholder="Enter the Company name here" value='<?php echo $company; ?>'>
      </div>
      <div class="form-group row">
        <label class="form-control-label col-3">Address</label>
        <input class="form-control col-9" type="address" name="address" placeholder="Enter the Company Address here" value='<?php echo $address; ?>'>
      </div>
      <div class="form-group row">
        <label class="form-control-label col-3">Street</label>
        <input class="form-control col-9" type="text" name="street" placeholder="Enter the Street name here" value='<?php echo $street; ?>'>
      </div>
      <div class="form-group row">
        <label class="form-control-label col-3">City</label>
        <input class="form-control col-9" type="text" name="city" placeholder="Enter the City name here" value='<?php echo $city; ?>'>
      </div>
      <div class="form-group row">
        <label class="form-control-label col-3">Category</label>
        <div class="fourm-group col-4 row">
          <input class="form-control col-2" id="parttime" type="radio" name="category" value="0"
           <?php if($category == 0) echo 'checked=checked'; ?>><!-- Part time-->
          <label class="form0control-label col-10" for"parttime">Part time</lablel>
        </div>
        <div class="fourm-group col-4 row">
          <input class="form-control col-2" id="fulltime" type="radio" name="category" value="1"
           <?php if($category == 1) echo 'checked=checked'; ?>><!-- Full time -->
          <label class="form-control-label col-10" for"fulltime">Full time</lablel>
        </div>
      </div>
      <div class="form-group row">
        <label class="form-control-label col-3">Job Description</label>
        <textarea class="form-control col-9 desc" type="text" name="description" placeholder="Enter the Description here"><?php echo $desc; ?></textarea>
      </div>
      <div class="form-group row">
        <label class="form-control-label col-3">Job Requirements</label>
        <textarea class="form-control col-9" type="text" name="requirements" placeholder="Enter the Job Requirements here"><?php echo $requirements; ?></textarea>
      </div>
      <div class="form-group row">
        <label class="form-control-label col-3">Contact Info</label>
        <input class="form-control col-9" type="text" name="contact" placeholder="Enter the Contact Information here" value=<?php echo $contact; ?>>
      </div>
      <div class="form-group row">
        <label class="form-control-label col-3">Advertise?</label>
        <div class="fourm-group col-4 row">
          <input class="form-control col-2" id="notsponsored" type="radio" name="type" value="0"
           <?php if($type == 0) echo 'checked=checked'; ?>><!-- Not sponsored -->
          <label class="form0control-label col-10" for"notsponsored">No</lablel>
        </div>
        <div class="fourm-group col-4 row">
          <input class="form-control col-2" id="sponsored" type="radio" name="type" value="1"
          <?php if($type == 1) echo 'checked=checked'; ?>><!-- Sponsored -->
          <label class="form-control-label col-10" for"sponsored">Yes</lablel>
        </div>
      </div>
      <div class="form-group row">
        <label class="form-control-label col-3">salary</label>
        <input class="form-control col-9" type="text" name="salary" placeholder="Enter the job's salary" value='<?php echo $salary; ?>'>
      </div>
      <div class="form-group row">
        <label class="form-control-label col-3">Image link</label>
        <input class="form-control col" type="text" name="image" placeholder="Enter an image link(Optional)"value='<?php echo $image; ?>'>
      </div>
        <button class="btn btn-primary btn-block" type="submit" name="update">ADD JOB</button>
    </form><!-- form -->
  </div><!-- .container -->
</div><!-- .addjob -->
<script>
var editerror=<?php echo $_POST['editERR'];?>;
if(editerror){
  document.getElementById("editerr").style.display= "inline";
}
</script>
