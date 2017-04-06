<?php #compiled
//todo data from ajax request
/** @var array $data */
$this->runtimeVariable('data', '${data}');
/** @var array $options */
$this->runtimeVariable('options', '${options}');
/** @var array $__id__ */
$this->runtimeVariable('__id__', '${id| }');
/** @var array $chart */
$this->runtimeVariable('chart', '${chart}');

if (empty(${'chartsInternalFromURL_' . md5($this->namespace . $this->view)})) {
    ${'chartsInternal_' . md5($this->namespace . $this->view)} = true;
    ?>
    <charts:internal.init/>
<?php } #compiled ?>

<?php
if (empty($data)) {
    $data = [];
}
if (empty($options)) {
    $options = [];
}
$__id__ = trim($__id__);
if (empty($__id__)) {
    $__id__ = 'js-chart-from-url-' . \Spiral\Support\Strings::random(6);
}

/** @var \Spiral\Charts\Validator $chartValidator */
$chartValidator = spiral(Spiral\Charts\Validator::class);

if (!$chart = $chartValidator->validateChart($chart)) {
    //incorrect chart type
} elseif (!is_array($data)) {
    //bad chart data
} elseif (!is_array($options)) {
    //bad chart options
} else { ?>
    <canvas id="<?= $__id__ ?>" width="${width}" height="${height}"></canvas>
    <script>
        var ctx = document.getElementById("<?= $__id__ ?>");
        var myChart = new Chart(ctx, {
            type: "<?= $chart ?>",
            data: <?= json_encode($data) ?>,
            options: <?= json_encode($options) ?>
        });
    </script>
<?php } ?>
