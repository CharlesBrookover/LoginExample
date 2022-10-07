<?php
/**
 * The common inputs for the preferences and the new user form
 *
 * @property \stdClass|null $user  The user object
 */

?>

<div class="mb-3">
    <label class="form-label" for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= $user->email ?? '' ?>" />
</div>
<div class="mb-3">
    <label class="form-label" for="firstName">First Name</label>
    <input type="text" name="firstName" id="firstName" value="<?= $user->firstName ?? '' ?>" />
</div>
<div class="mb-3">
    <label class="form-label" for="lastName">Last Name</label>
    <input type="text" name="lastName" id="lastName" value="<?= $user->lastName ?? '' ?>" />
</div>
<div class="mb-3">
    <label class="form-label" for="city">City</label>
    <input type="text" name="city" id="city" value="<?= $userInfo->city ?? '' ?>" />
</div>
<div class="mb-3">
    <label class="form-label" for="age">Age</label>
    <input type="number" name="age" id="age" min="0" max="100" value="<?= $userInfo->age ?? '' ?>" />
</div>
   


