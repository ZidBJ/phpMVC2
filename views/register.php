<h1>Register</h1>
<?php
echo '<pre>';
var_dump($errors);
echo '</pre>';
?>

<form action="" method="post">
    <div class="mb-3">
        <label for="fName" class="form-label">First Name</label>
        <input name="fName" type="text" class="form-control" id="fName">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="password">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Confirm Password</label>
        <input name="confirmPassword" type="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>