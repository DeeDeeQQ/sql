<?php

/**
 * @var array $data
 * @var string $action
 */

?>

<form action="<?= $action ?>" method="post">
    <input class="form-control mb-2"
           name="RiverTitle"
           placeholder="River name"
           value="<?= getFromArray($data, 'title') ?>">
    <h2>Occurs in such countries</h2>
    <?php foreach ($data['countries'] as $county ): ?>
    <input class="form-control mb-2"
           name="CountryTitle<?= $county['id'] ?>"
           placeholder="Country name"
           value="<?= $county['title'] ?>">
    <?php endforeach ?>
    <a class="btn btn-info" href="<?= toUrl("/rivers/AddCountryView?id={$data['id']}")?>">Add Country</a>
    <input class="btn btn-success" type="submit" value="Save">
</form>
