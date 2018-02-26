<?php

setUpModel('river');

function actionList()
{
    $page = (int)getFromArray($_GET, 'page', 1);
    $limit = (int)getFromArray($_GET, 'limit', 10);
    $offset = $limit * ($page - 1);

    return render('rivers/list', [
        'rivers' => getRiversList($limit, $offset),
        'pages' => ceil(getRiversQuantity() / $limit),
        'currentPage' => $page
    ]);
}

function actionView()
{
    $id = getFromArray($_GET, 'id');
    if (empty($id)) {
        die('River ID is required');
    }

    return render('rivers/form', [
        'data' => getRiverData($id),
        'action' => toUrl("/rivers/update?id={$id}")
    ]);
}

function actionUpdate()
{
    $id = getFromArray($_GET, 'id');
    $riverTitle = getFromArray($_POST, 'RiverTitle');
    if (!updateRiver($id, $riverTitle))
    {
        echo "Something goes wrong";
        die;
    };

    return actionList();
}

function actionAddCountryView()
{
    $id = getFromArray($_GET, 'id');
    return render('rivers/addCountry', [
        'action' => toUrl("/rivers/addCountry?id={$id}")
    ]);
}

function actionAddCountry()
{
    $riverId = getFromArray($_GET, 'id');
    $countryName = getFromArray($_POST, 'title');
    setNewCountry($riverId, $countryName);
    return actionView();
}
