<?php
/* @var $this ResponseController */
/* @var $model response */

$this->breadcrumbs = array(
    'Responses' => array('summary'),
    'Create',
);

$this->menu = array(
        /* array('label'=>'List response', 'url'=>array('index')),
          array('label'=>'Manage response', 'url'=>array('admin')), */
);
?>

<h1>Poll intetion summary</h1>



<?php
/** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'horizontalForm',
    'type' => 'horizontal',
        ));

$model = new response;
$model->district_id = $filters_value['district_id'];
$model->political_party_id = $filters_value['political_party_id'];
//filters district
$districts_array = array();
$districts_array[0] = 'All';
foreach ($districts as $id => $data) {
    $districts_array[$data->id] = $data->Name;
};
echo $form->dropDownListRow($model, 'district_id', $districts_array);
//echo $form->dropDownListRow($model, 'district_id', $districts_array, $filters_value['district_id']);
//filters political_party
$political_party = array();
$political_party[0] = 'All';
foreach ($political_parties as $id => $data) {
    $political_party[$data->id] = $data->Name;
};
echo $form->dropDownListRow($model, 'political_party_id', $political_party);
?>

<div class="row buttons">
    <?php echo CHtml::submitButton('Search'); ?>
</div>

<?php $this->endWidget(); ?>

<?php
//var_dump($responsesIntention);

$total = 0;
foreach ($responsesIntention as $id => $response) {
    $total += $response['total'];
};
//print datas group by region
$gridDataProvider_data = array();
$data_chart_count = array();
$data_chart_percent = array();
$data_chart_count = array(
    'Poll Intention',
    'Total intentions',
);

$data_chart_percent[] = array(
    'Poll Intention',
    'Percent intentions',
);
foreach ($responsesIntention as $id => $response) {
    $percentOfTotal = round($response['total'] * 100 / $total,2);
    $gridDataProvider_data[] = array(
        'id' => ($response['Intention'] == 0) ? 'No' : 'Yes',
        'Intention' => $response['total'],
        'Percent' => round($percentOfTotal, 2) . '%');

    $data_chart_count[] = array(
        ($id == 0) ? 'No' : 'Yes',
        $response['total'],
    );

    $data_chart_percent[] = array(
        ($id == 0) ? 'No' : 'Yes',
        round($percentOfTotal, 2),
    );
}

$gridDataProvider_data[] = array(
    'id' => 'Total',
    'Intention' => $total,
    'Percent' => '100%');

$gridDataProvider = new CArrayDataProvider($gridDataProvider_data);

$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'id', 'header' => 'Intention of vote'),
        array('name' => 'Intention', 'header' => 'Count'),
        array('name' => 'Percent', 'header' => 'Percent'),
    ),
));
//var_dump($data_chart_percent);
//var_dump($data_chart_percent);
//
//$this->widget('ext.Hzl.google.HzlVisualizationChart', array('visualization' => 'PieChart',
//    'data' => $data_chart_percent,
//    'options' => array('title' => 'Poll intention data')));
//
$this->widget('ext.Hzl.google.HzlVisualizationChart', array('visualization' => 'PieChart',
    'data' => $data_chart_count,
    'options' => array('title' => 'Poll intention ')));

$this->widget('ext.Hzl.google.HzlVisualizationChart', array('visualization' => 'PieChart',
    'data' => $data_chart_percent,
    'options' => array('title' => 'Poll intention ')));
?>



<?php
/**
 * PARA DATA DISTRICT
 */
$gridDataProvider_data = array();
$data_chart_count = array();
$data_chart_percent = array();


$data_chart_percent[] = array(
    'Poll Intention',
    'Percent intentions',
);
$total = array(
    'vote' => 0,
    'no_vote' => 0,
);
foreach ($responsesIntentionByDistrict as $id => $response) {

    if (!isset($gridDataProvider_data[$response['district_id']])){
        $gridDataProvider_data[$response['district_id']]['vote'] = 0;
        $gridDataProvider_data[$response['district_id']]['no_vote'] = 0;
    }
    
    $gridDataProvider_data[$response['district_id']]['id'] = $districts_array[$response['district_id']];
    if ($response['Intention'] === '0') {
        $gridDataProvider_data[$response['district_id']]['no_vote'] = $response['total'];
        $total['no_vote'] += $response['total'];
    }
    if ($response['Intention'] === '1') {
        $gridDataProvider_data[$response['district_id']]['vote'] = $response['total'];
        $total['vote'] += $response['total'];
    }
}

$gridDataProvider_data[] = array(
    'id' => 'Total',
    'no_vote' => $total['no_vote'],
    'vote' => $total['vote']
);

$gridDataProvider = new CArrayDataProvider($gridDataProvider_data);

$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'id', 'header' => 'District'),
        array('name' => 'vote', 'header' => 'Vote'),
        array('name' => 'no_vote', 'header' => 'No vote'),
    ),
));
?>

<?php
/**
 * PARA DATA political party
 */

$gridDataProvider_data = array();
$data_chart_count = array();
$data_chart_percent = array();

$data_chart_percent = array();
$data_chart_percent[] = array(
    'Poll Intention',
    'Percent intentions',
);

$total = 0;
foreach ($responsesIntentionByPolitical_Party as $id => $response) {
    $total += $response['total'];
};

foreach ($responsesIntentionByPolitical_Party as $id => $response) {

    $percentOfTotal = round($response['total'] * 100 / $total,2);
    $gridDataProvider_data[$response['political_party_id']]['id'] = $political_party[$response['political_party_id']];

    if (isset($gridDataProvider_data[$response['political_party_id']]['votes'])) {
        $gridDataProvider_data[$response['political_party_id']]['votes'] += $response['total'];
        $gridDataProvider_data[$response['political_party_id']]['percent'] += $percentOfTotal;
    } else {
        $gridDataProvider_data[$response['political_party_id']]['votes'] = $response['total'];
        $gridDataProvider_data[$response['political_party_id']]['percent'] = $percentOfTotal;
    }

    /*$data_chart_percent[$response['political_party_id']][0] = $political_party[$response['political_party_id']];
    if (isset($data_chart_percent[$response['political_party_id']][1])) {
        $data_chart_percent[$response['political_party_id']][1] += round($percentOfTotal, 2);
    } else {
        $data_chart_percent[$response['political_party_id']][1] = round($percentOfTotal, 2);
    }*/
}

foreach ($gridDataProvider_data as $political_party_id => $values) {
    $data_chart_percent[] = array(
        $values['id'],
        $values['percent'],
    );
}


//var_dump($data_chart_percent);


$gridDataProvider_data[] = array(
    'id' => 'Total',
    'votes' => $total,
    'percent' => '100%');

$gridDataProvider = new CArrayDataProvider($gridDataProvider_data);

$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'id', 'header' => 'Political Party'),
        array('name' => 'votes', 'header' => 'Votes'),
        array('name' => 'percent', 'header' => 'Percent'),
    ),
));

$this->widget('ext.Hzl.google.HzlVisualizationChart', array('visualization' => 'PieChart',
    'data' => $data_chart_percent,
    'options' => array('title' => 'Poll intention ')));
?>