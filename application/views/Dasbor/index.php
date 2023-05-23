<div class="card-body">

  <div class="row">
    <div class="col-lg-4 col-xs-6">
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $dasbor; ?></h3>

          <p class="">...</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-contact"></i>
        </div>
        <a href="<?php echo base_url('Siswa') ?>" class="small-box-footer">Jumlah siswa <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-4 col-xs-6">
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $dasbor2; ?></h3>

          <p>...</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-briefcase-outline"></i>
        </div>
        <a href="<?php echo base_url('Sekolah') ?>" class="small-box-footer">Jumlah Sekolah <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-8 ">
      <div class="box box-danger">
        <div class="box-header with-border">
          <i class="fa fa-briefcase"></i>
          <h3 class="box-title">Statistik <small>Data siswa</small></h3>
        </div>
        <div class="box-body">
          <?php $menudata = "SELECT siswa.Nama,siswa.Berakhir,sekolah.nama_sekolah,siswa.Status FROM siswa JOIN sekolah ON siswa.sekolah=sekolah.id 
          WHERE siswa.Status='Aktif' ORDER BY siswa.Berakhir DESC limit 5";
          $quey = $this->db->query($menudata)->result_array();
          ?>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th>Nama</th>
                <th>Sekolah asal</th>
                <th>Selesai</th>
                <th>Data</th>
              </tr>
            </thead>
            <?php $i = 1;
            foreach ($quey as $q) : ?>

              <tbody>
                <tr>
                  <th scope="row"><?= $i++ ?></th>
                  <td><?= $q['Nama'] ?></td>
                  <td><?= $q['nama_sekolah'] ?></td>
                  <td><?= $q['Berakhir'] ?></td>
                  <td><?php if ($q['Status'] == 'Aktif') : echo "<div class='text-center rounded p-1 bg-warning text-white'>Aktif</div>" ?>
                    <?php elseif ($q['Status'] == 'Selesai') : echo "<div class='text-center rounded p-1 bg-success text-white'>Selesai</div>" ?>
                    <?php elseif ($q['Status'] == 'Menunggu') : echo "<div class='text-center rounded p-1 bg-danger text-white'>Menunggu</div>"  ?>
                    <?php elseif ($q['Status'] == 'Pengajuan') : echo "<div class='text-center rounded p-1 bg-primary text-white'>Pengajuan</div>"  ?>

                    <?php endif; ?></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
          </table>

        </div>
      </div>
    </div>

    <div class="col-md-4 ">
      <div class="box box-primary">
        <div class="box-header with-border">
          <i class="fa fa-briefcase"></i>
          <h3 class="box-title">Statistik <small>Data siswa aktif</small></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <canvas id="diagram_chart" style="width:100%;max-width:700px"></canvas>
          <script>
            var diagram = <?= json_encode($diagram);  ?>;
            var a = []
            var sekolah = [];
            const data = [{
              fill: true,
              backgroundColor: [
                'red', 'blue', 'green'
              ],
              data: a,
              borderColor: ['red', 'blue', 'green'],
              borderWidth: [2, 2]
            }];
            // const bg = ['red', 'blue', 'green'];

            diagram.map(function(item) {
              sekolah.push(item.nama_sekolah);
            });

            console.log(diagram)
            console.log(sekolah)

            // for (var i in diagram) {
            //   sekolah.push(diagram[i].sekolah)
            // }

            for (var i in diagram) {
              a.push(diagram[i].count_sekolah)
              //   data.push({
              //     label: diagram[i].sekolah,
              //     data: diagram[i].count_sekolah,
              //     backgroundColor: bg[i]
              //   })
            }

            let finalData = {
              labels: sekolah,
              datasets: data
            }

            // data = {
            //   datasets: [{
            //     label: 'Dataset 1',
            //     data: Utils.numbers(NUMBER_CFG),
            //     backgroundColor: Object.values(Utils.CHART_COLORS),
            //   }]
            // };

            var ctx = document.getElementById("diagram_chart").getContext('2d');
            new Chart(ctx, {
              type: 'pie',
              data: finalData,
              options: {
                responsive: true,
                plugins: {
                  legend: {
                    position: 'top',
                  },
                  title: {
                    display: true,
                    text: 'Chart.js Pie Chart'
                  }
                }
              }
            });
          </script>
        </div>
      </div>
    </div>
  </div>

</div>