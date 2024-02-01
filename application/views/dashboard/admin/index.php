<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"color": "light-red","placement": "horizontal","navcolor": "light","layout": "fluid","radius": "rounded"}}' data-scrollspy="true">
  <head>
    <?php $this->load->view("_partial/style.php");?>
  </head>

  <body>
    <div id="root">
      <?php $this->load->view("_partial/sidebar");?>

      <main>
        <div class="container">
          <div class="row">
            <div class="col">
              <!-- Title Start -->
              <div class="page-title-container">
                <div class="row">
                  <!-- Title Start -->
                  <?php $this->load->view("_partial/content-header");?>
                  <!-- Title End -->
                </div>
              </div>
              <!-- Title End -->

              <!-- Content Start -->
              <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <!-- Stats Start -->
                  <div class="mb-5">
                    <div class="row g-2">
                      <div class="col-12 col-sm-6 col-lg-3 col-md-6">
                        <div class="card sh-11 hover-scale-up cursor-pointer">
                          <div class="h-100 row g-0 card-body align-items-center py-3">
                            <div class="col-auto pe-3">
                              <div class="bg-gradient-light sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
                                <i data-acorn-icon="hourglass" class="text-white"></i>
                              </div>
                            </div>
                            <div class="col">
                              <div class="row gx-2 d-flex align-content-center">
                                <div class="col-12 col-xl d-flex">
                                  <div class="d-flex align-items-center lh-1-25">Menunggu Verifikasi HRD</div>
                                </div>
                                <div class="col-12 col-xl-auto">
                                  <div class="cta-2 text-primary"><?=number_format($waiting->jml)?></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-sm-6 col-lg-3 col-md-6">
                        <div class="card sh-11 hover-scale-up cursor-pointer">
                          <div class="h-100 row g-0 card-body align-items-center py-3">
                            <div class="col-auto pe-3">
                              <div class="bg-gradient-light sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
                                <i data-acorn-icon="file-text" class="text-white"></i>
                              </div>
                            </div>
                            <div class="col">
                              <div class="row gx-2 d-flex align-content-center">
                                <div class="col-12 col-xl d-flex">
                                  <div class="d-flex align-items-center lh-1-25">Tes</div>
                                </div>
                                <div class="col-12 col-xl-auto">
                                  <div class="cta-2 text-primary"><?=number_format($tes->jml)?></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-sm-6 col-lg-3 col-md-6">
                        <div class="card sh-11 hover-scale-up cursor-pointer">
                          <div class="h-100 row g-0 card-body align-items-center py-3">
                            <div class="col-auto pe-3">
                              <div class="bg-gradient-light sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
                                <i data-acorn-icon="shield-check" class="text-white"></i>
                              </div>
                            </div>
                            <div class="col">
                              <div class="row gx-2 d-flex align-content-center">
                                <div class="col-12 col-xl d-flex">
                                  <div class="d-flex align-items-center lh-1-25">Lulus</div>
                                </div>
                                <div class="col-12 col-xl-auto">
                                  <div class="cta-2 text-primary"><?=number_format($lulus->jml)?></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-sm-6 col-lg-3 col-md-6">
                        <div class="card sh-11 hover-scale-up cursor-pointer">
                          <div class="h-100 row g-0 card-body align-items-center py-3">
                            <div class="col-auto pe-3">
                              <div class="bg-gradient-light sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
                                <i data-acorn-icon="shield-warning" class="text-white"></i>
                              </div>
                            </div>
                            <div class="col">
                              <div class="row gx-2 d-flex align-content-center">
                                <div class="col-12 col-xl d-flex">
                                  <div class="d-flex align-items-center lh-1-25">Tidak Lulus</div>
                                </div>
                                <div class="col-12 col-xl-auto">
                                  <div class="cta-2 text-primary"><?=number_format($tidak_lulus->jml)?></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <h2 class="small-title">Lamaran Lulus</h2>
                    <div class="card mb-5 sh-40">
                      <div class="card-body">
                        <div class="custom-legend-container mb-3 pb-3 d-flex flex-row"></div>
                        <!-- Custom legend template used by js -->
                        <template class="custom-legend-item">
                          <a href="#" class="d-flex flex-row g-0 align-items-center me-5">
                            <div class="pe-2">
                              <div class="icon-container border sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
                                <i class="icon"></i>
                              </div>
                            </div>
                            <div>
                              <div class="text p mb-0 d-flex align-items-center text-small text-muted">Title</div>
                              <div class="value cta-4">Value</div>
                            </div>
                          </a>
                        </template>
                        <!-- Custom Legend Template End -->
                        <div class="sh-25">
                          <canvas id="customLegendBarChart"></canvas>
                          <!-- Custom tooltip template used by js -->
                          <div
                            class="custom-tooltip position-absolute bg-foreground rounded-md border border-separator pe-none p-3 d-flex z-index-1 align-items-center opacity-0 basic-transform-transition"
                          >
                            <div
                              class="icon-container border d-flex align-middle align-items-center justify-content-center align-self-center rounded-xl sh-5 sw-5 rounded-xl me-3"
                            >
                              <span class="icon"></span>
                            </div>
                            <div>
                              <span class="text d-flex align-middle text-muted align-items-center text-small">Bread</span>
                              <span class="value d-flex align-middle align-items-center cta-4">300</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Sales End -->
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <!-- Labels Start -->
                  <div class="d-flex justify-content-between">
                    <h2 class="small-title">Lowongan yang tersedia</h2>
                    <a href="<?=base_url()?>lowongan" class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small">
                      <span class="align-bottom">Lihat Lebih Banyak</span>
                      <i data-acorn-icon="chevron-right" class="align-middle" data-acorn-size="12"></i>
                    </a>
                  </div>
                  <div class="col-12 mb-5">
                    <section class="scroll-section" id="labels">
                      <div class="card mb-2 bg-transparent no-shadow d-none d-md-block sh-3">
                        <div class="card-body pt-0 pb-0 h-100">
                          <div class="row g-0 h-100 align-content-center">
                            <div class="col-12 col-md-3 d-flex align-items-center mb-2 mb-md-0 text-muted text-small">Tanggal Terakhir Lamaran</div>
                            <div class="col-12 col-md-3 d-flex align-items-center text-alternate text-medium justify-content-center text-muted text-small">
                              Pria
                            </div>
                            <div class="col-4 col-md-3 d-flex align-items-center text-alternate text-medium justify-content-center text-muted text-small">Wanita</div>
                            <div class="col-4 col-md-3 d-flex align-items-center text-alternate text-medium justify-content-center text-muted text-small">Lamaran Yang Masuk</div>
                          </div>
                        </div>
                      </div>
                      <div class="scroll-out">
                        <div class="scroll-by-count" data-count="5">
                          <?php foreach ($data as $key): ?>
                            <div class="card mb-2 sh-25 sh-md-12">
                              <div class="card-body pt-0 pb-0 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                  <div class="col-12 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                    <div class="text-muted text-small d-md-none">Tanggal Terakhir Lamaran</div>
                                    <a href="javascript:;" class="text-truncate"><?=$key->last_apply_date?></a>
                                  </div>
                                  <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-center align-items-md-end mb-1 mb-md-0">
                                    <div class="text-muted text-small d-md-none">Pria</div>
                                    <div class="text-alternate"><?=$key->pria?></div>
                                  </div>
                                  <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-center align-items-md-end mb-1 mb-md-0">
                                    <div class="text-muted text-small d-md-none">Wanita</div>
                                    <div class="text-alternate"><?=$key->wanita?></div>
                                  </div>
                                  <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-center align-items-md-end mb-1 mb-md-0">
                                    <div class="text-muted text-small d-md-none">Lamaran Yang Sudah Masuk</div>
                                    <div class="text-alternate"><?=$key->jml_lamaran_masuk?></div>
                                  </div>
                                </div>
                              </div>
                            </div>    
                          <?php endforeach ?>
                        </div>
                      </div>
                    </section>
                  </div>
                  <!-- Labels End -->
                </div>
              </div>
              <!-- Content End -->
            </div>

            
          </div>
        </div>
      </main>
      <!-- Layout Footer Start -->
      <?php $this->load->view("_partial/footer");?>
      <!-- Layout Footer End -->
    </div>

    <?php $this->load->view("_partial/script");?>
    <script src="<?=base_url()?>assets/js/vendor/Chart.bundle.min.js"></script>

    <script src="<?=base_url()?>assets/js/vendor/chartjs-plugin-datalabels.js"></script>

    <script src="<?=base_url()?>assets/js/vendor/chartjs-plugin-rounded-bar.min.js"></script>
    <script src="<?=base_url()?>assets/js/cs/charts.extend.js"></script>

    <!-- <script src="<?=base_url()?>assets/js/pages/dashboard.analytic.js"></script> -->
    <script type="text/javascript">
      /**
 *
 * DashboardAnalytic
 *
 * Dashboards.Analytic page content scripts. Initialized from scripts.js file.
 *
 *
 */
  var namaBulan = [];
  var jml = 0;
  var dataPerempuan = [];
  var dataLaki = [];
  var bulan = '';
  <?php foreach ($perempuan as $key): ?>
    var bulan = '<?=$key->nama_bulan?>';
    var jml = '<?=$key->jml?>';
    namaBulan.push(bulan)
    dataPerempuan.push(parseInt(jml))
  <?php endforeach ?>
  <?php foreach ($laki as $lk): ?>
    var jml = '<?=$lk->jml?>';
    dataLaki.push(parseInt(jml))
  <?php endforeach ?>
