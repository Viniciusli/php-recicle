<?php $this->layout('Layouts/app'); ?>

<h1>Contact</h1>

<form action="/contact" method="post">
    <input type="text" placeholder="name" name="name">
    <button type="submit">Submit</button>
</form>