<svg id="gantt"></svg>

<div class="gantt-view-mode-select">
    <label for="view-mode-select">View Mode:</label>
    <select id="view-mode-select">
        <option value="Day" selected>Day</option>
        <option value="Week">Week</option>
        <option value="Month">Month</option>
    </select>
</div>  
<script type="text/javascript">
    $('document').ready(function() {

        $.get("<?= base_url('Kalender/getdata') ?>", function(response) {

            console.log(response)
            const a = [];
            response.map(function(item) {
                console.log(item)
                const b = {
                    id: item.Id,
                    name: item.Nama,
                    start: item.Mulai,
                    end: item.Berakhir,
                    progress: '100'
                }
                a.push(b);
                console.log(item);
            });
            console.log(a);
            const gantt = new Gantt("#gantt", a, {
                readOnly: true,
                custom_popup_html: function(a) {
                    const start_date = new Date(a.start).toLocaleDateString("en-US", {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                    const end_date = new Date(a.end).toLocaleDateString("en-US", {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                    return `<div class="card text-white text-center bg-dark mb-3" style="width: 345px;">                                  
                                        <div class="card-header">${a.name}</div>
                                        <div class="card-body">
                                        <p class="card-text"> Mulai magang : ${start_date} - ${end_date} Akhir magang</p>
                                       
                                        </div>
                                    </div>`;
                }
            });

            $('#view-mode-select').change(function() {
                const mode = $(this).val();
                gantt.change_view_mode(mode);
            });
        });
    })
</script>

</body>

</html>