console.log(namaBulan)
console.log(dataPerempuan)
console.log(dataLaki)
class DashboardAnalytic {
  constructor() {
    // References to page items that might require an update
    this._customLegendBarChart = null;
   

    // Initialization of the page plugins
    this._initCustomLegendBarChart();
  }

  _initEvents() {
    // Listening for color change events to update charts
    document.documentElement.addEventListener(Globals.colorAttributeChange, (event) => {
      this._customLegendBarChart && this._customLegendBarChart.destroy();
      this._initCustomLegendBarChart();
    });
  }


  // Sales chart with the custom legend
  _initCustomLegendBarChart() {
    if (document.getElementById('customLegendBarChart')) {
      const ctx = document.getElementById('customLegendBarChart').getContext('2d');
      this._customLegendBarChart = new Chart(ctx, {
        type: 'bar',
        options: {
          cornerRadius: parseInt(Globals.borderRadiusMd),
          plugins: {
            crosshair: false,
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                stacked: true,
                gridLines: {
                  display: true,
                  lineWidth: 1,
                  color: Globals.separatorLight,
                  drawBorder: false,
                },
                ticks: {
                  beginAtZero: true,
                  stepSize: 20,
                  min: 0,
                  max: 100,
                  padding: 20,
                },
              },
            ],
            xAxes: [
              {
                stacked: true,
                gridLines: {display: false},
                barPercentage: 0.5,
              },
            ],
          },
          legend: false,
          legendCallback: function (chart) {
            const legendContainer = chart.canvas.parentElement.parentElement.querySelector('.custom-legend-container');
            legendContainer.innerHTML = '';
            const legendItem = chart.canvas.parentElement.parentElement.querySelector('.custom-legend-item');
            for (let i = 0; i < chart.data.datasets.length; i++) {
              var itemClone = legendItem.content.cloneNode(true);
              var total = chart.data.datasets[i].data.reduce(function (total, num) {
                return total + num;
              });
              itemClone.querySelector('.text').innerHTML = chart.data.datasets[i].label.toLocaleUpperCase();
              itemClone.querySelector('.value').innerHTML = total;
              itemClone.querySelector('.value').style = 'color: ' + chart.data.datasets[i].borderColor + '!important';
              itemClone.querySelector('.icon-container').style = 'border-color: ' + chart.data.datasets[i].borderColor + '!important';
              itemClone.querySelector('.icon').style = 'color: ' + chart.data.datasets[i].borderColor + '!important';
              itemClone.querySelector('.icon').setAttribute('data-acorn-icon', chart.data.icons[i]);
              itemClone.querySelector('a').addEventListener('click', (event) => {
                event.preventDefault();
                const hidden = chart.getDatasetMeta(i).hidden;
                chart.getDatasetMeta(i).hidden = !hidden;
                if (event.currentTarget.classList.contains('opacity-50')) {
                  event.currentTarget.classList.remove('opacity-50');
                } else {
                  event.currentTarget.classList.add('opacity-50');
                }
                chart.update();
              });
              legendContainer.appendChild(itemClone);
            }
            new AcornIcons().replace();
          },
          tooltips: {
            enabled: false,
            custom: function (tooltip) {
              var tooltipEl = this._chart.canvas.parentElement.querySelector('.custom-tooltip');
              if (tooltip.opacity === 0) {
                tooltipEl.style.opacity = 0;
                return;
              }
              tooltipEl.classList.remove('above', 'below', 'no-transform');
              if (tooltip.yAlign) {
                tooltipEl.classList.add(tooltip.yAlign);
              } else {
                tooltipEl.classList.add('no-transform');
              }
              if (tooltip.body) {
                var chart = this;
                var index = tooltip.dataPoints[0].index;
                var datasetIndex = tooltip.dataPoints[0].datasetIndex;
                var icon = tooltipEl.querySelector('.icon');
                var iconContainer = tooltipEl.querySelector('.icon-container');
                iconContainer.style = 'border-color: ' + tooltip.labelColors[0].borderColor + '!important';
                icon.style = 'color: ' + tooltip.labelColors[0].borderColor + ';';
                icon.setAttribute('data-acorn-icon', chart._data.icons[datasetIndex]);
                new AcornIcons().replace();
                tooltipEl.querySelector('.text').innerHTML = chart._data.datasets[datasetIndex].label.toLocaleUpperCase();
                tooltipEl.querySelector('.value').innerHTML = chart._data.datasets[datasetIndex].data[index];
                tooltipEl.querySelector('.value').style = 'color: ' + tooltip.labelColors[0].borderColor + ';';
              }
              var positionY = this._chart.canvas.offsetTop;
              var positionX = this._chart.canvas.offsetLeft;
              tooltipEl.style.opacity = 1;
              tooltipEl.style.left = positionX + tooltip.dataPoints[0].x - 75 + 'px';
              tooltipEl.style.top = positionY + tooltip.caretY + 'px';
            },
          },
        },
        data: {
          labels: namaBulan,
          datasets: [
            {
              label: 'Pria',
              backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
              borderColor: Globals.primary,
              borderWidth: 2,
              data: dataLaki,
            },
            {
              label: 'Wanita',
              backgroundColor: 'rgba(' + Globals.secondaryrgb + ',0.1)',
              borderColor: Globals.secondary,
              borderWidth: 2,
              data: dataPerempuan,
            },
          ],
          icons: ['crown', 'cupcake'],
        },
      });
      this._customLegendBarChart.generateLegend();
    }
  }
}
    </script>
  </body>
</html>
