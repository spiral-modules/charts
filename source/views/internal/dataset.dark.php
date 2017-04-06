<?php #compiled

$postfix = md5($this->namespace . $this->view);

/** @var array $chartsInternalData_akgfdsy */
$this->runtimeVariable('chartsInternalData_akgfdsy', '${data}');
/** @var array $chartsInternalOptions_akgfdsy */
$this->runtimeVariable('chartsInternalOptions_akgfdsy', '${options}');

$chartValidator = spiral(Spiral\Charts\Validator::class);
if (!$chart = $chartValidator->validateChart('${chart}')) { ?>
    <h3>[[Chart type is incorrect,
        please refer to <a href="http://www.chartjs.org/docs/">docs</a>.]]</h3>
<?php } else { #compiled
    if (empty(${'chartsInternalDatasetInit_' . $postfix})) {
        ${'chartsInternalDatasetInit_' . $postfix} = true;
        ?>
        <charts:internal.init/>
    <?php } #compiled

    if (!isset(${'chartsInternalDatasetID_' . $postfix})) {
        ${'chartsInternalDatasetID_' . $postfix} = 1;
    } else {
        ${'chartsInternalDatasetID_' . $postfix}++;
    } ?>

    <?php
    if (empty($chartsInternalData_akgfdsy)) {
        $chartsInternalData_akgfdsy = [];
    }

    if (empty($chartsInternalOptions_akgfdsy)) {
        $chartsInternalOptions_akgfdsy = [];
    }

    if (!is_array($chartsInternalData_akgfdsy)) { ?>
        <h3>[[Bad chart data provided, array expected.]]</h3>
    <?php } elseif (!is_array($chartsInternalOptions_akgfdsy)) { ?>
        <h3>[[Bad chart options data provided, array expected.]]</h3>
    <?php } else { ?>
        <canvas
            id="chartsInternalDatasetID_akgfdsy-<?php echo ${'chartsInternalDatasetID_' . $postfix}; #compiled ?>"
            width="${width}" height="${height}"></canvas>
        <script>
            var ctx = document.getElementById("chartsInternalDatasetID_akgfdsy-<?php echo ${'chartsInternalDatasetID_' . $postfix}; #compiled ?>");
            var myChart = new Chart(ctx, {
                type: "<?= $chart #compiled ?>",
                data: <?= json_encode($chartsInternalData_akgfdsy) ?>,
                options: <?= json_encode($chartsInternalOptions_akgfdsy) ?>
            });
        </script>
    <?php } ?>

<?php } #compiled ?>